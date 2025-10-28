<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Spatie\Browsershot\Browsershot;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;
use App\Mail\VerifyUser;
use App\Mail\UserForgotPassword;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(){
        $categories = Category::withCount('quizzes')->orderBy('quizzes_count','desc')->take(5)->get();
        $quizData = Quiz::withCount('Records')->orderBy('records_count','desc')->take(5)->get();
        return view('welcome',['categories'=>$categories,'quizData'=>$quizData]);
    }

    public function categories(){
        $categories = Category::withCount('quizzes')->orderBy('quizzes_count','desc')->paginate(10);
        return view('categories-list',['categories'=>$categories]);
    }

    public function userQuizList($id, $category){
        $quizData = Quiz::withCount('Mcq')->where('category_id',$id)->get();
        return view('user-quiz-list',["quizData"=>$quizData, "category"=>$category]); 
    }
    public function startQuiz($id, $name){
    $quizCount = Mcq::where('quiz_id', $id)->count();

    // Check if no MCQs found
    if ($quizCount == 0) {
        return redirect()->back()->with('error', 'No MCQ found for this quiz.');
    }

    $mcqs = Mcq::where('quiz_id', $id)->get();
    Session::put('firstMCQ', $mcqs[0]);
    $quizName = $name;

    return view('start-quiz', [
        'quizName' => $quizName,
        'quizCount' => $quizCount
    ]);
    }

    public function userSignup(Request $request){
        $validate = $request->validate([
            'name'=>'required | min:3',
            'email'=>'required | email | unique:users',
            'password'=>'required | min:3 | confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //
        $link = Crypt::encryptString($user->email);
        $link = url('verify-user/'.$link);
        Mail::to($user->email)->send(new VerifyUser($link));


       //


        if ($user) {
            Session::put('user',$user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message-success',"User registered successfully, Please check email to verify account");
            }
            return redirect('/')->with('message-success',"User registered successfully, Please check email to verify account");
        }
    }
    public function userLogout(){
        Session::forget('user');
        return redirect('/');
    }
    public function userSignupQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }
    public function userLogin(Request $request){
        $validate = $request->validate([
            'email'=>'required | email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect('user-login')->with('message-error',"User not valid, Please check email and password again");
            
        }
        if ($user) {
            Session::put('user',$user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect('/');
        }
    }
    public function userLoginQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-login');
    }
    public function mcq($id, $name){
        $record = new Record();
        $record->user_id=Session::get('user')->id;
        $record->quiz_id=Session::get('firstMCQ')->quiz_id;
        $record->status=1;
        if ($record->save()) {
        $currentQuiz=[];
        $currentQuiz['totalMcq']=MCQ::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
        $currentQuiz['currentMcq']=1;
        $currentQuiz['quizName']=$name;
        $currentQuiz['quizId']=Session::get('firstMCQ')->quiz_id;
        $currentQuiz['recordId']=$record->id;

        Session::put('currentQuiz',$currentQuiz);
        $mcqData=MCQ::find($id);
        return view('mcq-page',['quizName'=>$name, 'mcqData'=>$mcqData]);
        } else {
            return "Something went wrong";
        }
        
    }

    public function submitAndNext(Request $request, $id)
{
    $currentQuiz = Session::get('currentQuiz');

    // 🧩 STEP 1 — Check if user selected an answer
    if (!$request->has('option')) {
        $mcqData = MCQ::find($id);

        return back()->with([
            'error' => 'Please select an answer before proceeding.',
            'quizName' => $currentQuiz['quizName'],
            'mcqData' => $mcqData
        ]);
    }

    // 🧩 STEP 2 — Save selected answer
    $currentQuiz['currentMcq'] += 1;

    $mcqData = MCQ::where([
        ['id', '>', $id],
        ['quiz_id', '=', $currentQuiz['quizId']]
    ])->first();

    $isExist = MCQ_Record::where([
        ['record_id', '=', $currentQuiz['recordId']],
        ['mcq_id', '=', $request->id],
    ])->count();

    if ($isExist < 1) {
        $mcq_record = new MCQ_Record;
        $mcq_record->record_id = $currentQuiz['recordId'];
        $mcq_record->user_id = Session::get('user')->id;
        $mcq_record->mcq_id = $request->id;
        $mcq_record->select_answer = $request->option;

        $correctAnswer = MCQ::find($request->id)->correct_ans;

        if ($request->option == $correctAnswer) {
            $mcq_record->is_correct = 1;
            $isCorrect = true;
        } else {
            $mcq_record->is_correct = 0;
            $isCorrect = false;
        }

        if (!$mcq_record->save()) {
            return "Something went wrong";
        }
    } else {
        $isCorrect = ($request->option == MCQ::find($request->id)->correct_ans);
        $correctAnswer = MCQ::find($request->id)->correct_ans;
    }

    Session::put('currentQuiz', $currentQuiz);

    // 🧩 STEP 3 — If more MCQs remain, show current question with result feedback
    if ($mcqData) {
        return view('mcq-page', [
            'quizName' => $currentQuiz['quizName'],
            'mcqData' => $mcqData,
            'showAnswer' => true,
            'isCorrect' => $isCorrect,
            'selectedOption' => $request->option,
            'correctAnswer' => MCQ::find($request->id)->$correctAnswer,
            'error' => null
        ]);
    } 
    // 🧩 STEP 4 — If no more MCQs, show result summary
    else {
        $resultData = MCQ_Record::WithMCQ()
            ->where('record_id', $currentQuiz['recordId'])
            ->get();

        $correctAnswers = MCQ_Record::where([
            ['record_id', '=', $currentQuiz['recordId']],
            ['is_correct', '=', 1],
        ])->count();

        $record = Record::find($currentQuiz['recordId']);
        if ($record) {
            $record->status = 2;
            $record->update();
        }

        return view('quiz-result', [
            'resultData' => $resultData,
            'correctAnswers' => $correctAnswers
        ]);
    }
}

    public function userDetails(){
        $quizRecord=Record::WithQuiz()->where('user_id',Session::get('user')->id)->paginate(10);
        return view('user-details',['quizRecord'=>$quizRecord]);
    }
    public function searchQuiz(Request $request){
       $quizData = Quiz::withCount('Mcq')->where('name','Like','%'.$request->search.'%')->get();

       // Check if no results found
    if ($quizData->isEmpty()) {
        // Option 1: Return view with a 'no results' message
        return view('quiz-search', [
            'quizData' => [],
            'quiz' => $request->search,
            'message' => 'No quizzes found for "' . $request->search . '".'
        ]);
    }

       return view('quiz-search',['quizData'=>$quizData,'quiz'=>$request->search]);
    }

   public function verifyUser($email){
      echo $orgEmail = Crypt::decryptString($email);
      $user= User::where('email',$orgEmail)->first();
      if($user){
      $user->active=2;

       if($user->save())
       {
       return redirect('/')->with('message-success',"User verified successfully");

      }
    }

 }

    public function userForgotPassword(Request $request){
        $link = Crypt::encryptString($request->email);
        $link = url('/user-forgot-password/'.$link);
        Mail::to($request->email)->send(new UserForgotPassword($link));
        return redirect('/')->with('message-success',"Please check email to reset your password");
    }

    public function userResetForgotPassword($email){
        $orgEmail = Crypt::decryptString($email);
        return view('user-set-forgot-password',['email'=>$orgEmail]);
    }

    public function userSetForgotPassword(Request $request){

        $validate = $request->validate([
            'email'=>'required | email',
            'password'=>'required | min:3 | confirmed',
        ]);

        $user = User::where('email',$request->email)->first();
        if ($user) {
            $user->password=Hash::make($request->password);
            if ($user->save()) {
                return redirect('user-login')->with('message-success',"Password reset successful! You can now log in with your new password.");
            }
        
        }

    }

    public function certificate(){
        $data=[];
        $data['quiz'] = str_replace('-',' ', Session::get('currentQuiz')['quizName']);
        $data['name'] = Session::get('user')['name'];
        return view('certificate',['data'=>$data]);
    }

    public function downloadCertificate(){
        $data=[];
        $data['quiz'] = str_replace('-',' ', Session::get('currentQuiz')['quizName']);
        $data['name'] = Session::get('user')['name'];
        $html = view('download-certificate',['data'=>$data])->render();
        return response(
            Browsershot::html($html)->pdf()
        )->withHeaders(
            [
                'Content-Type'=>"application/pdf",
                'Content-disposition'=>"attachment;filename=certificate.pdf"
            ]
        );
    }



}

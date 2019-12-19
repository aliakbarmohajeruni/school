<?php namespace App\Controllers\Dashboard;

use App\Controllers\Controller as Controller;
use App\Models\SMS;
use App\Models\Payment;
use App\Models\User;

class SMSController extends Controller {

    public function __construct()
    {

      if(!auth('teacher')->check())
          redirect('sign-in.php');
    }

    public function index()
    {
      return (new SMS)->all();
    }

    public function send()
    {
      if(request()->isPost()){

        $rules = [
              'course_id' => 'required',
              'body' => 'required',
         ];

         if(!validation(request()->all() , $rules)) {
           redirect('dashboard/sms/create.php');
         }

         $courses = function (int $course){
           return (new Payment)->where('course_id', $course)->get();
         };


         $phone = function (int $user){
           return (new User)->find('id', $user);
         };

        (new SMS)->create([
            'course_id' => request('course_id'),
            'body' => request('body'),
        ]);


        foreach ( $courses(request('course_id')) as $course) {
           $this->apiSMS(request('body') , $phone($course->user_id)->phone_number);
        }

        flash()->success('ارسال پیام باموفقیت انجام شد');
        redirect('dashboard/sms/');
     }
   }

   public function apiSMS($text ,$to)
   {
     $text = urlencode($text);
     return file_get_contents("http://lemon-fpi.ir/sms?text={$text}&to=0{$to}");
   }


}


?>

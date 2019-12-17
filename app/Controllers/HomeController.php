<?php namespace App\Controllers;

use App\Models\Course;
use App\Models\News;
use App\Models\Payment;

class HomeController extends Controller {

    public function course()
    {
      if(empty(request()->input('id',false)))
            redirect('/');

        if(!(new Course())->where('status' ,true)->find('id', request()->input('id',false)))
          redirect('/');

       return (new Course())->where('status' ,true)->find('id', request()->input('id',false));
    }

    public function news()
    {
      if(empty(request()->input('id',false)))
            redirect('/');

        if(!(new News())->where('status' ,true)->find('id', request()->input('id',false)))
          redirect('/');

       return (new News())->where('status' ,true)->find('id', request()->input('id',false));
    }

    public function selfPayment()
    {
      if(!auth()->check())
          redirect('/');

      return (new Payment)
              ->where('user_id' , auth()->info()->id)
              ->lasted()
              ->get();

    }

    public function pay(object $course)
    {


      if(request()->input('buy',false) and auth()->check()){

        if($this->checkPayment($course->id)){
          flash()->info('قبلا دراین دوره ثبت نام کردید');
          redirect('user/pay.php');
        }

         (new Payment)->create([
            'course_id' => $course->id,
            'track_id' => bin2hex(random_bytes(16)),
            'pay_id' => bin2hex(random_bytes(16)),
            'price' => $course->price,
            'user_id' => (auth()->info())->id
         ]);

         flash()->success('خرید شما باموفقیت ثبت شد');
         redirect('user/pay.php');

       }

    }

    private function checkPayment(int $idCourse)
    {
        $pay = (new Payment)
              ->where('course_id' , $idCourse)
              ->where('user_id' ,(auth()->info())->id)
              ->get();

        if($pay)
          return true;

        return false;
    }
}

?>

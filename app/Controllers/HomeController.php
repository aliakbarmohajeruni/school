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


        if($course->capacity <= 0){
            flash()->danger('ظرفیت دوره تکمیل شده است');
            redirect('/');
        }

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

         (new Course)->capacityDecrement($course->id);

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

    public function getCertificate($id)
    {
        if((request()->input('course',false)) and auth()->check())
        {
          $course = function(int $id){
            return (new Course)->find('id' ,$id);
          };

          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./../public/certificate.docx');
          $templateProcessor->setValue(
              ['full_name', 'course', 'date_held'],
              [
               auth()->info()->full_name,
               $course($id)->title,
               $course($id)->date_held
             ]
           );
          $name = time();
          $templateProcessor->saveAs("./{$name}.docx");
          header("Content-type:application/doxc");
          header("Content-Disposition:attachment;filename=$name.docx");
          readfile("./{$name}.docx");
          unlink("./{$name}.docx");

        }
    }
}

?>

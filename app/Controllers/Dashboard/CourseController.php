<?php namespace App\Controllers\Dashboard;

use App\Controllers\Controller as Controller;
use App\Models\Course;

class CourseController extends Controller {

    public function __construct()
    {
      if(!auth('teacher')->check())
          redirect('sign-in.php');
    }

    public function index()
    {
       return (new Course)->lasted()->all();
    }

    public function store()
    {

        if(request()->isPost()){

          $rules = [
                'title' => 'required',
                'body' => 'required',
                'capacity' => 'required',
                'date_held' => 'required',
                'price' => 'required',
                'teacher_id' => 'required'
           ];

           if(!validation(request()->all() , $rules)) {
             redirect('dashboard/courses/create.php');
           }

           if(!request()->hasFile('image')){
             flash()->danger('فایل عکس الزامی می باشد');
             redirect('dashboard/courses/create.php');
           }

          (new Course)->create([
              'title' => request('title'),
              'body' => request('body'),
              'image' => upload('image', 'images\courses'),
              'capacity' => request('capacity'),
              'date_held' => request('date_held'),
              'price' => request('price'),
              'teacher_id' => request('teacher_id')
          ]);

          flash()->success('باموفقیت دوره  آموزشی ذخیره شد');
          redirect('dashboard/courses/');
       }

    }

    public function edit()
    {

      if(empty(request()->input('id',false)))
            redirect('dashboard/courses');

        if(!(new Course())->find('id', request()->input('id',false)))
          redirect('dashboard/courses');

       return (new Course())->find('id', request()->input('id',false));

    }

    public function update()
    {

      if(empty(request()->input('id',false)))
          redirect('dashboard/courses');

      $id = request()->input('id',false);

      if(!request()->isPost())
          redirect('dashboard/courses');

      $rules = [
            'title' => 'required',
            'body' => 'required',
            'capacity' => 'required',
            'date_held' => 'required',
            'price' => 'required',
            'teacher_id' => 'required'
       ];

       if(!validation(request()->all() , $rules)) {
           redirect("dashboard/courses/create.php?id={$id}");
       }

       $data = [
           'title' => request('title'),
           'body' => request('body'),
           'capacity' => request('capacity'),
           'date_held' => request('date_held'),
           'price' => request('price'),
           'teacher_id' => request('teacher_id')
       ];

      if(request()->hasFile('image')){
        $data = array_merge($data, [
          'image' => upload('image', 'images\courses')
        ]);
      }

      (new Course)->update($id ,$data);

      flash()->success('دوره مورد نظر ویرایش شد');
      redirect('dashboard/courses/');


    }

    public function delete()
    {
      if(empty(request()->input('id',false)))
            redirect('dashboard/courses');

        if(!(new Course())->find('id' , request()->input('id',false)))
          redirect('dashboard/courses');

       (new Course())->delete(request()->input('id',false));
       flash()->info('مدرس مدنظر حذف شد.');
       redirect('dashboard/courses');
    }

}

?>

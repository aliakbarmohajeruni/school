<?php namespace App\Controllers\Dashboard;

use App\Controllers\Controller as Controller;
use App\Models\News;

class  NewsController extends Controller {

    public function __construct()
    {
      if(!auth('teacher')->check())
          redirect('sign-in.php');
    }

    public function index()
    {
       return (new News)->all();
    }

    public function store()
    {

        if(request()->isPost()){

          $rules = [
                'title' => 'required',
                'content' => 'required',
           ];

           if(!validation(request()->all() , $rules)) {
             redirect('dashboard/news/create.php');
           }

           if(!request()->hasFile('image')){
             flash()->danger('فایل عکس الزامی می باشد');
             redirect('dashboard/news/create.php');
           }

          (new News)->create([
              'title' => request('title'),
              'content' => request('content'),
              'image' => upload('image', 'images\news'),
          ]);

          flash()->success('باموفقیت خبر ثبت و ذخیره شد');
          redirect('dashboard/news/');
       }

    }

    public function edit()
    {

      if(empty(request()->input('id',false)))
            redirect('dashboard/news');

        if(!(new News())->find('id', request()->input('id',false)))
          redirect('dashboard/news');

       return (new News())->find('id', request()->input('id',false));

    }

    public function update()
    {

      if(empty(request()->input('id',false)))
          redirect('dashboard/news');

      $id = request()->input('id',false);

      if(!request()->isPost())
          redirect('dashboard/news');

      $rules = [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required'
       ];

       if(!validation(request()->all() , $rules)) {
         redirect("dashboard/news/create.php?id={$id}");
       }

      $data = [
          'title' => request('title'),
          'content' => request('content'),
          'status' => request('status')
      ];

      if(request()->hasFile('image')){
        $data = array_merge($data, [
          'image' => upload('image', 'images\courses')
        ]);
      }

      (new News)->update($id ,$data);

      flash()->success('دوره مورد نظر ویرایش شد');
      redirect('dashboard/news/');


    }

    public function delete()
    {
      if(empty(request()->input('id',false)))
            redirect('dashboard/news');

        if(!(new News())->find('id' , request()->input('id',false)))
          redirect('dashboard/news');

       (new News())->delete(request()->input('id',false));
       flash()->info('خبر مورد نظر پاک شد');
       redirect('dashboard/news');
    }

}

?>

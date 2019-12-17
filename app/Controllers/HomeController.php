<?php namespace App\Controllers;

use App\Models\Course;
use App\Models\News;

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
}

?>

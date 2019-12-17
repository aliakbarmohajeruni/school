<?php namespace App\Controllers;

use App\Models\User;

class AuthUserController extends Controller {


  public function login()
  {

    if(auth()->check())
        redirect('/');

    if(request()->isPost()){

      $rules = [
           'username' => 'required',
           'password' => 'required|min:3',
       ];

       if(!validation(request()->all() , $rules)) {
           redirect();
           return;
       }

       $auth = new User;
       $auth->username = request('username');
       $auth->password = request('password');

       if(!$auth->login()){
          flash()->danger('.نام کاربری ویا رمز عبور شما صحیح نمی باشد');
          redirect('/');
       }

      flash()->success('.باموفقیت وارد پنل مدیریت شدید');
      redirect('user/index.php');

    }

  }


  public function register()
  {

    if(auth()->check())
        redirect('/');

    if(request()->isPost()){

      $rules = [
           'full_name' => 'required',
           'phone_number' => 'required|min:10',
           'username' => 'required',
           'password' => 'required|min:3',
       ];

       if(!validation(request()->all() , $rules)) {
           redirect('/');
           return;
       }

       (new User)->create([
           'full_name' => request('full_name'),
           'phone_number' => request('phone_number'),
           'username' => request('username'),
           'password' => request('password'),
       ]);

       $auth = (new User);
       $auth->username = request('username');
       $auth->password = request('password');

       if(!$auth->login()){
          flash()->danger('نام کاربری شما مشکلی ندارد');
          redirect('/');
       }

      flash()->success('باموفقیت وارد پنل کاربری شدید');
      redirect('user/index.php');

    }

  }

  public function logout()
  {
    if(!auth()->check())
        redirect('/');

     auth()->logout();
     redirect('/');
  }


}
 ?>

<?php namespace App\Controllers\User;

use App\Controllers\Controller as Controller;
use App\Models\User;

class UserController extends Controller {

  public function editInfo()
  {
    if(!auth()->check())
        redirect('/');

    if(request()->isPost()){

      $rules = [
           'full_name' => 'required',
           'phone_number' => 'required|min:10',
           'username' => 'required',
           'password' => 'required|min:3',
       ];

       if(!validation(request()->all() , $rules)) {
           redirect('user/index.php');
           return;
       }

       $id = (auth()->info())->id;

       (new User)->update($id,[
           'full_name' => request('full_name'),
           'phone_number' => request('phone_number'),
           'username' => request('username'),
           'password' => request('password'),
       ]);


      flash()->success('اطلاعات شما ویرایش شد');
      auth()->logout();
      redirect('/');

    }

  }

}

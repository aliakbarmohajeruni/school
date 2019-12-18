<?php namespace App\Controllers\Dashboard;

use App\Controllers\Controller as Controller;
use App\Models\User;

class UserController extends Controller {

    public function __construct()
    {
      if(!auth('teacher')->check())
          redirect('sign-in.php');
    }

    public function index()
    {
       return (new User)->lasted()->all();
    }


    public function edit()
    {

      if(empty(request()->input('id',false)))
            redirect('dashboard/users');

        if(!(new User())->find('id', request()->input('id',false)))
          redirect('dashboard/users');

       return (new User())->find('id', request()->input('id',false));

    }

    public function update()
    {

      if(empty(request()->input('id',false)))
          redirect('dashboard/users');

      $id = request()->input('id',false);

      if(!request()->isPost())
          redirect('dashboard/users');

      $rules = [
            'full_name' => 'required',
            'username' => 'required',
            'password' => 'required|min:3',
       ];

       if(!validation(request()->all() , $rules)) {
           redirect("dashboard/users/edit.php?id={$id}");
       }

      (new User)->update($id, [
          'full_name' => request('full_name'),
          'username' => request('username'),
          'password' => request('password'),
      ]);

      flash()->success('باموفقیت اطلاعات کاربر ویرایش شد');
      redirect('dashboard/users/');


    }

    public function delete()
    {
      if(empty(request()->input('id',false)))
            redirect('dashboard/users');

        if(!(new User())->find('id' , request()->input('id',false)))
          redirect('dashboard/users');

       (new User())->delete(request()->input('id',false));
       flash()->info('کاربر مورد نظر حذف شد');
       redirect('dashboard/users');
    }

}

?>

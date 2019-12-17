<?php namespace App\Models;

class User extends DB
{

    public $username;
    public $password;
    protected $table = 'users';

    public function login()
    {
      $user = $this->find('username' ,$this->username);

      if(!$user){ return false; }

      if($user->password !== $this->password){ return false; }

      session()->set('username', $this->username);
      return true;
    }

    public function check()
    {
      if(session('username')) {
             $user = $this->find('username' , session('username'));
             if($user)
                 return true;
             session()->forget('username');
         }
         return false;
    }

    public function info()
    {
      if(session('username')) {
             $user = $this->find('username' , session('username'));
             if($user)
                 return $user;
         }
         return false;
    }

    public function logout()
    {
       session_destroy();
       redirect('/');
    }

}
?>

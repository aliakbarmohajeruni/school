<?php

  $config = require __DIR__ .'./config.php';
  define('ROOT_PATH', $config['Route']['Path']);
  define('ROOT', $config['Route']['Root']);


function viewRender($layout, $title = 'Document'){
  $content = ob_get_clean();
  require_once __DIR__. "./../partials/{$layout}";
}

function session($key = null) {
    $session = new \App\Core\Session();
    if(is_null($key))
        return $session;

    return $session->get($key);
}

function old($field) {
    return request($field);
}

function request($field = null) {
    $request = new \App\Core\Request();
    if(is_null($field))
        return $request;

    return $request->input($field);
}

function _public($path = null)
{
    $DS  = DIRECTORY_SEPARATOR;
    return __DIR__ . $DS .'..'. $DS .'public'. $DS . $path . $DS;
}

function flash() {
  return \App\Core\FlashMessage::instance();
}

function validation($data , $rules)
{
   $validation = new \App\Core\Validation();

   $valid = $validation->validate($data , $rules);

   if(! $valid) {
       foreach ($validation->getErrors() as $error) {
          flash()->danger($error[0]);
       }
       return false;
   }

   return true;
}

function upload($name, $path, array $allowed = ['image/*']){

  $handle = new \Verot\Upload\Upload($_FILES[$name]);
  $image = '';
  if ($handle->uploaded) {
    $handle->file_name_body_pre = time().'_';
    $handle->allowed = $allowed;
    $handle->process(_public($path));
    if (!$handle->processed) {
      flash()->danger($handle->error);
      return;
    }
    $image = $path .DIRECTORY_SEPARATOR. $handle->file_dst_name;
    $handle->clean();
  }
  return $image;

}

function auth($graud = 'user')
{
    $auth = '';
    switch ($graud) {
      case 'user':
        $auth = new \App\Models\User;
        break;
      case 'teacher':
        $auth = new \App\Models\Teacher;
        break;
      default:
        $auth = new \App\Models\User;
    }

    return $auth;
}

function redirect($param = null) {
    if(is_null($param))
        $param = ROOT;
    header('location:'. ROOT. $param);
    exit();
}

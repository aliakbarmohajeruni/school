<?php require_once  __DIR__ .'./../bootstrap/autoload.php';
header('Content-Type: text/html; charset=utf-8');
(new App\Controllers\HomeController)->getCertificate(request()->input('course',false));
?>

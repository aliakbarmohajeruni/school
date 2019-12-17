<?php require_once  __DIR__ .'./bootstrap/autoload.php';
(new App\Controllers\AuthTeacherController)->login();
?>

<div class="row">
  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header bg-primary text-white">ورود کاربر</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?=ROOT?>sign-in.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <label for="username">نام کاربری</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="نام کاربری" >
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputPassword">رمز عبور</label>
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="رمز عبور">
            </div>
          </div>
          </div>
          <div class="form-group p-2">
              <button type="submit" class="btn btn-primary btn-block">ورود</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php viewRender('Page/layout.php' , 'صفحه ورود مدیریتی'); ?>

<?php require_once  __DIR__ .'./../bootstrap/autoload.php';
(new App\Controllers\User\UserController)->editInfo();
?>

<div class="container">
  <div class="row">

    <div class="col-sm-3">
      <div class="list-group">
        <a href="<?= ROOT?>user/index.php" class="list-group-item list-group-item-action">ویرایش اطلاعات</a>
        <a href="<?= ROOT?>user/courses.php" class="list-group-item list-group-item-action">دوره های ثبت نام شده</a>
        <a href="<?= ROOT?>user/pay.php" class="list-group-item list-group-item-action">پرداختی ها</a>
      </div>
    </div>

    <div class="col-sm-9">
      <div class="card mb-5">
        <div class="card-body">
          <form action="<?= ROOT?>user/index.php" method="post">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="full_name">نام و نام خانوادگی</label>
                  <input type="text" class="form-control" id="full_name" name="full_name" value="<?= (auth()->info())->full_name ?>">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="phone_number">شماره تماس</label>
                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= (auth()->info())->phone_number ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="username">نام کاربری</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?= (auth()->info())->username ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="password">پسورد</label>
                  <input type="password" class="form-control" id="password" name="password" value="<?= (auth()->info())->password ?>">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">ویرایش</button>
          </form>
        </div>
      </div>
    </div>

</div>

<?php viewRender('Home/layout.php' ,'ویرایش اطلاعات'); ?>

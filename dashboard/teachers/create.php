<?php require_once  __DIR__ . './../../bootstrap/autoload.php';
(new App\Controllers\Dashboard\TeacherController)->store();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        افزودن مدرس
      </h5>
    </div>
    <div class="card-body">
      <div class="col-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>نام مدرس</label>
                <input type="text" name="full_name" class="form-control" value="<?=old('full_name')?>">
            </div>
            <div class="form-group">
                <label>بیوگرافی و تخصص</label>
                <textarea name="bio" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" name="username" class="form-control" value="<?=old('username')?>">
            </div>
            <div class="form-group">
                <label>رمز عبور</label>
                <input type="password" name="password" class="form-control" value="<?=old('password')?>">
            </div>
            <div class="form-group">
                <label>آواتار</label>
                <input type="file" class="form-control-file" name="avater">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-dark">ثبت مدرس</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | افزودن مدرس'); ?>

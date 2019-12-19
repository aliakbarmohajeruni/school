<?php require_once  __DIR__ . './../../bootstrap/autoload.php';
(new App\Controllers\Dashboard\SMSController)->send();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        ارسال پیام
      </h5>
    </div>
    <div class="card-body">
      <div class="col-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">کاربران  ثبت نام شده دوره ای</label>
                <select name="course_id" class="form-control">
                  <?php foreach((new \App\Models\Course)->all() as $course): ?>
                    <option value="<?=$course->id?>"><?=$course->title?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">متن پیام</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-dark btn-lg">ارسال</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | ارسال پیام'); ?>

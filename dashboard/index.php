<?php require_once  __DIR__ . './../bootstrap/autoload.php';

(new App\Controllers\Dashboard\DashboardController);
?>

<h2 class="main_content_title">داشبورد</h2>

<div class="row">
  <div class="col-3">
    <div class="card bg-light">
        <div class="card-header">
          (<?= count((new \App\Models\Course)->all()) ?>)
          تعداد دوره های آموزشی
        </div>
    </div>
  </div>

  <div class="col-3">
   <div class="card bg-light">
       <div class="card-header">
         (<?= count((new \App\Models\Teacher)->all()) ?>)
         تعداد مدرسان
       </div>
   </div>
  </div>

  <div class="col-3">
     <div class="card bg-light">
         <div class="card-header">
           (<?= count((new \App\Models\User)->all()) ?>)
           تعداد کاربران
         </div>
     </div>
  </div>

  <div class="col-3">
    <div class="card bg-light">
        <div class="card-header">
          (<?= count((new \App\Models\Payment)->all()) ?>)
          تعداد کل افراد ثبت نام کننده
        </div>
    </div>
  </div>

</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت'); ?>

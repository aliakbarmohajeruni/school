<?php require_once  __DIR__ .'./../../bootstrap/autoload.php';
$sms = (new App\Controllers\Dashboard\SMSController)->index();
$course = function(int $id){
  return (new App\Models\Course)->find('id' ,$id);
};
?>


<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        لیست پیام های ارسال شده به کاربران
      </h5>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody>
        <tr>
          <th>
            نام دوره
          </th>
          <th>
            متن پیام
          </th>
          <th>
            تاریخ ارسال
          </th>
        </tr>

        <?php foreach($sms as $item): ?>
          <tr>
            <th><?= $course($item->course_id)->title ?></th>
            <th><?= $item->body ?></th>
            <th><?= $item->created_at ?></th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<?php viewRender('Panel/layout.php' , 'پنل مدیریت | لیست پیام های کوتاه'); ?>

<?php require_once  __DIR__ .'./../../bootstrap/autoload.php';
$payments = (new App\Controllers\Dashboard\PaymentController)->index();

$course = function(int $id){
  return (new App\Models\Course)->find('id' ,$id);
};

$user = function(int $id){
  return (new App\Models\User)->find('id' ,$id);
};

?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        لیست پرداختی ها
      </h5>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody>
          <tr>
            <th>
              عنوان دوره
            </th>
            <th>
              کدرهگیری
            </th>
            <th>
              پرداخت کننده
            </th>
            <th>
              تاریخ پرداخت
            </th>
            <th>
              وضعیت
            </th>
            <th>
              عملیات
            </th>

          </tr>

        <?php foreach($payments as $payment): ?>
          <tr>
            <th><?= $course($payment->course_id)->title ?></th>
            <th><?= $payment->track_id ?></th>
            <th><?= $user($payment->user_id)->full_name ?></th>
            <th><?= $payment->created_at ?></th>
            <td>
              <?php if($payment->status): ?>
                <span class="badge badge-success">پرداخت شده</span>
              <?php else: ?>
                <span class="badge badge-danger">پرداخت نشده</span>
              <?php endif; ?>
            </td>
            <th>
                <a href="<?= ROOT ?>dashboard/payments/delete.php?id=<?= $payment->id ?>" class="btn btn-danger btn-sm">
                  حذف
                </a>
            </th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | پرداختی ها'); ?>

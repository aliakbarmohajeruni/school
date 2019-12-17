<?php require_once  __DIR__ .'./../bootstrap/autoload.php';
$payments = (new App\Controllers\HomeController)->selfPayment();

$course = function(int $id){
  return (new App\Models\Course)->find('id' ,$id);
}
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
          <table class="table table-striped">
            <thead>
              <tr>
                <th>عنوان دوره</th>
                <th>مبلغ پرداختی</th>
                <th>کد رهگیری</th>
                <th>وضعیت پرداخت</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($payments as $payment): ?>
              <tr>
                <td><?= $course($payment->course_id)->title ?></td>
                <td><?= number_format($course($payment->course_id)->price) ?> تومان </td>
                <td><?= $payment->track_id ?></td>
                <td>
                  <?php if($payment->status): ?>
                    <span class="badge badge-success">پرداخت شده</span>
                  <?php else: ?>
                    <span class="badge badge-danger">پرداخت نشده</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>

<?php viewRender('Home/layout.php' ,'پرداختی ها'); ?>

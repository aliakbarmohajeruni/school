<?php require_once  __DIR__ .'./../bootstrap/autoload.php';

$payments = (new App\Controllers\HomeController)->selfPayment();

$course = function(int $id){
  return (new App\Models\Course)->find('id' ,$id);
};

$teacher = function(int $id){
  return (new App\Models\Teacher)->find('id' ,$id);
};
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
                <th colspan="2">عنوان دوره</th>
                <th colspan="2">نام مدرس</th>
                <th>گواهینامه</th>
                <th>تاریخ برگزاری</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($payments as $payment): ?>
              <tr>
                <th width="60">
                  <img
                  class="rounded image-fit"
                  src="<?= ROOT_PATH . $course($payment->course_id)->image ?>"
                  width="60"
                  height="60">
                </th>
                <td><?= $course($payment->course_id)->title ?></td>
                <th width="60">
                  <img
                  class="rounded-circle image-fit"
                  src="<?= ROOT_PATH . $teacher($course($payment->course_id)->teacher_id)->avater ?>"
                  width="42"
                  height="42">
                </th>
                <td><?= $teacher($course($payment->course_id)->teacher_id)->full_name ?></td>
                <td>
                  <a
                  href="<?=ROOT?>user/certificate.php?course=<?=$payment->course_id?>"
                  class="btn btn-info btn-sm"
                  >دانلود گواهینامه دوره</a>
                </td>
                <td><?= date("d - M - Y", strtotime($course($payment->course_id)->date_held)) ?></td>
              </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>

<?php viewRender('Home/layout.php' ,'دوره های ثبت نام شده'); ?>

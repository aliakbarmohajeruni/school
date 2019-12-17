<?php require_once  __DIR__ .'./bootstrap/autoload.php';
$course = (new App\Controllers\HomeController)->course();
?>

<div class="container">
  <div class="row">
      <div class="col-4">

        <div class="card text-black bg-default mt-4 " style="max-width: 18rem;">
          <div class="card-header">اطلاعات دوره</div>
          <div class="card-body">
            <!-- <h6 class="card-title ">برای دسترسی به این دوره نیاز است عضو ویژه سایت باشید</h6> -->
            <div class="card-text">
              <table width="100%">
                <tr height="40">
                  <th>زمان برگزاری</th>
                  <td><?= date("d - M - Y", strtotime($course->date_held)) ?></td>
                </tr>
                <tr height="40">
                  <th>نام مدرس</th>
                  <td><?= ((new \App\Models\Teacher)->find('id' ,$course->teacher_id))->full_name ?></td>
                </tr>
                <tr height="40">
                  <th>تعداد ظرفیت</th>
                  <td><?= $course->capacity ?> نفر </td>
                </tr>
              </table>
              <a href="#" class="btn btn-outline-primary btn-block mt-3">خرید دوره</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-8">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?= ROOT_PATH . $course->image ?>">
          <div class="card-body">
            <h3 class="card-title"><?= $course->title ?></h3>
            <h4><?= number_format($course->price) ?> تومان </h4>
            <p class="card-text"><?= $course->body ?></p>
            <span class="text-warning">★ ★ ★ ★ ☆</span>
          </div>
        </div>

      </div>
    </div>
</div>

<?php viewRender('Home/layout.php' , $course->title ); ?>

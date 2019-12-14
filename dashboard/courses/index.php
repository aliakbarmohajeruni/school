<?php require_once  __DIR__ . './../../bootstrap/autoload.php';
$courses = (new App\Controllers\Dashboard\CourseController)->index();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        لیست دوره ها
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
              ظرفیت
            </th>
            <th>
              مدرس
            </th>
            <th>
              زمان برگذاری
            </th>
            <th>
              قیمت
            </th>
            <th>
              لیست حضور و غیاب
            </th>
            <th>
              عملیات
            </th>
          </tr>

        <?php foreach($courses as $course): ?>
          <tr>
            <th><?= $course->title ?></th>
            <th><?= $course->capacity ?></th>
            <th><?= ((new \App\Models\Teacher)->find('id' ,$course->teacher_id))->full_name ?></th>
            <th><?= $course->date_held ?></th>
            <th><?= number_format($course->price) ?> تومان</th>
            <th><a>دانلود </a></th>
            <th>
                <a href="<?= ROOT ?>dashboard/courses/delete.php?id=<?= $course->id ?>" class="btn btn-danger btn-sm">
                  حذف
                </a>
                <a href="<?= ROOT ?>dashboard/courses/edit.php?id=<?= $course->id ?>" class="btn btn-info btn-sm">
                    ویرایش
                </a>
            </th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | لیست دوره ها'); ?>

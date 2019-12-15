<?php require_once  __DIR__ .'./../../bootstrap/autoload.php';
$teachers = (new App\Controllers\Dashboard\TeacherController)->index();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        لیست مدرسین
      </h5>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody>
        <tr>
          <th colspan="2">
            نام مدرس
          </th>
          <th>
            نام کاربری
          </th>
          <th>
              بیوگرافی مدرس
          </th>
          <th>عملیات</th>
        </tr>

        <?php foreach($teachers as $teacher): ?>
          <tr>
            <th width="20">
              <img
              class="rounded-circle image-fit"
              src="<?= ROOT_PATH. $teacher->avater ?>"
              height="42"
              width="42">
            </th>
            <th><?= $teacher->full_name ?></th>
            <th><?= $teacher->username ?></th>
            <th><?= $teacher->bio ?></th>
            <th>
                <a href="<?= ROOT ?>dashboard/teachers/delete.php?id=<?= $teacher->id ?>" class="btn btn-danger btn-sm">
                  حذف
                </a>
                <a href="<?= ROOT ?>dashboard/teachers/edit.php?id=<?= $teacher->id ?>" class="btn btn-info btn-sm">
                    ویرایش
                </a>
            </th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>
<?php viewRender('Panel/layout.php', 'پنل مدیریت | لیست مدرسین'); ?>

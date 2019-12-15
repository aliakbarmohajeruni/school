<?php require_once  __DIR__ . './../../bootstrap/autoload.php';
$course = (new App\Controllers\Dashboard\CourseController)->edit();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        ویرایش دوره
      </h5>
    </div>
    <div class="card-body">
      <div class="col-6">
        <form action="<?=ROOT?>dashboard/courses/update.php?id=<?=$course->id?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">نام دوره</label>
                <input type="text" name="title" class="form-control" value="<?= $course->title ?>">
            </div>
            <div class="form-group">
                <label for="">توضیحات دوره</label>
                <textarea type="text" name="body" class="form-control"><?= $course->body ?></textarea>
            </div>

            <div class="form-group">
                <label> مدرس</label>
                <select class="form-control" name="teacher_id">
                  <?php foreach ((new \App\Models\teacher)->all() as $teacher): ?>
                    <option value="<?= $teacher->id ?>"
                      <?= ($teacher->id== $course->teacher_id)? 'selected':'' ?>
                      >
                      <?= $teacher->full_name ?>
                    </option>
                  <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>ظرفیت دوره</label>
                <input type="number" name="capacity" class="form-control" value="<?= $course->capacity ?>">
            </div>
            <div class="form-group">
                <label>زمان برگزاری</label>
                <input type="text" name="date_held" class="form-control" value="<?= $course->date_held ?>">
            </div>
            <div class="form-group">
                <label>قیمت</label>
                <input type="text" name="price" class="form-control" value="<?= $course->price ?>">
            </div>
            <div class="form-group">
                <label>تصویر شاخص</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-dark btn-lg">ویرایش</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | ویرایش دوره'); ?>

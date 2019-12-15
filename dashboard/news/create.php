<?php require_once  __DIR__ . './../../bootstrap/autoload.php';
(new App\Controllers\Dashboard\NewsController)->store();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        افزودن خبر
      </h5>
    </div>
    <div class="card-body">
      <div class="col-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">عنوان خبر</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">توضیحات</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">تصویر شاخص</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-dark btn-lg">ثبت خبر</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'Admin Dashboard | Add News'); ?>

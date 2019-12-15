<?php require_once  __DIR__ .'./../../bootstrap/autoload.php';
$news = (new App\Controllers\Dashboard\NewsController)->edit();
?>
<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        ویرایش خبر
      </h5>
    </div>
    <div class="card-body">
      <div class="col-6">
        <form action="<?=ROOT?>dashboard/news/update.php?id=<?=$news->id?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">عنوان خبر</label>
                <input type="text" name="title" class="form-control" value="<?= $news->title ?>">
            </div>
            <div class="form-group">
                <label for="">توضیحات</label>
                <textarea name="content" class="form-control" ><?= $news->content ?></textarea>
            </div>
            <div class="form-group">
              <label for="status">وضعیت نمایش</label>
              <select class="form-control" id="status" name="status">
                <option value="1" <?= ($news->status)? "selected" : "" ?> >فعال</option>
                <option value="0" <?= (!$news->status)? "selected" : "" ?>  >غیرفعال</option>
              </select>
            </div>
            <div class="form-group">
                <label for="">تصویر شاخص</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-dark btn-lg">ویرایش</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | ویرایش خبر'); ?>

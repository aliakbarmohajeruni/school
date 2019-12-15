<?php require_once  __DIR__ .'./../../bootstrap/autoload.php';
$news = (new App\Controllers\Dashboard\NewsController)->index();
?>

<div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title float-right">
        لیست اخبار
      </h5>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody>
          <tr>
            <th colspan="2">
              عنوان خبر
            </th>
            <th>
                توضیحات
            </th>
            <th>
              وضعیت
            </th>
            <th>عملیات</th>
          </tr>
        <?php foreach($news as $item): ?>
          <tr>
            <th width="60">
              <img
              class="rounded image-fit"
              src="<?= ROOT_PATH . $item->image ?>"
              width="60"
              height="60">
            </th>
            <th width="250"><?= $item->title ?></th>
            <th width="500"><?= substr($item->content, 0, 140) ?></th>
            <th>
              <?php if($item->status): ?>
                <span class="badge badge-success">فعال</span>
              <?php else: ?>
                <span class="badge badge-danger">غیرفعال</span>
              <?php endif; ?>
            </th>
            <th>
                <a href="<?= ROOT ?>dashboard/news/delete.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm">
                  حذف
                </a>
                <a href="<?= ROOT ?>dashboard/news/edit.php?id=<?= $item->id ?>" class="btn btn-info btn-sm">
                    ویرایش
                </a>
            </th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>

<?php viewRender('Panel/layout.php', 'پنل مدیریت | اخبار'); ?>

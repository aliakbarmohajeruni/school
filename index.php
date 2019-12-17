<?php require_once  __DIR__ .'./bootstrap/autoload.php';

use App\Models\Course;
use App\Models\News;

?>

<div class="col-md-12 mt_gray_bgc p-5" id="course">
    <div class="container">
        <div class="mt_title_bar">
            <h2>دوره ها</h2>
        </div>
        <div class="col-md-12 my-3">
            <div class="row">
              <?php foreach ((new Course)->get() as $course): ?>
                <div class="card col-md-3 p-0 mt_card">
                    <img src="<?= ROOT_PATH . $course->image ?>" class="card-img-top object-fit-cover" alt="<?= $course->title ?>">
                    <div class="card-body d-flex flex-column bd-highlight">
                        <div class="flex-sm-grow-1"><?= $course->title ?></div>
                        <div class="body-course">
                            <a href="<?= ROOT ?>course.php?id=<?= $course->id ?>" class="btn btn-link ">مشاهده دوره</a>
                            <p class="p-10">
                                 <?= number_format($course->price) ?> تومان
                            </p>
                        </div>
                      </div>
                </div>
              <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-5" id="news">
    <div class="container">
        <div class="mt_title_bar">
            <h2>جدید ترین اخبار</h2>
        </div>
        <div class="row my-5">
          <?php foreach (array_chunk((new News)->where('status', true)->get(), 2) as $items): ?>
            <div class="col-md-6">
              <?php foreach ($items as $item): ?>
                <div class="mt_news_style_1 col-md-12 p-0">
                    <div class=" mt_news_style_1_thumbnail p-0">
                        <img src="<?= ROOT_PATH. $item->image ?>" class="object-fit-cover" alt="<?= $item->title ?>">
                    </div>
                    <div class=" mt_news_style_1_description p-2">
                        <a href="<?= ROOT ?>news.php?id=<?= $item->id ?>"><?= $item->title ?></a>
                        <p><?=  substr($item->content, 0, 100). '...' ?></p>
                    </div>

                </div>
              <?php endforeach ?>
            </div>
          <?php endforeach ?>
        </div>
    </div>
</div>

<?php viewRender('Home/layout.php' , 'وب سایت آموزشی'); ?>

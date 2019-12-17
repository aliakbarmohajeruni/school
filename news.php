<?php require_once  __DIR__ .'./bootstrap/autoload.php';
$news = (new App\Controllers\HomeController)->news();
?>

<div class="mt_single_news col-md-12 py-5">
    <div class="container">
        <div class="mt_single_post col-md-12">
            <div style="margin: 15px;">
                <h1>
                  <?= $news->title ?>
                </h1>
                <div class="mt_single_post_data">
                    <p> زمان قرارگیری (<?= $news->created_at ?>) </p>
                </div>
                <hr>
            </div>
            <div class="mt_single_post_section col-md-12">
                <img src="<?= ROOT_PATH . $news->image ?>" class="img-fluid" alt="<?= $news->title ?>">

            </div>
            <div class="mt_single_post_description my-5">
                <p>
                  <?= $news->content ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php viewRender('Home/layout.php' , $news->title ); ?>

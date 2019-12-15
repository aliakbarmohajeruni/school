<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link href="<?= ROOT_PATH  ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= ROOT_PATH  ?>css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="<?= ROOT_PATH  ?>css/style.css" rel="stylesheet">
    <link href="<?= ROOT_PATH  ?>css/font-vazir.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
  <a class="navbar-brand" href="#">آموزش </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav px-2">
      <li class="nav-item active">
        <a class="nav-link" href="#">صفحه اصلی <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">دوره ها </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">اخبار</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">مدرس ها</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">دریافت گواهینامه</a>
      </li>
    </ul>
  </div>
</nav>
<div class="mt_main">
  <?= $content ?>
</div>
<footer class="footer-area footer--light">
  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>
              هدف مجموعه افزایش سطح کیفیت اموزش و ساختن راهی برای  ورود دانشجویان به بازار کار تخصصی است
            </p>
          </div>

          <div class="go_top">
            <span class="icon-arrow-up"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="<?= ROOT_PATH  ?>js/jquery-3.3.1.slim.min.js"></script>
<script src="<?= ROOT_PATH  ?>js/bootstrap.bundle.min.js">
</script>
</body>
</html>

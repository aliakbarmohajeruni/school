<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title><?= $title ?></title>
  <link href="<?= ROOT_PATH  ?>css/font-awesome.min.css" rel="stylesheet" >
  <link href="<?= ROOT_PATH  ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT_PATH  ?>css/bootstrap-rtl.min.css" rel="stylesheet">
  <link href="<?= ROOT_PATH  ?>css/font-vazir.css" rel="stylesheet">
  <link href="<?= ROOT_PATH  ?>css/panel.css" rel="stylesheet" >
</head>

<body>

  <div class="sidenav">
    <a href="<?= ROOT ?>dashboard/">داشبورد</a>

    <a class="dropdown-btn">مدرسان
      <div class="dropdown-container">
        <a href="<?= ROOT ?>dashboard/teachers">لیست مدرسین</a>
        <a href="<?= ROOT ?>dashboard/teachers/create.php">افزودن مدرس</a>
      </div>
    </a>

    <a class="dropdown-btn">مدیریت کاربران
      <div class="dropdown-container">
        <a href="<?= ROOT ?>dashboard/users">لیست کاربران</a>
      </div>
    </a>
    <a class="dropdown-btn">دوره های آموزشی
      <div class="dropdown-container">
        <a href="<?= ROOT ?>dashboard/courses">لیست دوره ها</a>
        <a href="<?= ROOT ?>dashboard/courses/create.php">افزودن دوره</a>
      </div>
    </a>
    <a class="dropdown-btn">اخبار
      <div class="dropdown-container">
        <a href="<?= ROOT ?>dashboard/news">لیست اخبار</a>
        <a href="<?= ROOT ?>dashboard/news/create.php">افزودن اخبار</a>
      </div>
    </a>

    <a href="#contact">پرداختی</a>
    <div class="mt_exit_panel my-4">
      <a class="btn btn-block btn-danger" href="<?=ROOT?>dashboard/logout.php">خروج از پنل</a>
    </div>
  </div>

  <div class="main">
    <div class="container-fluid">
      <div class="col-12 mt-3">
        <?= flash()->each() ?>
      </div>
        <?= $content ?>
    </div>
  </div>

  <script src="<?= ROOT_PATH  ?>js/jquery.min.js"></script>
  <script src="<?= ROOT_PATH  ?>js/bootstrap.bundle.min.js"></script>
  <script src="<?= ROOT_PATH  ?>js/panel.js"></script>
</body>

</html>

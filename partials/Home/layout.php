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
<nav class="navbar navbar-expand-lg navbar-dark navbar-light bg-dark p-4">
  <a class="navbar-brand" href="<?= ROOT?>">وب سایت آموزشی</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav px-2">
      <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT?>">صفحه اصلی <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">دوره ها </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">اخبار</a>
      </li>
    </ul>
  </div>
      <?php if(!auth()->check()): ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ورود | ثبت نام
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ورود | ثبت نام</h5>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">ورود</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">ثبت نام</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="p-3">
                    <form action="<?= ROOT?>login.php" method="post">
                        <div class="form-group">
                            <label for="">نام کاربری</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">رمز عبور</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">ورود</button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                  <div class="p-3">
                    <form action="<?= ROOT?>register.php" method="post">
                      <div class="form-group">
                          <label for="">نام و نام خانوادگی</label>
                          <input type="text" name="full_name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">شماره تماس</label>
                          <input type="phone_number" name="phone_number" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">نام کاربری</label>
                          <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">رمز عبور</label>
                          <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-block btn-primary">ثبت نام</button>
                      </div>
                  </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <?php else: ?>
        <ul class="navbar-nav px-2">
          <li class="nav-item active">
            <a class="nav-link" href="#">صفحه کاربری (<?= (auth()->info())->full_name ?>)</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?=ROOT?>logout.php">خروج</a>
          </li>
        </ul>
      <?php endif; ?>
</nav>

<div class="mt_main">
  <div class="container mt-3">
    <?= flash()->each() ?>
  </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="/image/avt.jpg" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('dishes.index')); ?>">Trang chủ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('dishes.create')); ?>">Thêm món ăn</a>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="row">
        <div class="col-7">
            <img src="/image/<?php echo e($dish ->image); ?>" class="img-thumbnail" alt="">
        </div>
        <div class="col-5">
            <br>
            <ul>
                <p><b>Món ăn: </b><?php echo e($dish -> name); ?></p>
                <p><b>Mô tả: </b><?php echo e($dish -> des); ?></p>
                <p><b>Giá: </b><?php echo e($dish-> price); ?></p>
                <p><b>Loại món ăn: </b><?php echo e($dish->kind->kind); ?></p>
                <p><b>Thành phần món ăn: </b><?php echo e($dish->ingredients); ?></p>
            </ul>
        </div>
    </div>    
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\midlaravelreact\midtermreact\resources\views/dish-detail.blade.php ENDPATH**/ ?>
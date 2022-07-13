
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
    <h2>Thêm món ăn</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('dishes.store')); ?>" class="was-validated" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
        <label for="model">Tên món ăn</label>
        <input type="text" class="form-control" id="" placeholder="Enter model" name="name" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <img src="" id="preview-img"alt="" style="height:300px">
        <input type="file" class="form-control" id="pwd" name="image" onchange="changeImage(event)" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback"></div>
        </div>
        <script>
            const changeImage = (e) => {
                const preImg = document.getElementById("preview-img")
                const file = e.target.files[0]
                preImg.src = URL.createObjectURL(file)
                preImg.onload = () => {
                    URL.revokeObjectURL(preImg.src)
                }
            }
        </script>
        <div class="form-group">
            <label for="description">Mô tả món ăn:</label>
            <input type="text" class="form-control" id="" placeholder="Nhập mô tả" name="des" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="description">Loại món ăn:</label>
            <select name="kind_id" id="">
                <?php $__currentLoopData = $kinds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ki->id); ?>"><?php echo e($ki->kind); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="Giá tiền">Giá tiền:</label>
            <input type="text" class="form-control" id="" placeholder="Nhập giá tiền" name="price" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="description">Thành phần:</label>
            <input type="text" class="form-control" id="" placeholder="Nhập mô tả" name="ingredients" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\midlaravelreact\midtermreact\resources\views/dish-create.blade.php ENDPATH**/ ?>
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

    <?php if(Session::has('success')): ?>
    <div class="alert alert-success">
      <?php echo e(Session::get('success')); ?>

    </div>
    <?php endif; ?>
    

    <div><h3 class="text-center">CÁC MÓN CƠM</h3></div>
    
    <div class='row'>
        <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dis->kind_id=="1"): ?>
        
        <div class="col-3">
            <a href="<?php echo e(route('dishes.show',$dis->id)); ?>" class="text-decoration:none">
            <img src="/image/<?php echo e($dis ->image); ?>" class="img-thumbnail" alt=""></div>
            <div class="col-9 ">
                <br>
                <div class="row">
                <div class="col-8 text-dark"><h5><?php echo e($dis->name); ?></h5></div>
                <div class="col-4 text-dark  text-right"><?php echo e($dis->price); ?> .vnđ</div>
                </div>
                <p class='text-dark'><?php echo e($dis->des); ?></p>
            </a>
        </div>
        
            
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div><h3 class="text-center">CÁC MÓN BÁNH MÌ</h3></div>
    
    <div class='row'>
        
        <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dis->kind_id=="2"): ?>
        <div class="col-6">
        <a href="<?php echo e(route('dishes.show',$dis->id)); ?>" class="text-decoration:none">
            <div class="row">
            <div class="col-3"><img src="/image/<?php echo e($dis ->image); ?>" class="img-thumbnail" alt=""></div>
            <div class="col-9 text-dark">
                <br>
                <div class="row">
                    <div class="col-8"><h5><?php echo e($dis->name); ?></h5></div>
                    <div class="col-4  text-right"><?php echo e($dis->price); ?> .vnđ</div>
                </div>
                <p><?php echo e($dis->des); ?></p>
            </div>
            </div>
            </a>
        </div>
        
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
    </div>
    <div><h3 class="text-center">BÚN PHỞ</h3></div>
    
    <div class="row">
        
        <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dis->kind_id=="3"): ?>
        
        <div class="col-4">
        <a href="<?php echo e(route('dishes.show',$dis->id)); ?>" class="text-decoration:none">
            <div><img src="/image/<?php echo e($dis ->image); ?>" style="width:300px;height:250px" class="img-thumbnail" alt=""></div>
            <div class="text-dark">
                <br>
                <div class="row">
                    <div class="col-6"><h5><?php echo e($dis->name); ?></h5></div>
                    <div class="col-6  text-right"><?php echo e($dis->price); ?> .vnđ</div>
                </div>
                <p><?php echo e($dis->des); ?></p>
            </div>
        </a>
        </div>
        
        
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
    </div>
       
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\midlaravelreact\midtermreact\resources\views/index.blade.php ENDPATH**/ ?>
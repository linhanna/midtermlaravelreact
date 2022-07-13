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
      <a class="nav-link" href="{{route('dishes.index')}}">Trang chủ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dishes.create')}}">Thêm món ăn</a>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="row">
        <div class="col-7">
            <img src="/image/{{$dish ->image}}" class="img-thumbnail" alt="">
        </div>
        <div class="col-5">
            <br>
            <ul>
                <p><b>Món ăn: </b>{{$dish -> name}}</p>
                <p><b>Mô tả: </b>{{$dish -> des }}</p>
                <p><b>Giá: </b>{{$dish-> price }}</p>
                <p><b>Loại món ăn: </b>{{ $dish->kind->kind }}</p>
                <p><b>Thành phần món ăn: </b>{{ $dish->ingredients }}</p>
            </ul>
        </div>
    </div>    
</div>

</body>
</html>

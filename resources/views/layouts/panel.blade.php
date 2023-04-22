<!doctype html>
<html lang="fa" dir="rtl">
<head class="row">
    <title>{{$title ?? ''}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<!-- header -->
<header class="col-10 shadow " style="float: left">

    <div class="  " style="">
        <a href="{{route('logout')}}" style="color: #4a5568"><i class="bi bi-box-arrow-right float-start ms-5" style="font-size: 30px"></i></a>
    </div>


</header>
<!-- sidebar -->

<nav class="mb-5" style="z-index: 2;position: fixed">
    <div class="col-2 shadow-lg  " style="position: fixed; height: 100%">
        <div class="mb-2 ">
            <img src="{{auth()->user()->getavatar()}}" alt="Avatar Logo" style="width:200px;" class="rounded-pill me-2 mb-5">
            <p class="me-3">خوش اومدی {{auth()->user()->name}}</p>
            <p class="me-3 lead" style="font-size: 15px"> نقش کاربر:{{auth()->user()->getrolefarsi()}}</p>
        </div>

        <div class="list-group " style="">

            <a href="{{route('landing')}}" class="list-group-item  mt-3 ">بازگشت به صفحه اصلی</a>
            <a href="{{route('profile.edit')}}" class="list-group-item  mt-3 @if(request()->is('profile') ||request()->is('profile/*'))active @endif">پروفایل</a>
            @if(auth()->user()->role =='admin')
            <a href="{{route('users.index')}}" class="list-group-item   @if(request()->is('users') ||request()->is('users/*'))active @endif">مدیریت کاربران</a>
            @endif
            <a href="{{route('advertisings.index')}}" class="list-group-item  mt-3 @if(request()->is('advertisings') || request()->is('advertisings/*'))active @endif">مدیریت آگهی ها</a>
            @if(auth()->user()->role =='admin' || auth()->user()->role =='author')
            <a href="{{route('categories.index')}}" class="list-group-item  mt-3 @if(request()->is('categories') ||request()->is('categories/*'))active @endif">مدیریت دسته بندی ها</a>
            @endif
        </div>
    </div>
</nav>
{{$slot}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('status'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{session('status')}}',

        })
    </script>
@endif
</body>
</html>

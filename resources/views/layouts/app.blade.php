<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <title>{{$title ?? ''}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<!-- header -->
<header class="shadow">
    <div class="col-12 row ">
        <nav class="navbar navbar-expand-sm bg-white ">
            <div class="col-10">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('landing')}}">صفحه اصلی</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">دسته بندی ها</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>



                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>




                </ul>
            </div>
            <div class="btn-group col-1">
                @auth()
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                        <li class=""><a class="dropdown-item text-center" href="{{route('dashboard')}}">پروفایل</a></li>

                        <li><hr class="dropdown-divider"></li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                        <li><button class="dropdown-item text-center">خروج </button></li>
                        </form>
                    </ul>
                @endauth
                @guest()
                    <button type="button" class="btn btn-outline-secondary" > <a href="{{route('register')}}" style="text-decoration: none;color: black">ورود/ثبتنام</a></button>
                @endguest
            </div>
            <!-- avatar -->
            <div class="col-1">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('/images/avatar.png')}}" alt="Avatar Logo" style="width:80px;" class="rounded-pill me-2">
                </a>
            </div>

        </nav>

    </div>
</header>

{{$slot}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

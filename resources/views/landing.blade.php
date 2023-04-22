<x-app-layout>
    <x-slot name="title">صفحه اصلی</x-slot>
    <main>
        @guest()
            <div class="col-12 align-content-center">
                <img src="{{asset('/images/banner.png')}}" class="img-fluid rounded mx-auto d-block" alt="..." style="width: 500px">
                <button type="button" class="btn btn-outline-success rounded mx-auto d-block">برای ثبت اگهی وارد شوید!</button>
            </div>
        @endguest
        <div class="col-12 mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="btn"> <a class="nav-link" >تمام آگهی ها</a></button>
                </li>
                <form action="{{route('landing.search')}}" method="get">
                    <li class="nav-item" style="display: inline-block">
                       <button class="btn" type="submit" name="new" value="1"> <a class="nav-link" >جدیدترین</a></button>
                    </li>
                    <li class="nav-item" style="display: inline-block">
                        <button class="btn" type="submit" name="old" value="1"> <a class="nav-link" >قدیمی ترین</a></button>
                    </li>
                    <li class="nav-item dropdown" style="display: inline-block">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-expanded="false">دسته بندی ها</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                @foreach($category->children as $child)
                                    <button class="btn" type="submit" name="category" value="{{$child->id}}"> <li><a class="dropdown-item" >{{$child->name}}</a></li></button>
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                </form>
            </ul>
        </div>
        <div class="col-12">
            @foreach($advertisings as $advertising)
            <div class="card col-3 mt-3 me-2" style="width: 18rem;display: inline-block">
                <img src="{{$advertising->getbanner()}}" class="card-img-top" alt="..." style="height: 150px">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">تاریخ انتشار:{{$advertising->jalali()}}</small></p>
                    <h5 class="card-title">{{$advertising->title}}</h5>
                    <p class="card-text">{{\Illuminate\Support\Str::limit($advertising->content ,100)}}</p>
                    <p class="text-muted">{{$advertising->category->name}}</p>
                    <form action="{{route('advertising',$advertising->id)}}" method="get">
                    <button type="submit" class="btn btn-outline-dark me-5" style="height: 40px;position: relative;right: 130px">مشاهده</button>
                    </form>
                </div>
            </div>
            @endforeach
                {{$advertisings->links()}}
        </div>
    </main>
</x-app-layout>

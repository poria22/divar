<x-panel-layout>
    <div class="col-10" style="float: left">
        <a href="{{route('advertisings.create')}}" ><button  type="button" class="btn btn-warning " style="float: left;margin-left: 50px;height: 100px">ثبت آگهی جدید</button></a>
    </div>
    <div class="col-10" style="float: left">
        @foreach($advertisings as $advertising)
        <div class="card col-3 me-2 " style="width: 250px;display: inline-block">
            <img src="{{$advertising->getbanner()}}" class="card-img-top" alt="..." style="height: 150px">
            <div class="card-body">


                <h5 class="card-title">{{$advertising->title}}</h5>
                <p class="card-text">{{\Illuminate\Support\Str::limit($advertising->content , 100)}}</p>
                <p class="card-text"><small class="text-muted">تاریخ انتشار:{{$advertising->jalali()}}</small></p>
                @if(auth()->user()->role =='admin' || auth()->user()->role =='author')
                <p class="card-text"><small class="text-muted">منتشرکننده:{{$advertising->user->name}}</small></p>
                @endif
                <p class="text-muted" style="display: inline-block">
                    وضعیت آگهی:<p class="@if($advertising->Condition == '0') text-danger @elseif($advertising->Condition == '1') text-success @endif"style="display: inline-block">{{$advertising->Condition()}}</p></p>
                <form action="{{route('advertisings.destroy',$advertising->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger me-5" style="height: 40px;position: absolute">حذف</button>
                </form>

                <form action="{{route('advertisings.show',$advertising->id)}}" method="get">
                    <button type="submit" class="btn btn-outline-dark me-5" style="height: 40px;position: relative;right: 90px">مشاهده</button>
                </form>
            </div>
        </div>
        @endforeach
            {{$advertisings->links()}}
    </div>

</x-panel-layout>

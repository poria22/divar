<x-panel-layout>
    <div class="col-10" style="float: left">
        <div style="display: inline-block;margin-right:20px">
        <img src="{{$advertising->getbanner()}}" class="img-fluid"  alt="تصویر آگهی" style="height: 300px">
        </div>
        <div style="display: inline-block;position: relative;top: 50px">
            <div style="">
            <h3>عنوان:{{$advertising->title}}</h3>
            </div>
            <div style="margin: 15px 20px">
                <p>متن آگهی:{{$advertising->content}}</p>
            </div>
            <div style="margin: 20px 20px">
                <p>قیمت آگهی:{{$advertising->price}}</p>
            </div>
            <div style="margin: 20px 20px">
                <p class="lead">نویسنده آگهی:{{$advertising->user->name}}</p>
            </div>
            <div style="margin: 20px 20px">
                <p class="lead">دسته بندی آگهی:{{$advertising->category->name}}</p>
            </div>

        </div>
        <div style="margin: 40px 20px">
            <form action="{{route('advertisings.update',$advertising->id)}}" method="POST" >
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" name="Condition" value="1">پذیرش آگهی</button>
                <button type="submit" class="btn btn-danger" name="Condition" value="0">رد آگهی</button>
            </form>
        </div>
    </div>
</x-panel-layout>

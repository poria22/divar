<x-panel-layout>
    <div class="col-6 " style="float: right;position: relative;top: 150px ;right: 270px">
    <table class="table" ">
        <thead class="table-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">نام دسته بندی</th>
            <th scope="col">نام انگلیسی</th>
            <th scope="col">دسته پدر</th>
            <th scope="col">نام ایجاد کننده</th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)

            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->link}}</td>
                <td>{{$category->parentname()}}</td>
                <td>{{$category->user_id}}</td>
                <td>

                        <form action="" method="post" style="display: inline">
                            @csrf

                            <button style="background-color: white ;display: inline-block;border: none" title="حذف"> <i class="bi bi-person-x-fill " style="color: red"></i></button>
                        </form>

                    <form style="display: inline" action="" method="get">


                        <button style="background-color: white ;border: none" title="ویرایش">  <i class="bi bi-pencil" style="color: forestgreen"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
        {{$categories->links()}}
    </div>
    <div class="col-3  ms-2" style="float: left;margin-top: 100px">
        <form style="width: 300px" action="{{route('categories.store')}}" method="POST">
            @csrf
            <input name="name" placeholder="نام دسته بندی" class="form-control">
            <input name="link" placeholder="نام انگلیسی دسته" class="form-control mt-2">
            <select class="form-select-sm mt-2"  aria-label="Default select example" name="category_id">
                <option value="" selected>ندارد</option>
               @foreach($parents as $parent)

                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
            @error('category')
            {{$message}}
            @enderror
            <button type="submit" class="btn btn-success mt-5" style="float: left" >ساخت دسته بندی</button>
        </form>

    </div>
</x-panel-layout>

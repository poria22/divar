<x-panel-layout>
    <div class="col-10">
        <form class="col-3 " style="float: left;position: relative;top: 200px ;left: 500px" action="{{route('advertisings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="banner" class="form-label">تصویر آگهی</label>
            <input type="file" name="banner" placeholder="تصویر آگهی" class="form-control" accept="image/*">
            @error('banner')
            {{$message}}
            @enderror
            <input name="title" class="form-control mt-2" placeholder="عنوان آگهی">
            @error('title')
            {{$message}}
            @enderror
            <textarea name="content" class="form-control mt-2" placeholder="متن آگهی"></textarea>
            @error('textarea')
            {{$message}}
            @enderror
            <label for="price" class="form-label mt-3">قیمت </label>
            <input type="number" class="form-control" name="price">
            @error('price')
            {{$message}}
            @enderror
            <label for="" class="form-label">دسته بندی آگهی</label>
            <select class="form-select-sm mt-2"  aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            {{$message}}
            @enderror

            <button type="submit" class="btn btn-success mt-5" style="float: left" >انتشار آگهی</button>

        </form>
    </div>

</x-panel-layout>

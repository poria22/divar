<x-panel-layout>
    <form class="col-3 " style="float: left;position: relative;top: 200px ;left: 500px" action="{{route('users.store')}}" method="POST">
        @csrf
         <input name="name" class="form-control" placeholder="نام کاربر">
        @error('name')
        {{$message}}
        @enderror
         <input name="email" class="form-control mt-2" placeholder="ایمیل">
        @error('email')
        {{$message}}
        @enderror
        <select class="form-select-sm mt-2"  aria-label="Default select example" name="role">
            <option selected>نقش کاربر</option>
            <option value="admin">مدیر</option>
            <option value="author">نویسنده</option>
            <option value="user">عادی</option>
        </select>
        <button type="submit" class="btn btn-success mt-5" style="float: left" >ساخت کاربر</button>

    </form>
</x-panel-layout>

<x-panel-layout>
    <form method="POST" action="{{ route('profile.update'),$user->id }}" class="col-10  " style="float: right;position: relative;left: 100px;top: 50px"  enctype="multipart/form-data">
        @csrf
@method('PATCH')
        <!-- Name -->
        <div class="col-3 mx-auto mt-2">
            <label for="name" class="form-label">آواتار</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="avatar" accept="image/*">
            @error('name')
            {{$message}}
            @enderror

        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="name" class="form-label">نام کاربری</label>
            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
            @error('name')
            {{$message}}
            @enderror

        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="exampleInputEmail1" class="form-label">آدرس ایمیل</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
            @error('email')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="exampleInputPassword1" class="form-label">  رمز عبور فعلی</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="old_password">
            @error('old_password')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="exampleInputPassword1" class="form-label">رمز عبور جدید</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            @error('password')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="password_confirmation" class="form-label">تکرار رمز عبور جدید</label>
            <input type="password" class="form-control" id="" name="password_confirmation">
            @error('confirm_password')
            {{$message}}
            @enderror
        </div>

        <div class="col-3 mx-auto mt-4 ">


            <button type="submit" class="btn btn-success float-start">ویرایش</button>
        </div>
    </form>
</x-panel-layout>

<x-app-layout>

    <form method="POST" action="{{ route('register') }}" class="col-12 mt-5 ">
        @csrf

        <!-- Name -->
        <div class="col-3 mx-auto mt-2">
            <label for="name" class="form-label">نام کاربری</label>
            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
            @error('name')
            {{$message}}
            @enderror

        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="exampleInputEmail1" class="form-label">آدرس ایمیل</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            @error('email')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="exampleInputPassword1" class="form-label">رمز عبور</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            @error('password')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
            <label for="password_confirmation" class="form-label">تکرار رمز عبور</label>
            <input type="password" class="form-control" id="" name="password_confirmation">
            @error('confirm_password')
            {{$message}}
            @enderror
        </div>
        <div class="col-3 mx-auto mt-2">
        <label for="role" class="form-label">نقش کاربر</label>
        <select class="form-select-sm mt-2"  aria-label="Default select example" name="role">
            <option value="" selected>ندارد</option>


                <option value="admin">مدیر</option>
                <option value="author">نویسنده</option>
                <option value="user">کاربرعادی</option>

        </select>
        </div>
        <div class="col-3 form-check mx-auto mt-2">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار!</label>
        </div>
        <div class="col-3 mx-auto mt-4 ">
        <span><a href="{{route('login')}}" style="text-decoration: none">آیا قبلاثبتنام کردید؟</a></span>

        <button type="submit" class="btn btn-success float-start">ثبتنام</button>
        </div>
    </form>

</x-app-layout>

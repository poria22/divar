<x-app-layout>

    <form method="POST" action="{{ route('login') }}" class="col-12 mt-5 ">
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

        <div class="col-3 form-check mx-auto mt-2">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار!</label>
        </div>
        <div class="col-3 mx-auto mt-4 ">


            <button type="submit" class="btn btn-success float-start">ورود</button>
        </div>
    </form>

</x-app-layout>

<x-panel-layout>
    <form class="col-3 " style="float: left;position: relative;top: 200px ;left: 500px" action="{{route('users.update' ,$user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input name="name" class="form-control" placeholder="نام کاربر" value="{{$user->name}}">
        <input name="email" class="form-control mt-2" placeholder="ایمیل" value="{{$user->email}}">
        <select class="form-select-sm mt-2"  aria-label="Default select example" name="role">

            <option value="admin" @if($user->role === 'admin')selected @endif>مدیر</option>
            <option value="author" @if($user->role === 'author')selected @endif>نویسنده</option>
            <option value="user" @if($user->role === 'user')selected @endif>عادی</option>
        </select>
        <button type="submit" class="btn btn-success mt-5" style="float: left" >ویرایش کاربر</button>
    </form>
</x-panel-layout>

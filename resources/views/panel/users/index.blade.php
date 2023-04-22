<x-panel-layout>


    <div class="col-6 " style="float: left;position: relative;top: 200px ;left: 200px">
        <table class="table">
            <thead class="table-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">نام</th>
                <th scope="col">ایمیل</th>
                <th scope="col">نقش کاربر</th>
                <th scope="col">تاریخ ثبتنام</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->getrolefarsi()}}</td>
                <td>{{$user->jalali()}}</td>
                <td>
                    @if(auth()->user()->id !== $user->id)
                    <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                   <button style="background-color: white ;display: inline-block;border: none" title="حذف"> <i class="bi bi-person-x-fill " style="color: red"></i></button>
                    </form>
                    @endif
                    <form style="display: inline" action="{{route('users.edit' ,$user->id)}}" method="get">


                    <button style="background-color: white ;border: none" title="ویرایش">  <i class="bi bi-pencil" style="color: forestgreen"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('users.create')}}"> <button type="button" class="btn btn-success " style="float: left" >ساخت کاربر</button></a>
        {{$users->links()}}


    </div>
</x-panel-layout>

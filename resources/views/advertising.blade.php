<x-app-layout>
    <div class="col-12">
        <img class="shadow" src="{{$advertising->getbanner()}}" style="margin-top: 100px;width:400px ;height: 400px">
        <div class="" style="display: inline-block;position: relative;top:100px;right: 30px;width: 600px">
            <h4 class="">{{$advertising->title}}</h4>
            <small class="text-muted ms-5">منتشرکننده:{{$advertising->user->name}}</small>
            <small class="text-muted ms-5" >تاریخ انتشار:{{$advertising->jalali()}}</small>
            <small class="text-muted ms-5" >دسته بندی:{{$advertising->category->name}}</small>
            <hr>
            <p class="lead">متن آگهی:</p>
            <p>{{$advertising->content}}</p>

        </div>
        <div class="" style="display: inline-block;position: relative;right: 200px">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            تماس با منتشر کننده
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <strong>{{$advertising->user->name}}</strong>
                            <hr>
                            <small class="lead">ایمیل:{{$advertising->user->email}}</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>

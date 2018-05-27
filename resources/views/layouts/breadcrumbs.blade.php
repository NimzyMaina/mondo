<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">{{$title}}</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            @if(seg(1))
                <li class="breadcrumb-item active">{{ucfirst(seg(1))}}</li>
            @endif
            @if(seg(2))
                <li class="breadcrumb-item active">{{ucfirst(seg(2))}}</li>
            @endif

        </ol>
    </div>
</div>
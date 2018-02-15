<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{ $pagetitle }}</h2>
        <ol class="breadcrumb">
            @foreach($breadcrumb as $key => $value)
            <li>
                <a href="{{ $key }}">{{ $value }} </a>
            </li>
            @endforeach
            
        </ol>
    </div>
<!--    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>-->
</div>
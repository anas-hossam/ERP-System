@if($errors->any())

    <div class="error-detect">
        {{--<div class="container">--}}
        <div class="error text-center">
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </div>
        <!-- /.error-danger -->
        {{--</div>--}}
        <!-- /.container -->
    </div>
@endif
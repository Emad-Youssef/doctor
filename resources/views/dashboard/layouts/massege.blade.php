@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('notVaild'))
    <div class="alert alert-warning">
     @lang('site.'.session('notVaild'))
    </div>
@endif

@if (session('sendMail'))
    <div class="alert alert-success">
     @lang('site.'.session('sendMail'))
    </div>
@endif


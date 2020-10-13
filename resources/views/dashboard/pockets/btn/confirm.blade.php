
@if($confirm == 'no')

<a class="btn btn-warning btn-sm " id="update-ajax" data-id="{{$id}}" data-route="{{ route('dashboard.updateConfirm') }}" data-token="{{ csrf_token() }}">{{ trans('site.waiting') }}</a>

@else
<a class="btn btn-success btn-sm "  >{{ trans('site.done') }}</a>
@endif


@if($status == 0)
<button class="btn btn-info btn-sm">{{ trans('site.work') }}</button>
@else
<button class="btn btn-success btn-sm">{{ trans('site.break') }}</button>
@endif

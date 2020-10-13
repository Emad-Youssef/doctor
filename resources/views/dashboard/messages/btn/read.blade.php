@if($readable == 0)
<a href="{{ route('dashboard.contact.show',$id)}}" class="btn btn-warning btn-sm">@lang('site.read')</a>
@else
<a class="btn btn-info btn-sm">@lang('site.done')</a>
@endif

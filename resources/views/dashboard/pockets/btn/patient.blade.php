
@if($patient == 'no')

<a class="btn btn-warning btn-sm patient" id="patient-ajax" data-id="{{$id}}" data-name="{{$f_name}} {{$l_name}}" data-address="{{$country .' - '. $city }}" data-age="{{$age}}" data-route="{{ route('dashboard.patient.store') }}" data-token="{{ csrf_token() }}">{{ trans('site.waiting') }}</a>

@else
<a class="btn btn-success btn-sm patient"  >{{ trans('site.done') }}</a>
@endif

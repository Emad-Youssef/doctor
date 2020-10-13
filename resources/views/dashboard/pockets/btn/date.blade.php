@if($confirm == 'no')
<button class="btn btn-warning btn-sm">{{$y.'/'.$m.'/'.$d}}</button>
@else
<button class="btn btn-success btn-sm">{{$y.'/'.$m.'/'.$d}}</button>
@endif

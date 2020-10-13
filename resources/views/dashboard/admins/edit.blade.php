@extends('dashboard.index')
@push('head')

@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.'.$title)</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('site.home')</a></li>
        <li class="#"><a href="{{ route('dashboard.admins.index') }}">@lang('site.admins')</a></li>
        <li class="active">@lang('site.'.$title)</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
                <div class="box-header">
                <h3 class="box-title">@lang('site.'.$title)</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="alert alert-danger hasError hidden">

                </div>
                <form class="form-ajax" data-route="{{ route('dashboard.admins.update',$admin->id ) }}" method="post"">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label for="exampleInputName">@lang('site.name')</label>
                            <span id="name_div_inside" class="inside-empty"></span>
                            <input id="name_input_inside" type="text" name="name" class="form-control" id="exampleInputName" placeholder="@lang('site.name')" value="{{ $admin->name }}">

                        </div>

                    </div>

                    <div class="form-group">
                            <label>@lang('site.permissions')</label>
                            <span id="permissions_div_inside" class="inside-empty"></span>
                            <div class="nav-tabs-custom">
                                @php
                                    $models = ['admins','settings','employees','works', 'doctors', 'salarys', 'pockets', 'patients','roshetas', 'drugs', 'news', 'services', 'facts', 'media'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                    
                                        <li class="{{ $index == 0 ? 'active' : '' }}" ><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>

                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label id="{{ $map . '_' . $model }}">
                                                <input type="checkbox" {{$admin->hasPermission($map . '_' . $model) ? 'checked' : '' }} name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->
                            
                    </div>
                
                    <div class="form-group">
                        <input type="hidden" name="_method" value="put">
                        <button class="btn btn-primary submit-ajax"><i class="fa fa-edit"></i> <span>@lang('site.edit')</span></button>
                    </div>

                </form>

              </div>
              <!-- /.box-body -->
                <!-- /.box-body -->
        </div>

    </section>


@endsection
@push('scripts')
<script>
      $(function () {
        //Initialize Select2 Elements
        $('#create_settings, #delete_settings,#create_salarys, #delete_salarys,#create_patients, #update_patients').hide();
        
        })



</script>
@endpush

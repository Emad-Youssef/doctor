@extends('dashboard.index')
@push('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/bower_components/select2/dist/css/select2.min.css">
<!-- Summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote.css') }}">
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
        <li class="#"><a href="{{ route('dashboard.rosheta.index') }}">@lang('site.rosheta')</a></li>
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
                <form class="form-ajax" data-route="{{ route('dashboard.rosheta.store') }}" method="post" data-token="{{ csrf_token() }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col col-md-6">
                            <label>@lang('site.patient')</label>
                            <span id="patient_id_div_inside" class="inside-empty"></span>
                            <select class="form-control select2" name="patient_id">
                                <option value="">@lang('site.choose')</option>
                                @foreach($patients as $patient)
                                    <option value="{{$patient->id}}">{{ $patient->pocket->f_name }} {{ $patient->pocket->l_name }}--> {{ $patient->pocket->y }} / {{ $patient->pocket->m }} / {{ $patient->pocket->d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col col-md-6">
                            <label>@lang('site.diagnosis')</label>
                            <span id="diagnosis_div_inside" class="inside-empty"></span>
                            <textarea name="diagnosis"  class="form-control summernote"></textarea>
                        </div>

                        <div class="form-group col col-md-12">
                            <label>@lang('site.medication')</label>
                            <span id="drug_id_div_inside" class="inside-empty"></span>

                            <!-- <textarea name="medication"  class="form-control summernote"></textarea> -->
                            <div class="row">
                                <div class="col-md-5 form-group form-material" data-plugin="formMaterial">
                                {!! $dataTable->table([
                                'class' => 'table table-bordered table-hover',
                            ], true) !!}
                                </div>
                                <div class="col-md-7 form-group form-material" data-plugin="formMaterial">
                                    <br><br><br><br>
                                    <div class="drug_id_div">
                                        <label for="form-control-label"> @lang('site.drug_link')</label>
                                        <div class="row" id="drug_id_div_inside">
                                            <div class="col-md-6">
                                                 @lang('site.drug_name')
                                            </div>
                                            <div class="col-md-2">
                                                 @lang('site.drug_use')
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-bottom: 1px dashed #000">
                                    <div id="dataHere">
                                        {{-- Data Will put here  --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group col col-md-6">
                            <label >@lang('site.doctor')</label>
                            <span id="doctor_name_div_inside" class="inside-empty"></span>
                            <input id="doctor_name_input_inside" type="text" name="doctor_name" class="form-control" placeholder="@lang('site.doctor')">
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary submit-ajax"><i class="fa fa-plus"></i> <span>@lang('site.add')</span></button>
                    </div>

                </form>

              </div>
              <!-- /.box-body -->
                <!-- /.box-body -->
        </div>

    </section>


@endsection

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('dashboard') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
 <!-- Summernote -->
 <script src="{{ asset('dashboard/plugins/summernote/summernote.js') }}"></script>

<script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
         //Date picker
      
         //Summernote
         $('.summernote').summernote({
                height: 200
            });

             // if he click in en row of drug table take it value and make it an input
        $('#showdrugdatatables-table tbody').on( 'click', 'tr', function () {
            // console.log('goo')
            var parent = $(this);
            var name = parent.find('.hidden .drugname').data('drugname');
            var use =  parent.find('.hidden .druguse').data('druguse');
            var id =  parent.find('.hidden .id').data('drugid');

            var tmp = '<div class="row drugsInfo">\n' +
                '            <div class="col-md-6 dug_name">\n' +
                '                <input type="text" value=\''+name+'\' name="drug_name[]" disabled="" class="form-control text-right this_drug_name">\n' +
                '                <input type="text" value="'+id+'" name="drug_id[]" hidden="">\n' +
                '            </div>\n' +
                '            <div class="col-md-4">\n' +
                '                <input type="text" value=\''+use+'\' name="drug_use[]" disabled="" class="form-control text-center">\n' +
                '            </div>\n' +
                '            <div class="col-md-2">\n' +
                '                <a class="btn btn-block btn-danger removeDrug"><i class="fa fa-fw fa-remove"></i></a>\n' +
                '            </div>\n' +
                '        </div>';

            $('#dataHere').append(tmp);

        });
        //removeDrug
        $(document).on('click' , '.removeDrug',function() {
            let parent  = $(this).closest('.drugsInfo');
            parent.remove();
        });
        // Append Data on the input name
        $('.foarm-ajax').on('submit')
      });


</script>
{!! $dataTable->scripts() !!}
@endpush


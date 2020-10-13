<a href="{{ route('dashboard.employee.edit',$id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
<a data-route="{{ route('dashboard.employee.destroy',$id) }}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</a>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content alert alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">@lang('site.deleteALL')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        @lang('site.delete_all')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
        <button type="button" class="btn btn-primary">@lang('site.deleteALL')</button>
      </div>
    </div>
  </div>
</div>

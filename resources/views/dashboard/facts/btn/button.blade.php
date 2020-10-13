<a href="{{ route('dashboard.numberFact.edit',$id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
<a data-route="{{ route('dashboard.numberFact.destroy',$id) }}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</a>

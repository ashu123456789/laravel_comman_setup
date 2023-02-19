@extends('../admin/layout.sidemenu')


@section('subcontent')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('messages.list', ['name' => 'Role'])}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{__('content.back_title')}}</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans_choice('content.name_title', 1)}}:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans_choice('content.permission_title', 1)}}:</strong>
            @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
            <label class="label label-success">{{ $v->name }}</label>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
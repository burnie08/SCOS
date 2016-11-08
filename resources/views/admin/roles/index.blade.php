@extends('layouts.matrix')
@section('dashboard') @include('admin.admin-dashboard') @endsection
@section('content')
    <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Roles</h5>
    </div>
    <div class="panel-body">
        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary pull-right btn-sm">Add New Role</a>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Label</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ url('/admin/roles', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                        <td>
                            <a href="{{ url('/admin/roles/' . $item->id . '/edit') }}">
                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                            </a> /
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['admin/roles', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $roles->render() !!} </div>
        </div>

    </div>
</div>
           
@endsection

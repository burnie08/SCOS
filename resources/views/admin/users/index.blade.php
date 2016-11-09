@extends('layouts.matrix') @section('dashboard') @include('admin.admin-dashboard') @endsection @section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Users</h5>
    </div>

    <div class="panel-body">

        <a href="{{ url('/admin/users/create') }}" class="btn btn-primary  btn-sm">Add New User</a>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table table-borderless data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr class="gradeX">
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}">
                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                            </a> / {!! Form::open([ 'method'=>'DELETE', 'url' => ['/admin/users', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!} {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $users->render() !!} </div>
        </div>

    </div>
</div>

<script src="/js/jquery.uniform.js"></script>
<script src="/js/matrix.popover.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>
@endsection

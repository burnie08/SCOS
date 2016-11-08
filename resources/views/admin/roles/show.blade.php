@extends('layouts.matrix')
@section('dashboard') @include('admin.admin-dashboard') @endsection
@section('content')
    <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Role</h5>
</div>
<div class="panel-body">

    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Label</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->label }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
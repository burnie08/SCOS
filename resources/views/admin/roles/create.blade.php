@extends('layouts.matrix')
@section('dashboard') @include('admin.admin-dashboard') @endsection
@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Create New Role</h5>
    </div>
    <div class="panel-body">

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal']) !!}

        @include ('admin.roles.form')

        {!! Form::close() !!}

    </div>
</div>         
@endsection
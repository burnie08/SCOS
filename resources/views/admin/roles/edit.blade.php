@extends('layouts.matrix')

@section('content')
@section('dashboard') @include('admin.admin-dashboard') @endsection
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Edit Role</h5>
    </div>
    <div class="panel-body">

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($role, [
            'method' => 'PATCH',
            'url' => ['/admin/roles', $role->id],
            'class' => 'form-horizontal'
        ]) !!}

        @include ('admin.roles.form', ['submitButtonText' => 'Update'])

        {!! Form::close() !!}

    </div>
</div>
           
@endsection
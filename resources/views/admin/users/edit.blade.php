@extends('layouts.matrix')
@section('dashboard') @include('admin.admin-dashboard') @endsection
@section('content')
    <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Edit User</h5>
    </div>
    <div class="panel-body">

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($user, [
            'method' => 'PATCH',
            'url' => ['/admin/users', $user->id],
            'class' => 'form-horizontal'
        ]) !!}

        @include ('admin.users.form', ['submitButtonText' => 'Update'])

        {!! Form::close() !!}

    </div>
</div>
            
@endsection
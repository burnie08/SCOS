@extends('layouts.matrix') @section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Edit Swimmer {{ $swimmer->id }}</h5>
    </div>
    <div class="widget-content ">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif {!! Form::model($swimmer, [ 'method' => 'PATCH', 'url' => ['/Instructors/swimmers', $swimmer->id], 'class' => 'form-horizontal', 'files' => true ]) !!}

        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            {!! Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('first_name', '
                <p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
            {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('last_name', '
                <p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>

@endsection

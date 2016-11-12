@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit eval {{ $eval->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($eval, [
                            'method' => 'PATCH',
                            'url' => ['/Instructors/evals', $eval->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                                    <div class="form-group {{ $errors->has('lesson_id') ? 'has-error' : ''}}">
                {!! Form::label('lesson_id', 'Lesson Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('lesson_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('lesson_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('skill_id') ? 'has-error' : ''}}">
                {!! Form::label('skill_id', 'Skill Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('skill_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('skill_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('skill_level_id') ? 'has-error' : ''}}">
                {!! Form::label('skill_level_id', 'Skill Level Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('skill_level_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('skill_level_id', '<p class="help-block">:message</p>') !!}
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
            </div>
        </div>
    </div>
@endsection
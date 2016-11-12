@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New lesson</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/Instructors/lessons', 'class' => 'form-horizontal', 'files' => true]) !!}

                                    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('user_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('swimmer_id') ? 'has-error' : ''}}">
                {!! Form::label('swimmer_id', 'Swimmer Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('swimmer_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('swimmer_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('skill_card_id') ? 'has-error' : ''}}">
                {!! Form::label('skill_card_id', 'Skill Card Id', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::number('skill_card_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('skill_card_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('comments') ? 'has-error' : ''}}">
                {!! Form::label('comments', 'Comments', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('comments', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('isComplete') ? 'has-error' : ''}}">
                {!! Form::label('isComplete', 'Iscomplete', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                                <div class="checkbox">
                <label>{!! Form::radio('isComplete', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('isComplete', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('isComplete', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
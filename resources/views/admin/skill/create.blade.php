@extends('layouts.matrix') @section('content')


<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5><a style='text-decoration: underline;' href="{{ url('admin/skill/' . $skill_card_id . '/showAll') }}">Skills</a> &gt; Create Skills </h5>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-8 col-md-offset-2">
                        
                        
                        
                        
                        
                        
                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif {!! Form::open(['url' => '/admin/skill/store', 'class' => 'form-horizontal', 'files' => true]) !!} {{ Form::hidden('skill_card_id', $skill_card_id, ['class' => 'form-control']) }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('name', '
                                <p class="help-block">:message</p>') !!}
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
</div>
@endsection

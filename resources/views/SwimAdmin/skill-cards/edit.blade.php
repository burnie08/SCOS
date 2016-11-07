@extends('layouts.matrix') @section('dashboard') @include('SwimAdmin.skill-cards.skill-dashboard') @endsection @section('content')



<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5><a  href="{{ url('SwimAdmin/skill-cards/') }}">Cards</a> &gt;Edit Skill Card </h5>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif {!! Form::model($skillcard, [ 'method' => 'PATCH', 'url' => ['/SwimAdmin/skill-cards', $skillcard->id], 'class' => 'form-horizontal', 'files' => true ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('name', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('short_name') ? 'has-error' : ''}}">
                {!! Form::label('short_name', 'Short Name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('short_name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('short_name', '
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
</div>

@endsection

@extends('layouts.matrix') 

@section('dashboard')
    @include('SwimAdmin.skill-cards.skill-dashboard') 
@endsection

@section('content')



        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5><a href="http://localhost:8000/SwimAdmin/skill/{{$skill->skill_card_id}}/showAll">Skills</a>&nbsp;&gt;&nbsp;Edit Skill </h5>
            </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($skill, [
                            
                            'url' => ['/SwimAdmin/skill', $skill->id, 'update'],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                                   
                
            {{ Form::hidden('skill_card_id', null, ['class' => 'form-control']) }}
                
           
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Skill', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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
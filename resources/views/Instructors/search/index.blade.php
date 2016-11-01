@extends('layouts.matrix') @section('dashboard') @include('admin.skill-cards.skill-dashboard') @endsection @section('content')


<style>
    .form-control.search
    {
        padding-right:1px;
    }
    @media(min-width:468px)
    {
        .search-text
        {
            width:50%;
            display: inline;

        }
        
    }

</style>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Search</h5>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 ">
                {!! Form::open(['url' => '/search/results', 'class' => 'form-horizontal', 'files' => true]) !!}    
                    {!! Form::label('first_name', 'First Name:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-5" style="padding-right:1">
                            {!! Form::text('search', null, ['class' => 'form-control search', 'required' => 'required']) !!}
                            
                        </div>
                    
                    <button type="submit" class="btn btn-success col-sm-1" style="">Search</button>
                 {!! Form::close() !!}
        </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 ">
                {!! Form::open(['url' => '/search/results', 'class' => 'form-horizontal', 'files' => true]) !!}    
                    {!! Form::label('last_name', 'Last Name:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-5" style="padding-right:1">
                            {!! Form::text('search', null, ['class' => 'form-control search', 'required' => 'required']) !!}
                            
                        </div>
                    
                    <button type="submit" class="btn btn-success col-sm-1" style="">Search</button>
                 {!! Form::close() !!}
        </div>
       



        <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">


            <a href="{{ url('/admin/skill-cards/create') }}" class="btn btn-primary btn-xs" title="Add New SkillCard">Create New Card &nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true" /></a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Skill Card Name </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

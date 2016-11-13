@extends('layouts.matrix') @section('dashboard') @include('Instructors.instructor-dashboard') @endsection @section('content')


<style>
    .form-control.search {
        padding-right: 1px;
    }
    
    @media(min-width:468px) {
        .search-text {
            width: 50%;
            display: inline;
        }
    }

</style>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Search For A Swimmer</h5>
    </div>
    <div class="row" style="margin-top:20px;">
        <!--Hide first name for now -->
        <div style="display:none;" class="col-sm-10 col-sm-offset-1 col-xs-12 ">
            <div class="control-group">
                {!! Form::open(['url' => '/search/results', 'class' => 'form-horizontal', 'files' => true]) !!} {!! Form::label('first_name', 'First Name:', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-5" style="padding-right:1">
                    {!! Form::text('first_name', null, ['class' => 'form-control search', 'required' => 'required']) !!}

                </div>

                <button type="submit" class="btn btn-success col-sm-1" style="">Search</button>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-sm-10 col-sm-offset-1 col-xs-12 " style="margin-top:20px;margin-bottom:20px;">
            <div class="control-group">
                {!! Form::open(['url' => '/search/lastNamesLike','method' => 'get', 'class' => 'form-horizontal', 'files' => true]) !!}
                <div class="col-sm-2  " style="padding-left:12px;padding-top:5px;">
                    {!! Form::label('last_name', 'Last Name:', ['class' => 'control ']) !!}
                </div>
                <div class="col-sm-8  " style="margin-bottom:5px;">
                    {!! Form::text('last_name', null, ['class' => ' form-control search ', 'required' => 'required']) !!}
                </div>

                <div class="col-sm-2 " style="">
                    <button type="submit" class="btn btn-success " style="">Search</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>My Student Swimmers</h5>
    </div>
    @include('Instructors.search.resultsGrid')
</div>
@endsection

@extends('layouts.matrix') 

@section('dashboard') @include('Instructors.instructor-dashboard') @endsection 

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Search Results</h5>
    </div>
    @include('Instructors.search.resultsGrid')
</div>


@endsection

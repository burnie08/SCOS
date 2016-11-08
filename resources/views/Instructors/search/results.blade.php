@extends('layouts.matrix') 

@section('dashboard') @include('Instructors.instructor-dashboard') @endsection 

@section('content')
<div class="widget-box">
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($swimmers as $item)
                <tr class="gradeX">
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end-Footer-part-->


@endsection

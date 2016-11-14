@extends('layouts.matrix') 
@section('dashboard') @include('Instructors.instructor-dashboard') @endsection 
 btn-danger
@section('content')

@php
    $css = [2=>'list-group-item-success', 3=>'list-group-item-info', 4=>'list-group-item-warning', 5=>'list-group-item-danger'];

@endphp

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Swimmer Summary</h5>
    </div>

    <div class="widget-content ">
        <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th> Swimmer Name </th>
                        </tr>
                        <tr>
                            <td> {{ $swimmer->first_name }} &nbsp; {{ $swimmer->last_name }} </td>

                    </tbody>
                </table>
    </div>
</div>


@foreach($swimmer->skillCards as $skillCard)
     
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>{{$skillCard->name}}</h5>
    </div>

    <div class="widget-content ">
         <div class="list-inline">
        @foreach($swimmer->skills($skillCard->skill_card_id) as $skill) 
            <h1>{{$skill->name}}</h1>
           
                @foreach($swimmer->evals($skill->id) as $eval)
                    <li class="list-group-item {{$css[$eval->skill_level_id]}}">
                        <a   href='/lessons/{{$eval->lesson_id}}/evalsEdit'><div><p>{{$eval->lesson_date}}</p><span class="badge">{{$eval->name}}</span></div></a></li>
                @endforeach
            
        @endforeach
        </div>
    </div>
</div>
@endforeach @endsection

@extends('layouts.matrix') @section('dashboard') @include('Instructors.instructor-dashboard') @endsection @section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5><a href='/lessons/{{$lesson->swimmer->id}}/show'>Swimmer</a> &lt; Skill Card Evaluation</h5>
    </div>

    <div class="panel panel-default">

        <div class="panel-body">

            <div class="table-responsive" style="">
                
                
             {!! Form::open(['url' => '/lessons/'.$lesson->id.'/evalsUpdate', 'class' => 'form-horizontal', 'files' => true, 'method'=>'post']) !!}
                <input type="submit" class="btn btn-info control"  style="float:right; margin-bottom:20px;" value="Update" >
                
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Skill Card Name</th>
                        </tr>
                        <tr>
                            <td>{{ $lesson->skillcard->name}}</td>
                        </tr>

                        <tr>
                            <th> Swimmer Name </th>
                        </tr>
                        <tr>
                            <td> {{ $lesson->swimmer->first_name }} &nbsp; {{ $lesson->swimmer->last_name }} </td>
                        </tr>

                        <tr>
                            <th> Instructor Name </th>
                        </tr>
                        <tr>
                            <td>{{$lesson->instructor->name }}</td>
                        </tr>
                        <tr>
                            <th>Lesson Date</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" name="lessonDate" class="form-control datepicker" readonly="readonly" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Comments</th>

                        </tr>
                        <tr>
                            <td>
                                <textarea name="comments" rows="4" cols="50">{{$lesson->comments}}</textarea>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    //set Pacific time
    date = new Date('{{$lesson->lesson_date}} GMT-0800');
    
    $('.datepicker').datepicker().datepicker("setDate",  date);
    
    
</script>
        </div>
            <!--
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
-->
            <style>
                Input.datepicker[readonly]
                {
                    background-color: white; !important
                }
                .opt1.ui-radio-on {
                    background-color: red !important;
                }
                
                
                .opt2.ui-radio-on {
                    background-color: yellow !important;
                    color: black !important;
                }
                
                .opt3.ui-radio-on {
                    background-color: green !important;
                }
                
                input[type="radio"].toggle {
                    display: none;
                }
                
                input[type="radio"].opt1.toggle:checked + label {
                    background-color: red;
                    color: white;
                }
                
                input[type="radio"].opt2.toggle:checked + label {
                    background-color: yellow;
                }
                
                input[type="radio"].opt3.toggle:checked + label {
                    background-color: green;
                    color: white;
                }
                
                input[type="radio"].opt4.toggle:checked + label {
                    background-color: orange;
                    color: white;
                }
                
                input[type="radio"].toggle + label {
                    /* width: 100px; */
                    font-size: 20px;
                }

            </style>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Skill Evaluations</h5>
    </div>

    <div class="panel panel-default">

        <div class="panel-body">

            @php // This is how we do a php statement // lets try using it like a function. @endphp @php($cnt_skill = 1) @foreach($lesson->evals as $eval)

            <div class="col-sm-12">
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <legend>{{$eval->skill->name}}:</legend>
                    @php($cnt = 1) @foreach($levels as $level)
                    <input type="radio" name="radio-skill-{{$eval->skill->id}}" id="radio{{$cnt_skill}}-choice-{{$cnt}}" value="{{$level->id}}" class="opt{{$cnt}} toggle" data-opt="{{$cnt}}"
                           @php
                                if($eval->skill_level_id == $level->id )
                                {
                                    echo " checked='checked'";
                                }
                            @endphp
                           >
                    <label  for="radio{{$cnt_skill}}-choice-{{$cnt}}" class="opt{{$cnt}} col-xs-12 col-sm-3 text-center ">{{$level->short_name}}</label>
                    @php($cnt = 1 + $cnt) @endforeach

                </fieldset>
            </div>
            @php($cnt_skill = 1 + $cnt_skill) @endforeach
             <input type="submit" class="btn btn-info control"  style="float:right; margin-top:50px;" value="Update" >
        </div>
       
    </div>
</div>

{!! Form::close() !!}

<script>
    $("input[type='radio']").click(function() {
        myData = $(this).data();
        //alert(myData.opt);
    });

</script>

@endsection

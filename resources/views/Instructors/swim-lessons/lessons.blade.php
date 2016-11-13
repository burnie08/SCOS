@extends('layouts.matrix') @section('dashboard') @include('Instructors.instructor-dashboard') @endsection @section('content')

<style>
    span.swimmer.glyphicon {
        padding: 4px 0px;
    }

</style>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Swimmer</h5>
    </div>

    <div class="widget-content ">

        <div class="table-responsive" style="max-width:300px;">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>
                        </th>
                        <td>
                            <a href="{{ url('Instructors/swimmers/' . $swimmer->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Swimmer"><span class="swimmer glyphicon glyphicon-pencil" aria-hidden="true" /></a>
                            {!! Form::open([ 'method'=>'DELETE', 'url' => ['Instructors/swimmers', $swimmer->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="swimmer glyphicon glyphicon-trash" aria-hidden="true" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Swimmer', 'onclick'=>'return confirm("Confirm delete?")' ))!!} {!! Form::close() !!}

                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td>{{ $swimmer->id }}</td>
                    </tr>
                    <tr>
                        <th> First Name </th>
                        <td> {{ $swimmer->first_name }} </td>
                    </tr>
                    <tr>
                        <th> Last Name </th>
                        <td> {{ $swimmer->last_name }} </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Create Lesson</h5>
    </div>
    <div class="row" style="margin-top:20px;">
        <ul class="quick-actions">
            @foreach($cards as $card)
            <li class="bg_lg ">
                <a href="/lessons/{{$card->id}}/{{$swimmer->id}}/evalsCreate"> <i class="icon-th-list"></i>{{$card->name}}</a>
            </li>
            @endforeach

        </ul>

    </div>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Completed Lessons</h5>
    </div>
    <div class="widget-content ">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Lesson Date</th>
                    <th>Instructor</th>
                    <th>Skill Card</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($lessons) @foreach($lessons as $lesson)
                <tr class="gradeX">
                    <td>{{$lesson->id}}</td>
                    <td>{{date_create($lesson->lesson_date)->format('m/d/y')}}</td>
                    <td>{{$lesson->instructor->name}}</td>
                    <td>{{$lesson->skillcard->name}}</td>
                    <td>
                        <a href="{{ url('/lessons/' . $lesson->id . '/evalsEdit') }}" class="btn btn-primary btn-xs" title="Edit Lesson"><span class="swimmer glyphicon glyphicon-pencil" aria-hidden="true" /></a>
                        {!! Form::open([ 'method'=>'get', 'url' => ['/lessons', $lesson->id,$lesson->swimmer->id,'destroy'], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="swimmer glyphicon glyphicon-trash" aria-hidden="true" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Lesson', 'onclick'=>'return confirm("Confirm delete?")' ))!!} {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach @endif
            </tbody>
        </table>
    </div>
</div>

<script src="/js/jquery.uniform.js"></script>
<script src="/js/matrix.popover.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>

@endsection

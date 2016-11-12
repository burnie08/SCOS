@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">eval {{ $eval->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('Instructors/evals/' . $eval->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit eval"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Instructors/evals', $eval->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete eval',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $eval->id }}</td>
                                    </tr>
                                    <tr><th> Lesson Id </th><td> {{ $eval->lesson_id }} </td></tr><tr><th> Skill Id </th><td> {{ $eval->skill_id }} </td></tr><tr><th> Skill Level Id </th><td> {{ $eval->skill_level_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
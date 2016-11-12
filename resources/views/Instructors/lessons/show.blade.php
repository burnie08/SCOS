@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">lesson {{ $lesson->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('Instructors/lessons/' . $lesson->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit lesson"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['Instructors/lessons', $lesson->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete lesson',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $lesson->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $lesson->user_id }} </td></tr><tr><th> Swimmer Id </th><td> {{ $lesson->swimmer_id }} </td></tr><tr><th> Skill Card Id </th><td> {{ $lesson->skill_card_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
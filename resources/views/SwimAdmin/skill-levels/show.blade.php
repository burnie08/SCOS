@extends('layouts.matrix') @section('dashboard') @include('SwimAdmin.skill-cards.skill-dashboard') @endsection 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">SkillLevel {{ $skilllevel->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('SwimAdmin/skill-levels/' . $skilllevel->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SkillLevel"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['SwimAdmin/skilllevels', $skilllevel->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete SkillLevel',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $skilllevel->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $skilllevel->name }} </td></tr><tr><th> Short Name </th><td> {{ $skilllevel->short_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
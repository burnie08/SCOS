@extends('layouts.matrix') 

@section('dashboard') @include('SwimAdmin.swim-admin-dashboard') @endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Skill levels</h5>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Skill Level {{ $skilllevel->id }}</div>
        <div class="panel-body">

            <a href="{{ url('SwimAdmin/skill-levels/' . $skilllevel->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SkillLevel"><span class="glyphicon glyphicon-pencil" aria-hidden="true" /></a>
            {!! Form::open([ 'method'=>'DELETE', 'url' => ['SwimAdmin/skilllevels', $skilllevel->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete SkillLevel', 'onclick'=>'return confirm("Confirm delete?")' ))!!} {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $skilllevel->id }}</td>
                        </tr>
                        <tr>
                            <th> Name </th>
                            <td> {{ $skilllevel->name }} </td>
                        </tr>
                        <tr>
                            <th> Short Name </th>
                            <td> {{ $skilllevel->short_name }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

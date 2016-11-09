@extends('layouts.matrix') 
@section('dashboard') @include('SwimAdmin.swim-admin-dashboard') @endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Skill levels</h5>
    </div>

    <div class="panel-body">

        <a href="{{ url('/SwimAdmin/skill-levels/create') }}" class="btn btn-primary btn-xs" title="Add New Skill Level"><span>Create New Skill Level &nbsp;</span><span class="glyphicon glyphicon-plus" aria-hidden="true" /></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Name </th>
                        <th> Short Name </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skilllevels as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->short_name }}</td>
                        <td>
                            <a href="{{ url('/SwimAdmin/skill-levels/' . $item->id) }}" class="btn btn-success btn-xs" title="View SkillLevel"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" /></a>
                            <a href="{{ url('/SwimAdmin/skill-levels/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SkillLevel"><span class="glyphicon glyphicon-pencil" aria-hidden="true" /></a>
                            {!! Form::open([ 'method'=>'DELETE', 'url' => ['/SwimAdmin/skill-levels', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete SkillLevel" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete SkillLevel', 'onclick'=>'return confirm("Confirm delete?")' )) !!} {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $skilllevels->render() !!} </div>
        </div>

    </div>
</div>

@endsection

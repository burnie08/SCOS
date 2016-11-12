@extends('layouts.matrix') @section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Swimmer {{ $swimmer->id }}</h5>
    </div>
    <div class="widget-content ">

        <a href="{{ url('Instructors/swimmers/' . $swimmer->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Swimmer"><span class="glyphicon glyphicon-pencil" aria-hidden="true" /></a>
        {!! Form::open([ 'method'=>'DELETE', 'url' => ['Instructors/swimmers', $swimmer->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Swimmer', 'onclick'=>'return confirm("Confirm delete?")' ))!!} {!! Form::close() !!}
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
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

@endsection

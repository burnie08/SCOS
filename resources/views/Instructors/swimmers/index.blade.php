@extends('layouts.matrix') @section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Swimmer</h5>
    </div>
    <div class="widget-content ">


        <a href="{{ url('/Instructors/swimmers/create') }}" class="btn btn-primary btn-xs" title="Add New Swimmer"><span class="glyphicon glyphicon-plus" aria-hidden="true" /></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($swimmers as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>
                            <a href="{{ url('/Instructors/swimmers/' . $item->id) }}" class="btn btn-success btn-xs" title="View Swimmer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" /></a>
                            <a href="{{ url('/Instructors/swimmers/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Swimmer"><span class="glyphicon glyphicon-pencil" aria-hidden="true" /></a>
                            {!! Form::open([ 'method'=>'DELETE', 'url' => ['/Instructors/swimmers', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Swimmer" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete Swimmer', 'onclick'=>'return confirm("Confirm delete?")' )) !!} {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $swimmers->render() !!} </div>
        </div>

    </div>
</div>
<script src="/js/matrix.popover.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>
@endsection

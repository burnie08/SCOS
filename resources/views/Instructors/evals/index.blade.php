@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Evals</div>
                    <div class="panel-body">

                        <a href="{{ url('/Instructors/evals/create') }}" class="btn btn-primary btn-xs" title="Add New eval"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Lesson Id </th><th> Skill Id </th><th> Skill Level Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($evals as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->lesson_id }}</td><td>{{ $item->skill_id }}</td><td>{{ $item->skill_level_id }}</td>
                                        <td>
                                            <a href="{{ url('/Instructors/evals/' . $item->id) }}" class="btn btn-success btn-xs" title="View eval"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/Instructors/evals/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit eval"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/Instructors/evals', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete eval" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete eval',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $evals->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
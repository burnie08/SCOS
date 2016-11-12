@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lessons</div>
                    <div class="panel-body">

                        <a href="{{ url('/Instructors/lessons/create') }}" class="btn btn-primary btn-xs" title="Add New lesson"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> User Id </th><th> Swimmer Id </th><th> Skill Card Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lessons as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->swimmer_id }}</td><td>{{ $item->skill_card_id }}</td>
                                        <td>
                                            <a href="{{ url('/Instructors/lessons/' . $item->id) }}" class="btn btn-success btn-xs" title="View lesson"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/Instructors/lessons/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit lesson"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/Instructors/lessons', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete lesson" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete lesson',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $lessons->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
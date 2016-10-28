@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Skill</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/skill') }}/{{$card->id}}/create" class="btn btn-primary btn-xs" title="Add New Skill"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Skill Card Id </th><th> Name </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($card->skills as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->skill_card_id }}</td><td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/skill/' . $item->id) }}" class="btn btn-success btn-xs" title="View Skill"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/skill/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Skill"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'url' => ['/admin/skill', $item->id,'delete'],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Skill" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Skill',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
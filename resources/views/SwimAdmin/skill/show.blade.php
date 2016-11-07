@extends('layouts.matrix') @section('content')


<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5>Skill Cards </h5>
            </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

                        <a href="{{ url('admin/skill/' . $skill->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Skill"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/>Create Skill</a>Create Skill
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['SwimAdmin/skill', $skill->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Skill',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $skill->id }}</td>
                                    </tr>
                                    <tr><th> Skill Card Id </th><td> {{ $skill->skill_card_id }} </td></tr><tr><th> Name </th><td> {{ $skill->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
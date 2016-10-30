@extends('layouts.matrix') @section('content')



        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5>Skill Cards </h5>
            </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">


                        <a href="{{ url('/admin/skill-cards/create') }}" class="btn btn-primary btn-xs" title="Add New SkillCard">Create New Card &nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true" /></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Skill Card Name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skillcards as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/skill/' . $item->id.'/showAll') }}" class="btn btn-success btn-xs" title="View SkillCard"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" /></a>
                                            <a href="{{ url('/admin/skill-cards/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SkillCard"><span class="glyphicon glyphicon-pencil" aria-hidden="true" /></a>
                                            {!! Form::open([ 'method'=>'DELETE', 'url' => ['/admin/skill-cards', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete SkillCard" />', array( 'type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Delete SkillCard', 'onclick'=>'return confirm("Confirm delete?")' )) !!} {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $skillcards->render() !!} </div>
                        </div>
                        
                        
                        
                    </div>
            </div>
        </div>
    


@endsection

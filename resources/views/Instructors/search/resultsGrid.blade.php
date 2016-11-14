
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Max Skill Card Achieved</th>
                    <th>Last Date Attended</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($swimmers as $item)
                <tr class="gradeX">
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->maxSkillCard}}</td>
                    <td>{{$item->lastAttended}}</td>
                    <td>
                        
                        <a href="{{ url('/Instructors/swimmers/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Swimmer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/Instructors/swimmers', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Swimmer" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Swimmer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                        <a href="{{ url('/lessons/'.$item->id.'/show') }}" class="btn btn-success btn-xs" title="View Swimmer"><span>Lessons &nbsp;</span><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/lessons/'.$item->id.'/lessonsReport') }}" class="btn btn-success btn-xs" title="Lessons Report"><span>Report &nbsp;</span><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!--end-Footer-part-->

<script src="/js/matrix.popover.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>

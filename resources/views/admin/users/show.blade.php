@extends('layouts.matrix')

@section('content')
    <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>User</h5>
    </div>
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID.</th> <th>Name</th><th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td> <td> {{ $user->name }} </td><td> {{ $user->email }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
            
@endsection
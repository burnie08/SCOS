@extends('layouts.matrix')
@section('dashboard') @include('admin.admin-dashboard') @endsection 
@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
        <h5>Dashboard</h5>
    </div>
    <div class="panel-body">
        Your application's dashboard.
    </div>
</div>
    
@endsection
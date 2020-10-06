@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Checks
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Checks</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Attendance</th>
                                <th>Leave</th>
                                <th>Worked Hours</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach( $checks as $check)

                                <tr>
                                    <td>{{ date('M-d-yy', strtotime($check->attendance_date)) }}</td> 
                                    <td>{{$check->name}}</td>
                                    <td>{{ date('g:i A', strtotime($check->attendance_time)) }}</td> 
                                    <td>{{ date('g:i A', strtotime($check->leave_time)) }}</td> 
                                    <td>{{$hours}} Hours</td>

                                    <td>

                                        <a href="" data-toggle="modal" class="btn btn-sm edit "><i class='fa fa-eye'></i> View Log History</a>
                                        
                                    </td>
                                </tr>

                                @endforeach
                               
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

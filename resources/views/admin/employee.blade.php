@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Employees</li>
            <li class="active">Employee List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Job Description</th>
                                <th>Schedule</th>
                                <th>Member Since</th>
                                
                                <th>Tools</th>
                            </thead>
                            <tbody>

                                

                                @foreach( $employees as $employee)

                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td> {{$employee->rate['jobdescription']}}</td>
                                    <td>
                                        @if(isset($employee->schedules->first()->slug))
                                        {{$employee->schedules->first()->slug}}
                                        @endif
                                    </td>
                                    
                                    <td>{{ date('M-d-yy', strtotime($employee->created_at)) }}</td> 
                                    <td>

                                        <a href="#edit{{$employee->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$employee->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="{{ route('payrolls.show', ['id' => $employee->id]) }}" style="margin-left: 10px;" class="btn btn-info">Payroll</a>
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
@foreach( $employees as $employee)
@include('includes.edit_delete_employee')
@endforeach



@include('includes.add_employee')

@endsection

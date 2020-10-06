@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Rates
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Employees</li>
            <li class="active">Employee Rates</li>
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
                                <th>Job Description</th>
                                <th>SSS</th>
                                <th>Philheath</th>
                                <th>Frequency</th>
                                <th>Salary</th>
                                <th>Modified</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach( $rates as $rate)

                                <tr>
                                    <td>{{$rate->jobdescription}}</td>
                                    <td>₱ {{$rate->sss}}</td>
                                    <td>₱ {{$rate->philhealth}}</td>
                                    <td>{{$rate->frequency}}</td>
                                    <td>₱ {{$rate->salary}}</td>
                                    <td>{{ date('M-d-yy', strtotime($rate->updated_at)) }}</td>     
                                    <td>

                                        <a href="#edit{{$rate->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$rate->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
@foreach($rates as $rate)
@include('includes.edit_delete_rates')
@endforeach 

@include('includes.add_rates')

@endsection

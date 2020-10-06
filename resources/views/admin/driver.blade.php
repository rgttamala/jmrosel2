@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Drivers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Cargo</li>
            <li class="active">Drivers</li>
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
                                <th>SSS</th>
                                <th>Philheath</th>
                              
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach($drivers as $driver)

                                <tr>
                                    <td>{{$driver->drivername}}</td>
                                    <td>₱ {{$driver->sss}}</td>
                                    <td>₱ {{$driver->philhealth}}</td>
                                    <td>

                                        <a href="#edit{{$driver->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$driver->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="{{ route('driverpayrolls.show', ['id' => $driver->id]) }}" style="margin-left: 10px;" class="btn btn-info">Payroll</a>
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

@foreach($drivers as $driver)
@include('includes.edit_delete_driver')
@endforeach
@include('includes.add_driver')
@endsection

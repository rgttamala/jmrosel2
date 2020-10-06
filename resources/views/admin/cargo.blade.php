@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cargo List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Cargo</li>
            <li class="active">Cargo List</li>
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
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Route</th>
                                <th>Truck Type</th>
                                <th>Cargo Name</th>
                                <th>Driver</th> 
                                <th>Helper</th> 
                                <th>Remarks</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach($cargos as $cargo)

                                <tr>
                                    <td>{{$cargo->origin}}</td>
                                    <td>{{$cargo->destination}}</td>
                                    <td>{{$cargo->route}}</td>
                                    <td>{{$cargo->trucktype}}</td>
                                    <td>{{$cargo->cargoname}}</td>
                                    <td>{{$cargo->driver->drivername}}</td>
                                    <td>{{$cargo->helper->helpername}}</td>
                                    <td> Remarks Sample </td>
            
                                    <td>
                                        <a href="#edit{{$cargo->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$cargo->id}}"  data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
@foreach( $cargos as $cargo)
@include('includes.edit_delete_cargo')
@endforeach
@include('includes.add_cargo') 

@endsection

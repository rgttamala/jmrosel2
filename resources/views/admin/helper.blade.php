@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Helpers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Cargo</li>
            <li class="active">Helpers</li>
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
                                @foreach($helpers as $helper)

                                <tr>
                                    <td>{{$helper->helpername}}</td>
                                    <td>₱ {{$helper->sss}}</td>
                                    <td>₱ {{$helper->philhealth}}</td>
                                    <td>

                                        <a href="#edit{{$helper->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$helper->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="{{ route('helperpayrolls.show', ['id' => $helper->id]) }}" style="margin-left: 10px;" class="btn btn-info">Payroll</a>
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
@foreach( $helpers as $helper)
@include('includes.edit_delete_helper')
@endforeach

@include('includes.add_helper') 

@endsection

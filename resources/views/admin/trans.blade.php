@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cargo Daily
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Transactions</li>
            <li class="active">Cargo Transactions</li>
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
                                <th>Travel Date</th>
                                <th>Plate Number</th>
                                <th>Cargo</th>
                                <th>Docs</th>
                                <th>Trucking</th>
                                <th>remarks</th>
                            </thead>
                            <tbody>
                                @foreach( $transactions as $transaction)

                                <tr>
                                    <td>{{ date('M-d-yy', strtotime($transaction->traveldate)) }}</td> 
                                    <td>
                                        <a href="#editt{{$transaction->id}}" data-toggle="modal"><i class='fa fa-edit'></i>{{$transaction->platenumber}}</a>
                                    </td>
                                    <td>{{$transaction->cargo->origin}} - {{$transaction->cargo->destination}} ({{$transaction->cargo->cargoname}})</td>
                                    <td>{{$transaction->docs}}</td>
                                    <td>{{$transaction->trucking}}</td> 
                                    <td>{{$transaction->remarks}}</td> 
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

@foreach ($transactions as $transaction)
@include('includes.edit_transactions_info')    
@endforeach

@include('includes.add_trans')

@endsection

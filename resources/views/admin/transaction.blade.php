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
                        <table id="example1" class="table table-bordered>">
                          
                            <thead>
                                <th>Travel Date</th>
                                <th>Cargo</th>
                                <th>Docs</th>
                                <th>Trucking</th>
                                <th>Client Rate</th>
                                <th style="text-align: center">50%</th>
                                <th>Full Payment</th>
                                <th>Client Balance</th>
                              
                                <th>Subcon Rate</th>
                                <th style="text-align: center">50%</th>
                                <th>Full Payment</th>
                                <th>Subcon Balance</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                               

                             @foreach ($transactions as $transaction)

                             <tr>
                                <td>{{ date('M-d-yy', strtotime($transaction->traveldate)) }}</td> 
                                <td>{{$transaction->cargo->origin}} - {{$transaction->cargo->destination}} ({{$transaction->cargo->cargoname}})</td>
                                <td>{{$transaction->docs}}</td>
                                <td>{{$transaction->trucking}}</td>
                                <td>₱{{ number_format ($transaction->client_rate, 2) }}</td>

                            @if ($transaction->client_partial == 'Paid')
                                <td style="color: green">✔ {{ date('M-d-yy', strtotime($transaction->client_partial_date)) }} ||  ₱{{ number_format ($transaction->client_partial_amount, 2) }}</td> 
                            @endif

                            @if ($transaction->client_partial == 'Unpaid')
                            <td style="color: red">✗</td> 
                            @endif

                            @if ($transaction->client_full == 'Paid')
                             <td style="color: green">✔ {{ date('M-d-yy', strtotime($transaction->client_full_date)) }} ||  ₱{{ number_format ($transaction->client_full_amount, 2) }}</td> 
                                @endif

                            @if ($transaction->client_full == 'Unpaid')
                            <td style="color: red">✗</td> 
                            @endif


                            @if ($transaction->client_full == 'Paid')  
                            <td style="color: green"> <strong>Paid </strong></td> 
                            @endif

                            @if ($transaction->client_full == 'Unpaid')
                                <td>₱{{ number_format ($transaction->client_balance, 2) }}</td>
                            @endif
                            

                       





                            <td>₱{{ number_format ($transaction->subcon_rate, 2) }}</td>

                        @if ($transaction->subcon_partial == 'Paid')
                            <td style="color: green">✔ {{ date('M-d-yy', strtotime($transaction->subcon_partial_date)) }} |  ₱{{ number_format ($transaction->subcon_partial_amount, 2) }} </td> 
                        @endif

                        @if ($transaction->subcon_partial == 'Unpaid')
                        <td style="color: red">✗</td> 
                        @endif

                        @if ($transaction->subcon_full == 'Paid')
                        <td style="color: green">✔ {{ date('M-d-yy', strtotime($transaction->subcon_full_date)) }} |  ₱{{ number_format ($transaction->subcon_partial_amount, 2) }} </td> 
                            @endif

                        @if ($transaction->subcon_full == 'Unpaid')
                        <td style="color: red">✗</td> 
                        @endif


                        @if ($transaction->subcon_full == 'Paid')  
                        <td style="color: green"> <strong>Paid </strong></td> 
                        @endif

                        @if ($transaction->subcon_full == 'Unpaid')
                            <td>₱{{ number_format ($transaction->subcon_balance, 2) }}</td>
                        @endif






                               
                                
                                <td>
                                    <a href="#edit{{$transaction->id}}" data-toggle="modal" class="btn btn-success btn-sm edit"><i class='fa fa-edit'></i>Payments</a>
                                </td>
                             </tr>
                                 
                             @endforeach
                            </tbody>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th bgcolor="skyblue">₱ {{ number_format($clientRate, 2) }}</th>
                            <th></th>
                            <th></th>
                            <th bgcolor="skyblue">₱ {{ number_format($clientBalance, 2) }}</th>
                         
                            <th bgcolor="skyblue">₱ {{ number_format($subconRate, 2) }}</th>
                            <th></th>
                            <th></th>
                            <th bgcolor="skyblue">₱ {{ number_format($subconBalance, 2) }}</th>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@foreach($transactions as $transaction)
@include('includes.edit_delete_transactions')
@endforeach 

@include('includes.add_transaction')

@endsection

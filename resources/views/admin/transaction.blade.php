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
            <div class="col-xs-20">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if(auth()->user()->rates_id == 1)
                             <a href="{{route('transaction.reports')}}" class="btn btn-warning btn-sm" target="_blank">Transaction Reports</a>
                          @endif 
                    </div>
                    <div>
                        <table id="example2" class="table table-bordered>">
                            <thead>
                                <tr>
                                    @if(auth()->user()->rates_id == 1)
                                   
                                 
                                <th>Client Rate:</th>
                                <th bgcolor="green" style="color: white">₱{{ number_format($clientRate, 2) }}</th>
                                <th></th>
                                <th>Client Balance:</th>
                                <th bgcolor="green" style="color: white">₱{{ number_format($clientBalance, 2) }}</th>
                                <th>Subcon Rate:</th>
                                <th bgcolor="skyblue">₱{{ number_format($subconRate, 2) }}</th>
                                <th>Subcon Balance: </th>
                                <th bgcolor="skyblue">₱{{ number_format($subconBalance, 2) }}</th>
                                <th></th>
                                @endif
                                </tr>
                            </thead>
                        </table>
                    </div>

                     

                    <div class="box-body">
                        
                        <table id="example1" class="table table-bordered>">
                           
                            <thead>
                                <th>Travel Date</th>
                                <th>Plate Number</th>
                                <th>Cargo</th>
                                <th>Docs</th>
                                <th>Trucking</th>
                                @if(auth()->user()->rates_id == 1)
                                <th>Client Rate</th>
                                <th style="text-align: cent
                                er">50%</th>
                                <th>Full Payment</th>
                                <th>Client Balance</th>
                                <th>Subcon Rate</th>
                                <th style="text-align: center">50%</th>
                                <th>Full Payment</th>
                                <th>Subcon Balance</th>
                                @endif
                                <th>Remarks</th>
                                @if(auth()->user()->rates_id == 1)
                                <th>Tools</th>
                                @endif
                            </thead>
                            <tbody>
                                
                               
                                
                             @foreach ($transactions as $transaction)

                             <tr>
                                <td>{{ date('M-d-yy', strtotime($transaction->traveldate)) }}</td> 
                                <td>
                                    <a href="#editt{{$transaction->id}}" data-toggle="modal"><i class='fa fa-edit'></i>{{$transaction->platenumber}}</a>
                                </td>
                                <td>{{$transaction->cargo->origin}} - {{$transaction->cargo->destination}} ({{$transaction->cargo->cargoname}})</td>
                                <td>{{$transaction->docs}}</td>
                                <td>{{$transaction->trucking}}</td>
                        @if(auth()->user()->rates_id == 1)
                                <td>₱{{ number_format ($transaction->client_rate, 2) }}</td>

                            @if ($transaction->client_partial == 'Paid')
                                <td style="color: green">✔₱{{ number_format ($transaction->client_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->client_partial_date)) }} </td> 
                            @endif

                            @if ($transaction->client_partial == 'Unpaid')
                            <td style="color: red">✗</td> 
                            @endif

                            @if ($transaction->client_full == 'Paid')
                             <td style="color: green">✔₱{{ number_format ($transaction->client_full_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->client_full_date)) }}   </td> 
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
                            <td style="color: green">✔₱{{ number_format ($transaction->subcon_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->subcon_partial_date)) }}</td> 
                        @endif

                        @if ($transaction->subcon_partial == 'Unpaid')
                        <td style="color: red">✗</td> 
                        @endif

                        @if ($transaction->subcon_full == 'Paid')
                        <td style="color: green">✔₱{{ number_format ($transaction->subcon_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->subcon_full_date)) }}</td> 
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
                    @endif
                        <td>{{$transaction->remarks}}</td>  
                                <td>
                                    @if(auth()->user()->rates_id == 1)
                                    <a href="#edit{{$transaction->id}}" data-toggle="modal" class="btn btn-success btn-sm edit"><i class='fa fa-edit'></i>Payments</a>
                                    @endif
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
@foreach($transactions as $transaction)
@include('includes.edit_delete_transactions')
@endforeach 

@foreach ($transactions as $transaction)
@include('includes.edit_transactions_info')    
@endforeach

@include('includes.add_transaction')

@endsection

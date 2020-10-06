@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Driver Payroll
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Driver</li>
            <li class="active">Payroll</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="col-lg-12">
                            <h1 class="page-header">Payroll List: <strong>{{ $driver->drivername }}	</strong>
                                <!--input type="text" id="filterInput" onkeyup="filterFunction()" placeholder="Search Employees...."-->
                            </h1>	
                        </div>
                    
                        <a href="{{ route('driverpayrolls.create', ['id'=>$driver->id]) }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="box-body">
                        <table class= "table table-hover" id="filterTable">
                            <thead>	
                                <th>ID</td>
                                <th>Date-issued</td>
                                <th>Period Start</td>
                                <th>Period End</td>
                                <th>Total Cash Advance</th>
                                <th>Total Payroll</th>
                                <th>Payslip</th>
                                <th>Edit</th>	
                                
                            </thead>		
                                
                            
                            <tbody>
                                @foreach($payroll as $indexpayroll)
                               <tr>

                              
                                <td>{{$indexpayroll->id}}</td>
                                    <td>{{$indexpayroll->dateissued}}</td>
                                    <td>{{$indexpayroll->payperiodstart}}</td>
                                    <td>{{$indexpayroll->payperiodend}}</td>
                                    <td>{{$indexpayroll->totalcashadvance}}</td>
                                    <td>{{$indexpayroll->totalpayroll}}</td>
                               

                                <td>
                                    <a href="{{ route('driverpayrolls.receipt', ['id' => $indexpayroll->id]) }}" data-toggle="modal" class="btn btn-sm edit btn-flat"><i class='fa fa-eye'></i> View</a>
                                </td>  
                                
                                
                                <td>
                                    <a href="" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                </td>   
                                @endforeach
                               </tr>
                                
                                
                                
                            </tbody>				
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

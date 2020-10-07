@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
        
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="col-lg-12">
                            <h1 class="page-header">Payroll List: <strong>{{ $employee->name }}	</strong>
                                <!--input type="text" id="filterInput" onkeyup="filterFunction()" placeholder="Search Employees...."-->
                            </h1>	
                        </div>
                    
                        <a href="{{ route('payrolls.create', ['id'=>$employee->id]) }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="box-body">
                        <table class= "table table-hover" id="filterTable">
                            <thead>	
                                <th>Date-issued</td>
                                <th>Period Start</td>
                                <th>Period End</td>
                                <th>Total Hours</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Payslip</th>
                                {{-- <th>Edit</th>	
                                 --}}
                            </thead>		
                                
                            <tbody>
                               
                                    @foreach($employee->payrolls as $payroll)
                                        <tr>		
                                            <td>{{ date('M-d-yy', strtotime($payroll->dateissued)) }}    
                                            <td>{{ date('M-d-yy', strtotime($payroll->payperiodstart)) }}  
                                            <td>{{ date('M-d-yy', strtotime($payroll->payperiodend)) }}  
                                            <td>{{ $payroll->workedhours}} Hours </td>
                                            

                                            @if ($payroll->status == 'Unpaid')
                                                <td>
                                                    <span class="label label-primary pull-left" style="font-size: 12px;">{{$payroll->status}}</span>
                                                </td>

                                            @elseif($payroll->status == 'Paid')
                                                <td>
                                                    <span class="label label-success pull-left" style="font-size: 12px;">{{$payroll->status}}</span>
                                                </td>
                                             @endif
                                            <td> <strong> ₱{{ $payroll->subtotal}}  </strong></td>
                                            
                    
                                            <td>
                                                <a href="{{ route('payrolls.receipt', ['id' => $payroll->id]) }}" data-toggle="modal" class="btn btn-sm edit btn-flat"><i class='fa fa-eye'></i> View</a>
                                            </td>  
                                            
                                            
                                            {{-- <td>
                                                <a href="{{ route('payrolls.edit', ['id' => $payroll->id]) }}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                            </td>    --}}
                                                
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

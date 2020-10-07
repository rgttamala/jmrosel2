@extends('layouts.main')

@section('style')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payroll
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Employees</li>
            <li class="active">Payroll</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    
                    <div class="box-body">
					 
						
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>JMROSEL Company</strong>
                        <br>
                        #125, Bago Oshiro, Davao City
                        <br>
                        <abbr title="Phone"></abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <strong>{{$payroll->user->name}}</strong><br>
                        Date Issued: <em>{{ date('M-d-yy', strtotime($payroll->dateissued)) }}</em>
                    </p>
                    <p>
                        
                        <em> Worked Hours: </em><strong>{{$payroll->workedhours}} Hours </strong>
                        <br>
                        <em> From: </em> <strong>{{ date('M-d-yy', strtotime($payroll->payperiodstart)) }}</strong>
                        
                        <br>
                        <em> To: </em> <strong>{{ date('M-d-yy', strtotime($payroll->payperiodend)) }}   </strong>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Breakdown</th>
                            <th></th>
                            <th class="text-center"></th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>Salary</em></h4></td>
                            <td class="col-md-1" style="text-align: center">  </td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">₱{{$payroll->salary}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-9"><em>SSS</em></h4></td>
                            <td class="col-md-1" style="text-align: center">  </td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">- ₱{{$payroll->sss}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-9"><em>Philhealth</em></h4></td>
                            <td class="col-md-1" style="text-align: center">  </td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">- ₱{{$payroll->philhealth}}</td>
                        </tr>

                        <tr>
                            <td class="col-md-9"><em>Deductions</em></h4></td>
                            <td class="col-md-1" style="text-align: center"></td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">- ₱{{$payroll->deductions}}</td>
                        </tr>

                        <tr>
                            <td class="col-md-9"><em style="color: red">  - Deduction Remarks</em></h4></td>
                            <td class="col-md-1" style="text-align: center"></td>
                            <td class="col-md-1 text-center">- {{$payroll->deductionremarks}}</td>
                            <td class="col-md-1 text-center"></td>
                          
                        </tr>

                        

                        <tr>
                            <td class="col-md-9"><em>Cash Advance</em></h4></td>
                            <td class="col-md-1" style="text-align: center"></td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">- ₱{{$payroll->cashadvance}}</td>
                        </tr>


                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                           
                            <td class="text-center">
                            <p>
                            <strong>{{$payroll->subtotal}}</strong>
                            </p>
                            <p>
                                
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                        <td class="text-center text-danger"><h4>₱<strong>{{$payroll->subtotal}}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>



                     
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

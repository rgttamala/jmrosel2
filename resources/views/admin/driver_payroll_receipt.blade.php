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
                    
                    <div class="box-body">
					 
						
<div class="container">
    <div class="row">
        <div class="well col-xs-16 col-sm-16 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
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
                    
                       @foreach ($payrolldetails as $item)
                           
                       @endforeach

                       {{-- <strong>{{$item->driver_id}}</strong><br> --}}
                        Date Issued: <em>{{ date('M-d-yy', strtotime($item->dateissued)) }}</em>
                    </p>
                    <p>
                        
                        
                        <br>
                        <em> From: </em> <strong>{{ date('M-d-yy', strtotime($item->payperiodstart)) }}</strong>
                        
                        <br>
                        <em> To: </em> <strong>{{ date('M-d-yy', strtotime($item->payperiodend)) }}   </strong>
                         
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
              

                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Trip Date</th>
                        <th scope="col">Trip</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Rate</th>
                        <th scope="col">CA Date</th>
                        <th scope="col">Cash Advance</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($payrolldetails as $cargo)

                        <td>{{$cargo->datetrip}}</td>
                        <td>{{$cargo->trip}}</td>
                        <td>{{$cargo->cargo}}</td>
                        <td>₱{{$cargo->rate}}</td>
                        <td>{{$cargo->datecashadvance}}</td>
                        <td>₱{{$cargo->cashadvance}}</td>
                       
                      </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <td><strong> Rate: </strong></td>
                        <td><strong>₱{{ number_format ($cargo->totalrates, 2) }}</strong></td>
                        <td><strong> Total CA:</strong></td>
                        <td><strong>₱{{ number_format ($cargo->totalcashadvance, 2) }}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <pre class="tab">Subtotal:       ₱{{ number_format ($cargo->subtotal, 2) }}</pre>
                        
                        <pre class="tab">SSS:           -₱{{$cargo->sss}}</pre>
                        
                        <pre class="tab">Philhealth:    -₱{{$cargo->philhealth}}</pre>
                        
                        <pre class="tab">Deduction:     -₱{{$cargo->deduction}} <br>Remarks: {{$cargo->deductionremarks}}</pre>
                        
                       
                        
                        <pre class="tab"></pre>
                      </tr>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th><th scope="col"></th><th scope="col"></th><th scope="col"></th>
                        <th scope="col"></th><th scope="col"></th><th scope="col"></th>
                     <th> <td style="font-size: 20px"><strong>Total Payroll: ₱{{ number_format ($cargo->totalpayroll, 2) }}</strong></td></th>
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

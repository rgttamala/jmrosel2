@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">

                        <h3> {{$data[0]}} </h3>


                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="/employees" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">

                        <h3> {{$data[2]}} </h3>


                        <p>Total Drivers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>
                    <a href="/drivers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">

                        <h3> {{$data[1]}} </h3>


                        <p>Total Helpers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <a href="/helpers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">

                        <h3> {{$data[3]}} <sup style='font-size: 20px'>%</sup></h3>

                        <p>On Time Percentage</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/attendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3> {{$data[3]}} </h3>
                        <p>On Time Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="/attendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3> {{$data[4]}} </h3>

                        <p>Late Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="/latetime" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Issued Payroll (Office Employee)</h3>
                        <div class="box-tools pull-right">
                                
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <br>
                            <table class= "table table-hover">
                                <thead>	
                                    <tr>
                                        <th>Date-issued</td>
                                        <th>Employee Name</th>
                                        <th>Hours</th>
                                        <th>Salary</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>		
                                    
                                <tbody>
                                    @foreach ($payrolls as $item)
                                        <tr>		
                                            <td>{{ date('M-d-yy', strtotime($item->dateissued)) }}</td>   
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->workedhours }} hrs</td>
                                            <td>₱ {{ $item->salary }}</td>
                                            <td>{{ $item->status }}</td>
                                            <strong><td>₱ {{ $item->subtotal }}</td></strong>
                                        </tr>
                                    @endforeach
                                </tbody>							
                            </table>
                            <div id="legend" class="text-center"></div>
                            <canvas id="barChart" style="height:125px"></canvas>
                        </div>
                    </div>
                </div>
            </div>

          

            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Cargo Transaction</h3>
                        <div class="box-tools pull-right">
                                
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <br>
                            <table class= "table table-hover">
                                <thead>	
                                    <tr>
                                        <th>Travel Date</td>
                                        <th>Origin</td>
                                        <th>Destination</td>
                                        <th>cargo</td>
                                        <th>Trucking</td>
                                        <th>Plate Number</td>
                                      
                                       
                                    </tr>
                                </thead>		
                                    
                                <tbody>
                                    @foreach ($transactions as $trans)
                                    <tr>		
                                        <td>{{ date('M-d-yy', strtotime($trans->traveldate)) }}</td>  
                                        <td>{{ $trans->cargo->origin }}</td>
                                        <td>{{ $trans->cargo->destination }}</td>
                                        <td>{{ $trans->cargo->cargoname }}</td>
                                        <td>{{ $trans->trucking }}</td>
                                        <td>{{ $trans->platenumber }}</td>
                                    </tr>

                                        
                                    @endforeach
                                </tbody>							
                            </table>
                            <div id="legend" class="text-center"></div>
                            <canvas id="barChart" style="height:200px"></canvas>
                           
                            




                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </section>
    <!-- right col -->
</div>
@endsection

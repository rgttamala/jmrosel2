@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Cargos</li>
            <li class="active">Transactions</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add Cargo Transaction</h2>
                        </div>
                        <br><br>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                   
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="form-group col-xs-6">
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    <label for="email">Travel Date:</label>
                    <input type="date" class="form-control" id="traveldate" placeholder="Enter Travel Date" name="traveldate">
                  </div>
                  
                  <div class="form-group col-xs-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="email">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="email">City:</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                  </div>
                  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


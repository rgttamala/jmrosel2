@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
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
                <br><br>
                
                <form action="{{ route('transactions.update',$transaction->id) }}" method="POST"> 
                    {{-- {{ csrf_field() }}
                    {{ method_field('PATCH') }} --}}
               
                     <div class="row col-xs-5">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="date" id="name" name="name" value="{{ $transaction->traveldate }}" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="date" id="name" name="name" value="{{ $transaction->traveldate }}" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="date" id="name" name="name" value="{{ $transaction->traveldate }}" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="date" id="name" name="name" value="{{ $transaction->traveldate }}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="date" id="name" name="name" value="{{ $transaction->traveldate }}" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        
                       
            
                        <!-- -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button class="btn btn-primary" id="update_data" value="{{ $transaction->id }}">Submit</button>
                        </div>
                    </div>
               
                {{-- </form> --}}
                
            </div>
        </div>
    </section>
</div>

@endsection



@section('script')

@endsection


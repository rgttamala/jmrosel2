{{-- @extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Rates
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Transactions</li>
            <li class="active">Status</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        
                    </div>
                    <div class="box-body">
                        
                        <form class="form-horizontal" method="POST" action="{{ route('transactions.update',$transactions->id) }}">
                            @csrf
                            
                            <input type="hidden" name="_method" value="PUT">
                            <em> *Check and input date if done with payment.</em>
                            <br>
                               
                            <br>
        
                            
                            
                                
                                {{-- <a href="#delete{{$transaction->id}}" data-toggle="modal" class="btn btn-danger btn-sm edit btn-round pull-left"><i class='fa fa-edit'></i> Delete</a> --}}
                                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                        </form>




                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection --}}

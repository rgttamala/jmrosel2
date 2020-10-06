@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cargo Transactions
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
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-header with-border">
                            <a href="#addnew" data-toggle="modal"  class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                        </div>
                    </div>
                    <div class="box-body">
                       
                        <table class="table table-bordered table-sm">
                            <thead>
                             <tr>
                                <th>#</th>
                                <th>Travel Date</th>
                                <th>Cargo </th>
                                <th>Docs</th>
                                <th>Trucking</th>
                                <th>Plate Number</th>
                                <th>Allowance</th>
                                <th>Rate</th>
                                <th>Balance</th> 
                                   
                                 <th width="280px">Action</th>
                             </tr>
                            </thead>
                            <tbody id="bodyData">
                     
                            </tbody>  
                         </table>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.add_transaction')
@endsection



@section('script')
<script>
    $(document).ready(function() {
        var url = "{{URL('transactions')}}";
        $.ajax({
            url: "/transactions/getTransaction",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                    var editUrl = url+'/'+row.id+"/edit";
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.traveldate+"</td><td>"+row.cargo_id+"</td><td>"+row.docs+"</td><td>"+row.trucking+"</td><td>"+row.platenumber+"</td><td>"+row.allowance+"</td><td>"+row.rate+"</td>"
                    +"<td>"+row.balance+"</td><td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a>" 
                    +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
                    bodyData+="</tr>";
                    
                })
                $("#bodyData").append(bodyData);
            }
        });


    $(document).on("click", ".delete", function() { 
        var $ele = $(this).parent().parent();
        var id= $(this).val();
        var url = "{{URL('transactions')}}";
        var dltUrl = url+"/"+id;
		$.ajax({
			url: dltUrl,
			type: "DELETE",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
	});
        
});
</script>
@endsection


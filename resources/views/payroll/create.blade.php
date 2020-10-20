<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



	<form action="{{ route('payrolls.store',['id'=>$employee->id])}}" method="POST"
			class="form-horizontal">
				{{ csrf_field() }}
			
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <br><br>
                            <h6>Employee Name:</h6>
                        <legend>{{ strtoupper($employee->name) }} </legend>
                      
                       
                        </div>
                        <!-- panel preview -->
                        <div class="col-sm-5">
                            <h4>Add payment:</h4>
                    
                             <div class="panel panel-default">
                                 
                                <div class="panel-body form-horizontal payment-form">
                                    
                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 control-label">Period Start</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="payperiodstart" name="payperiodstart" required>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 control-label">Period End</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="payperiodend" name="payperiodend" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Worked Hours</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="workedhours" name="workedhours" required>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Cash Advance</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="amount" name="cashadvance" required>
                                        </div>
                                    </div>

                                   
                
                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Deductions</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="deductions" name="deductions" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="deductionremarks" class="col-sm-3 control-label">Deduction Remarks</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="deductionremarks" name="deductionremarks" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="Paid">Paid</option>
                                                <option value="Unpaid">Unpaid</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 control-label">Issued Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="dateissued" name="dateissued" required>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group" hidden>
                                       
                                        <div class="col-sm-9">
                                            @foreach ($rates as $rate)              
                                        <input type="number" class="form-control" id="salary" name="salary" value="{{$rate->salary}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Salary</label>
                                        <div class="col-sm-9">
                                                 <legend>₱{{ number_format ($rate->salary, 2) }}</legend>
                                        </div>
                                    </div>

                                   

                                    <div class="form-group" hidden>
                                       
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="sss" name="sss" value="{{$rate->sss}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">SSS</label>
                                        <div class="col-sm-9">
                                                 <legend>₱{{ number_format ($rate->sss, 2) }}</legend>
                                        </div>
                                    </div>

                                    <div class="form-group" hidden>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="philhealth" name="philhealth" value="{{$rate->philhealth}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Philhealth</label>
                                        <div class="col-sm-9">
                                                 <legend>₱{{ number_format ($rate->philhealth, 2) }}</legend>
                                        </div>
                                    </div>

                                    @endforeach
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12 text-right">
                                            <button type="button" class="btn btn-default preview-add-button">
                                                <span class="glyphicon glyphicon-plus"></span> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>            
                        </div> <!-- / panel preview -->
                        <div class="col-sm-7">
                            <h4>Preview:</h4>
                            <div class="row">
                                <div class="col-xs-12" >
                                    <div class="table-responsive">
                                        <table class="table preview-table" style="font-size: 12px">
                                            <thead>
                                                <tr>
                                                    <th>Date Issued</th>
                                                    <th>Cash Advance</th>
                                                    <th>Salary</th>
                                                    <th>SSS</th>
                                                    <th>Philhealth</th>
                                                    <th>Deductions</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody></tbody> <!-- preview content goes here-->
                                        </table>
                                    </div>                            
                                </div>
                            </div>
                            <div class="row text-right">
                                <div class="col-xs-12">
                                    <h4>Total: ₱<strong><span class="preview-total"></span></strong></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr style="border:1px dashed #dddddd;">
                                    <button type="submit" class="btn btn-primary btn-block">Submit all and finish</button>
                                </div>                
                            </div>
                
                       
                        </div>
                    </div>
                </div>
		</form> 
<script>
function calc_total(){
    var cashadvance = 0;
    var salary = 0;
    var sss = 0;
    var philhealth = 0;
    var deductions = 0;

    $('.input-cashadvance').each(function(){
        cashadvance = parseFloat($(this).text());
    });

    $('.input-salary').each(function(){
        salary = parseFloat($(this).text());
    });

    $('.input-sss').each(function(){
        sss = parseFloat($(this).text());
    });

    $('.input-philhealth').each(function(){
        philhealth = parseFloat($(this).text());
    });

    $('.input-deductions').each(function(){
        deductions = parseFloat($(this).text());
    });

    gov = sss + philhealth;
    salaries = salary;
    cashadva = cashadvance;
    deducs = deductions;

    total = salaries - gov - cashadva - deducs;
    $(".preview-total").text(total);    
}
$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
    	tr.remove();
	   	calc_total()
	});
});

$(function(){
    $('.preview-add-button').click(function(){
        var form_data = {};
        form_data["dateissued"] = $('.payment-form input[name="dateissued"]').val();
        form_data["cashadvance"] = $('.payment-form input[name="cashadvance"]').val();
        form_data["salary"] = $('.payment-form input[name="salary"]').val();
        form_data["sss"] = $('.payment-form input[name="sss"]').val();
        form_data["philhealth"] = $('.payment-form input[name="philhealth"]').val();
        form_data["deductions"] = $('.payment-form input[name="deductions"]').val();
        form_data["status"] = $('.payment-form #status option:selected').text();
        
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function( type, value ) {
            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.preview-table > tbody:last').append(row); 
        calc_total();
    });  
});
</script>
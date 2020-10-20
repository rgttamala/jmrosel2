<!DOCTYPE html>
<html lang="en">
<head>
  <title>Driver Payroll</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br>
<form action="{{ route('driverpayrolls.store',['id'=>$driver->id])}}" method="POST"
      class="form-horizontal">
          {{ csrf_field() }}

          
  <h2>{{$driver->drivername}}</h2>
  <p>Job Desription: Driver</p>   <br>  
<input type="hidden" style="width: 170px" name="sss" id="sss" value="{{$driver->sss}}" class="form-control col-sm-4" readonly>
<input type="hidden" style="width: 170px" name="philhealth" id="philhealth" value="{{$driver->philhealth}}" class="form-control col-sm-4" readonly>  


<div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Date Issued:</label>
      <div class="col-sm-10">
        <input type="date" style="width: 170px" name="dateissued" id="dateissued" class="form-control col-sm-4" required>
      </div>  
      <br><br>
      <label for="inputEmail3" class="col-sm-2 col-form-label">Period Start:</label>
      <div class="col-sm-10">
        <input type="date" style="width: 170px" name="payperiodstart" id="payperiodstart" class="form-control col-sm-4" required>
      </div>  
      <br><br>
      <label for="inputEmail3" class="col-sm-2 col-form-label">Period End:</label>
      <div class="col-sm-10">
        <input type="date" style="width: 170px" name="payperiodend" id="payperiodend" class="form-control col-sm-4" required> </p>               
      </div>  

 </div>

  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Trip Date</th>
        <th>Trip</th>
        <th>Cargo</th>
        <th>Rate</th>
        <th>Cash Advance</th>
        <th>Date Cash Advance</th>
        <th><a href="javascript:;" class="btn btn-info addRow">+ </a></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <hr>
        <td>
            <input type="date" name="tripdate[]" style="width: 170px" id="tripdate" class="form-control" > 
        </td>

        <td><select name="trip[]" id="trip" style="width: 200px" class="form-control" required> 
          @foreach ($cargos as $cargo)
        <option value="{{$cargo->origin}} to {{$cargo->destination}}">{{$cargo->origin}} to {{$cargo->destination}}</option>
          @endforeach
            
            </select>
        </td>

        <td><select name="cargo[]" id="cargo" style="width: 120px" class="form-control" required> 
          @foreach ($cargonames as $cargo)
        <option value="{{$cargo->cargoname}}">{{$cargo->cargoname}}</option>
          @endforeach
            </select>
        </td>

        <td>
            <input type="text" name="rate[]" id="rate" class="form-control" value="0" required> 
        </td>


        <td>
          <input type="number" name="cashadvance[]" id="cashadvance" class="form-control" value="0"> 
      </td>
      <td>
        <input type="date" name="datecashadvance[]" style="width: 170px" id="datecashadvance" class="form-control"> 
    </td>
        <td>
           <a href="javascript:;" class="btn btn-danger deleteRow">- </a>
        </td>
      </tr>  
    </tbody>    
  </table>
</div>

<p>Deductions: <input type="number" name="deduction" value="0" style="width: 150px" id="deduction" class="form-control col-sm-4" required> </p>  
<p>Deductions Remarks: <input type="text" name="deductionremarks" id="deductionremarks" class="form-control col-sm-4" required> </p>  
<input type="submit" class="btn btn-success" value="Submit Payroll">

<script>

    $('thead').on('click', '.addRow', function(){
        var tr = '<tr>'+ 
            
            '<td><input type="date" style="width: 170px" name="tripdate[]" id="tripdate" class="form-control" required></td>'+
            '<td><select name="trip[]" id="trip" class="form-control" required> @foreach ($cargos as $cargo) <option value="{{$cargo->origin}} to {{$cargo->destination}}">{{$cargo->origin}} to {{$cargo->destination}}</option>@endforeach</select></td>'+
            '<td><select name="cargo[]" id="cargo" style="width: 120px" class="form-control" required> @foreach ($cargonames as $cargo) <option value="{{$cargo->cargoname}}">{{$cargo->cargoname}}</option> @endforeach</select></td>'+
            '<td><input type="text" name="rate[]" id="rate" class="form-control" value="0" required></td>'+ 
            '<td><input type="number" name="cashadvance[]" id="rate" class="form-control" value="0" ></td>'+ 
            '<td><input style="width: 170px" type="date" name="datecashadvance[]" id="datecashadvance" class="form-control" ></td>'+ 
            '<td><a href="javascript:;" class="btn btn-danger deleteRow">- </a></td>'+
        '</tr>';

        $('tbody').append(tr);
    })
    
    $('tbody').on('click', '.deleteRow', function(){
      $(this).parent().remove();
    });
    
</script>

</body>
</html>

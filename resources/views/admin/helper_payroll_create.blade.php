<!DOCTYPE html>
<html lang="en">
<head>
  <title>Helper Payroll</title>
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
<form action="{{ route('helperpayrolls.store',['id'=>$helper->id])}}" method="POST"
      class="form-horizontal">
          {{ csrf_field() }}

          
  <h2>{{$helper->helpername}}</h2>
  <p>Job Desription: Helper</p>   <br>  
  <p>SSS: <strong>₱ {{$helper->sss}} </strong></p>   
  <p>Philhealth: <strong>₱ {{$helper->philhealth}} </strong></p>     
  <p>Date Issued: <input type="date" name="dateissued" id="dateissued" class="form-control col-sm-4" required> </p>         
  <p>Pay Period Start: <input type="date" name="payperiodstart" id="payperiodstart" class="form-control col-sm-4" required>
     Pay Period End: <input type="date" name="payperiodend" id="payperiodend" class="form-control col-sm-4" required> </p>               
  
   
     

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
            <input type="date" name="tripdate[]" id="tripdate" class="form-control" > 
        </td>

        <td><select name="trip[]" id="trip" class="form-control" required> 
          @foreach ($cargos as $cargo)
        <option value="{{$cargo->origin}} to {{$cargo->destination}}">{{$cargo->origin}} to {{$cargo->destination}}</option>
          @endforeach
            
            </select>
        </td>

        <td><select name="cargo[]" id="cargo" class="form-control" required> 
          @foreach ($cargos as $cargo)
        <option value="{{$cargo->cargoname}}">{{$cargo->cargoname}}</option>
          @endforeach
            </select>
        </td>

        <td>
            <input type="text" name="rate[]" id="rate" class="form-control" required> 
        </td>


        <td>
          <input type="number" name="cashadvance[]" id="cashadvance" class="form-control" required> 
      </td>


      <td>
        <input type="date" name="datecashadvance[]" id="datecashadvance" class="form-control" required> 
    </td>
       

        <td>
           <a href="javascript:;" class="btn btn-danger deleteRow">- </a>
        </td>

      </tr>  
    </tbody>
  </table>
</div>
<input type="submit" class="btn btn-success" value="Submit Payroll">

<script>

    $('thead').on('click', '.addRow', function(){
        var tr = '<tr>'+ 
            
            '<td><input type="date" name="tripdate[]" id="tripdate" class="form-control" required></td>'+
            '<td><select name="trip[]" id="trip" class="form-control" required> @foreach ($cargos as $cargo) <option value="{{$cargo->origin}} to {{$cargo->destination}}">{{$cargo->origin}} to {{$cargo->destination}}</option>@endforeach</select></td>'+
            '<td><select name="cargo[]" id="cargo" class="form-control" required> @foreach ($cargos as $cargo) <option value="{{$cargo->cargoname}}">{{$cargo->cargoname}}</option> @endforeach</select></td>'+
            '<td><input type="text" name="rate[]" id="rate" class="form-control" required></td>'+ 
            '<td><input type="number" name="cashadvance[]" id="rate" class="form-control" required></td>'+ 
            '<td><input type="date" name="datecashadvance[]" id="datecashadvance" class="form-control" required></td>'+ 
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

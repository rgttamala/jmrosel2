<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Reports</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<style type="text/css" media="print">
    @page {
     size: auto;
 }

 </style>

<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    tr:hover {background-color: lightblue;}
    </style>

<body>
    
   <br>
   <hr>
        <h1 class="display-10" style="margin-left: 1%">Transaction Reports</h1>

       

        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 25%; margin-left:1%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>

        <br>

        <div>
            <table id="example2" class="table table-bordered hoverTable">
                <thead>
                    <tr>
                  
                    <th>Client Rate:</th>
                    <th bgcolor="green" style="color: white">₱{{ number_format($clientRate, 2) }}</th>
                    <th></th>
                    <th>Client Balance:</th>
                    <th bgcolor="green" style="color: white">₱{{ number_format($clientBalance, 2) }}</th>
                    <th>Subcon Rate:</th>
                    <th bgcolor="skyblue">₱{{ number_format($subconRate, 2) }}</th>
                    <th>Subcon Balance: </th>
                    <th bgcolor="skyblue">₱{{ number_format($subconBalance, 2) }}</th>
                    <th></th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Travel Date</th>
                  <th scope="col">Plate Number</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Docs</th>
                  <th scope="col">Trucking</th>
                  <th scope="col">Client Rate</th>
                  <th scope="col">50%</th>
                  <th scope="col">Full Payment</th>
                  <th scope="col">Client Balance</th>
                  <th scope="col">Subcon Rate</th>
                  <th scope="col">50%</th>
                  <th scope="col">Full Payment</th>
                  <th scope="col">Subcon Balance</th>
                  <th scope="col">Remarks</th>
                  
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactions as $transaction)
                      
                
                <tr>
                <th scope="row">{{ date('M-d-yy', strtotime($transaction->traveldate)) }}</th>
                  <td>{{$transaction->platenumber}}</td>
                  <td>{{$transaction->origin}} - {{$transaction->destination}} | {{$transaction->cargoname}}</td>
                  <td>{{$transaction->docs}}</td>
                  <td>{{$transaction->trucking}}</td>
                  <td>₱{{ number_format ($transaction->client_rate, 2) }}</td>

                  @if ($transaction->client_partial == 'Paid')
                                <td style="color: green">[✔] ₱{{ number_format ($transaction->client_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->client_partial_date)) }} </td> 
                @endif

                @if ($transaction->client_partial == 'Unpaid')
                <td style="color: red">[✗]</td> 
                @endif

                @if ($transaction->client_full == 'Paid')
                 <td style="color: green">[✔] ₱{{ number_format ($transaction->client_full_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->client_full_date)) }}   </td> 
                    @endif

                @if ($transaction->client_full == 'Unpaid')
                <td style="color: red">[✗]</td> 
                @endif


                @if ($transaction->client_full == 'Paid')  
                <td style="color: green"> <strong>Paid </strong></td> 
                @endif

                @if ($transaction->client_full == 'Unpaid')
                    <td>₱{{ number_format ($transaction->client_balance, 2) }}</td>
                @endif
                

                <td>₱{{ number_format ($transaction->subcon_rate, 2) }}</td>

            @if ($transaction->subcon_partial == 'Paid')
                <td style="color: green">[✔] ₱{{ number_format ($transaction->subcon_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->subcon_partial_date)) }}</td> 
            @endif

            @if ($transaction->subcon_partial == 'Unpaid')
            <td style="color: red">✗</td> 
            @endif

            @if ($transaction->subcon_full == 'Paid')
            <td style="color: green">[✔] ₱{{ number_format ($transaction->subcon_partial_amount, 2) }} | {{ date('M-d-yy', strtotime($transaction->subcon_full_date)) }}</td> 
                @endif

            @if ($transaction->subcon_full == 'Unpaid')
            <td style="color: red">[✗]</td> 
            @endif


            @if ($transaction->subcon_full == 'Paid')  
            <td style="color: green"> <strong>Paid </strong></td> 
            @endif

            @if ($transaction->subcon_full == 'Unpaid')
                <td>₱{{ number_format ($transaction->subcon_balance, 2) }}</td>
            @endif

            <td>{{$transaction->remarks}}</td>  
                </tr>
                @endforeach
               
              </tbody>

            </table>
          </div>

      
       

    

</body>


<script type="text/javascript">
    $(function() {
    
        let baseUrl = "{{ url('/') }}";
    
        var start = moment().subtract(29, 'days');
        var end = moment();
    
        var params = (new URL(document.location)).searchParams;
        if (params.has('start') && params.has('end')) {
            var start = moment(params.get('start'));
            var end = moment(params.get('end'));
        }
    
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            startDate = start;
            endDate = end;
        }
    
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
    
        $("#reportrange").on('apply.daterangepicker', function (e, picker) {
            st = picker.startDate.format('YYYY-MM-DD');
            en = picker.endDate.format('YYYY-MM-DD');
           
            window.location = baseUrl + '/transactions/reports/?start=' + st + '&end=' + en;
        });
    
        // $("#brgy").on('change', function (e) {
        //     st = startDate.format('YYYY-MM-DD');
        //     en = endDate.format('YYYY-MM-DD');
            
        //     window.location = baseUrl + '/admin/reports/?start=' + st + '&end=' + en;
        // });
    
        cb(start, end);
    
    });
    </script>
</html>




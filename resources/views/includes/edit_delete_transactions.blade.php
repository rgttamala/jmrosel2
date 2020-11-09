<!-- Edit -->
<div class="modal fade" id="edit{{$transaction->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="transaction_id">Update Cargo Payment</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('transactions.update',$transaction->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                   
               
                    <h3>Client Payment</h3>
                    <br>
                    <div class="form-group">


                        <div class="form-group" hidden>
                            <label for="name" class="col-sm-3 control-label">Travel Date</label>
    
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="traveldate" name="traveldate" value="{{$transaction->traveldate}}" required>
                            </div>
                        </div>
    
                        <div class="form-group" hidden>
                            <label for="schedule" class="col-sm-3 control-label">Cargo Information</label>
    
                            <div class="col-sm-9">
                                <select class="form-control" id="cargo" name="cargo" required>
                                <option value="{{$transaction->cargo->id}}" selected>{{$transaction->cargo->origin}} → {{$transaction->cargo->destination}} || {{$transaction->cargo->cargoname}}</option>
                                    @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->origin}} → {{$cargo->destination}} 
                                        || {{$cargo->cargoname}} 
                                    </option>
                                    @endforeach
    
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group" hidden>
                            <label for="trucking" class="col-sm-3 control-label">Trucking</label>
    
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="trucking" name="trucking" value="{{$transaction->trucking}}" required>
                            </div>
                        </div>
    
                        <div class="form-group" hidden>
                            <label for="docs" class="col-sm-3 control-label">Docs</label>
    
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="docs" name="docs" value="{{$transaction->docs}}" required>
                            </div>
                        </div>
    
                        <div class="form-group" hidden>
                            <label for="name" class="col-sm-3 control-label">Plate Number</label>
    
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="platenumber" name="platenumber" value="{{$transaction->platenumber}}" required>
                            </div>
                        </div>
    
                        <div class="form-group" hidden>
                            <label for="rate" class="col-sm-3 control-label">Client Rate</label>
    
                            <div class="col-sm-9">
                            <input type="number" class="form-control" id="client_rate" step="any" name="client_rate" value="{{$transaction->client_rate}}" required>
                            </div>
                        </div>
    
    
                        <div class="form-group" hidden>
                            <label for="rate" class="col-sm-3 control-label">Subcon Rate</label>
    
                            <div class="col-sm-9">
                            <input type="number" class="form-control" id="subcon_rate" step="any" name="subcon_rate" value="{{$transaction->subcon_rate}}" required>
                            </div>
                        </div>
    
                        
                        
                        <div class="form-group" hidden>
                            <label for="remarks" class="col-sm-3 control-label">Remarks</label>
    
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="{{$transaction->remarks}}" required>
                            </div>
                        </div>
                    
                        
                        <label for="schedule" class="col-sm-3 control-label">Client CA</label>
                    
                        <div class="col-sm-9">

                            @if ($transaction->client_partial == 'Unpaid')

                            <select class="form-control" id="client_partial" name="client_partial" required>
                                <option value="Unpaid" selected>Unpaid 50%</option>
                                <option value="Paid">Paid 50%</option>
                            </select>

                            @endif

                            @if ($transaction->client_partial == 'Paid')
                                 <select class="form-control" id="client_partial" name="client_partial" required>
                                <option value="Unpaid">Unpaid 50%</option>
                                <option value="Paid" selected>Paid 50%</option>
                            </select>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Client CA Amount</label>
                    
                        <div class="col-sm-9">
                        <input type="number" class="form-control" step="any" id="client_partial_amount" name="client_partial_amount" value="{{$transaction->client_partial_amount}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Client CA Date</label>
                    
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="client_partial_date" name="client_partial_date" value="{{$transaction->client_partial_date}}">
                        </div>
                    </div>

                    <hr>
                    
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Client Full</label>
                    
                         <div class="col-sm-9">

                            @if ($transaction->client_full == 'Unpaid')

                            <select class="form-control" id="client_full" name="client_full" required>
                                <option value="Unpaid" selected>Unpaid</option>
                                <option value="Paid">Paid</option>
                            </select>

                            @endif
                            
                            @if ($transaction->client_full == 'Paid')
                                 <select class="form-control" id="client_full" name="client_full" required>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid" selected>Paid</option>
                            </select>

                            @endif

                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rate"  class="col-sm-3 control-label">Client Full Amount</label>
                    
                        <div class="col-sm-9">
                        <input type="number" step="any" class="form-control" id="client_full_amount" name="client_full_amount" value="{{$transaction->client_full_amount}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Client Full Payment Date</label>
                    
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="client_full_date" name="client_full_date" value="{{$transaction->client_full_date}}">
                        </div>
                    </div>



                    <br>
                    <hr>
                    <h3>Subcon Payment</h3>
                    <br>

                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Subcon 50%</label>
                    
                        <div class="col-sm-9">


                            @if ($transaction->subcon_partial == 'Unpaid')
                            <select class="form-control" id="subcon_partial" name="subcon_partial" required>
                                <option value="Unpaid" selected>Unpaid 50%</option>
                                <option value="Paid">Paid 50%</option>
                            </select>

                            @else
                            <select class="form-control" id="subcon_partial" name="subcon_partial" required>
                                <option value="Paid" selected>Paid 50%</option>
                                <option value="Unpaid">Unpaid 50%</option>
                            </select>
                                
                            @endif

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Subcon CA Amount</label>
                    
                        <div class="col-sm-9">
                        <input type="number" step="any" class="form-control" id="subcon_partial_amount" name="subcon_partial_amount" value="{{$transaction->subcon_partial_amount}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Subcon 50% Date</label>
                    
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="subcon_partial_date" name="subcon_partial_date" value="{{$transaction->subcon_partial_date}}">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Subcon Full</label>
                    
                         <div class="col-sm-9">

                            @if ($transaction->client_full == 'Unpaid')

                            <select class="form-control" id="subcon_full" name="subcon_full" required>
                                <option value="Unpaid" selected>Unpaid</option>
                                <option value="Paid">Paid</option>
                            </select>

                            @endif
                            
                            @if ($transaction->client_full == 'Paid')
                                 <select class="form-control" id="subcon_full" name="subcon_full" required>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid" selected>Paid</option>
                            </select>

                            @endif

                            
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Subcon Full Amount</label>
                    
                        <div class="col-sm-9">
                        <input type="number" step="any" class="form-control" id="subcon_full_amount" name="subcon_full_amount" value="{{$transaction->subcon_full_amount}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Subcon Full Date</label>
                    
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="subcon_full_date" name="subcon_full_date" value="{{$transaction->subcon_full_date}}">
                        </div>
                    </div>
                    
                    
                   


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <a href="#delete{{$transaction->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a> 
                 <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
 <div class="modal fade" id="delete{{$transaction->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="transaction_id">Delete Transaction</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('transactions.destroy',$transaction->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE TRANSACTION</p>
                        <h2 class="bold del_transaction_id"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div> 

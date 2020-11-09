<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Cargo Details</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('trans.store')  }}">
                    @csrf
                    
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Travel Date</label>
        
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="traveldate" name="traveldate" required>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="schedule" class="col-sm-3 control-label">Cargo Information</label>
        
                                <div class="col-sm-9">
                                    <select class="form-control" id="cargo" name="cargo" required>
                                        <option value="" selected>- Select -</option>
                                        @foreach($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->origin}} → {{$cargo->destination}} 
                                            || {{$cargo->cargoname}} 
                                        </option>
                                        @endforeach
        
                                    </select>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="trucking" class="col-sm-3 control-label">Trucking</label>
        
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="trucking" name="trucking" required>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="docs" class="col-sm-3 control-label">Docs</label>
        
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="docs" name="docs" required>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Plate Number</label>
        
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="platenumber" name="platenumber" required>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="rate" class="col-sm-3 control-label">Client Rate</label>
        
                                <div class="col-sm-9">
                                    <input type="number" step="any" class="form-control" id="client_rate" name="client_rate" required>
                                    

                                </div>
                            </div>

                          

                            
                            <div class="form-group" hidden>
                                <label for="schedule" class="col-sm-3 control-label">50%</label>
                            
                                <div class="col-sm-9">
                                    <select class="form-control" id="client_partial" name="client_partial" required>
                                        <option value="Unpaid" selected>Unpaid 50%</option>
                                        <option value="Paid">Paid 50%</option>
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="rate" class="col-sm-3 control-label">50% Date</label>
                            
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="client_partial_date" name="client_partial_date">
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="schedule" class="col-sm-3 control-label">Client Full</label>
                            
                                <div class="col-sm-9">
                                    <select class="form-control" id="client_full" name="client_full" required>
                                        <option value="Unpaid" selected>Unpaid 100%</option>
                                        <option value="Paid">Paid 100%</option>
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="rate" class="col-sm-3 control-label">Client Full Date</label>
                            
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="client_full_date" name="client_full_date">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="rate" class="col-sm-3 control-label">Subcon Rate</label>
        
                                <div class="col-sm-9">
                                    <input type="number" step="any" class="form-control" id="subcon_rate" name="subcon_rate" required>
                                </div>
                            </div>

                            
                            <div class="form-group" hidden>
                                <label for="schedule" class="col-sm-3 control-label">50%</label>
                            
                                <div class="col-sm-9">
                                    <select class="form-control" id="subcon_partial" name="subcon_partial" required>
                                        <option value="Unpaid" selected>Unpaid 50%</option>
                                        <option value="Paid">Paid 50%</option>
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="rate" class="col-sm-3 control-label">50% Date</label>
                            
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="subcon_partial_date" name="subcon_partial_date">
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="schedule" class="col-sm-3 control-label">Full Payment</label>
                            
                                <div class="col-sm-9">
                                    <select class="form-control" id="subcon_full" name="subcon_full" required>
                                        <option value="Unpaid" selected>Unpaid 100%</option>
                                        <option value="Paid">Paid 100%</option>
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group" hidden>
                                <label for="rate" class="col-sm-3 control-label">Full Payment Date</label>
                            
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="subcon_full_date" name="subcon_full_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remarks" class="col-sm-3 control-label">Remarks</label>
        
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="remarks" name="remarks" required>
                                </div>
                            </div>

                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>



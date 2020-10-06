<!-- Edit -->
<div class="modal fade" id="edit{{$payroll->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="cargo_id">Payroll</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('payroll.update',$payroll->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Origin</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="origin" name="origin" value="{{$cargo->origin}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Destination</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="destination" name="destination" value="{{$cargo->destination}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Route</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="route" name="route" value="{{$cargo->route}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Truck Type</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="trucktype" name="trucktype" value="{{$cargo->trucktype}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Cargo Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cargoname" name="cargoname" value="{{$cargo->cargoname}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Rate</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rate" name="rate" value="{{$cargo->rate}}" required>
                        </div>
                    </div>
                    
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


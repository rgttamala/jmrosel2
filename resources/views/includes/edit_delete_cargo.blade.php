 <!-- Edit -->
<div class="modal fade" id="edit{{$cargo->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="cargo_id">Edit Cargo Information</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('cargos.update',$cargo->id) }}">
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
                        <label for="schedule" class="col-sm-3 control-label">Driver</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="driver" name="driver" required>
                                <option value="" selected>- Select -</option>
                                @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->drivername}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Helper</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="helper" name="helper" required>
                                <option value="" selected>- Select -</option>
                                @foreach($helpers as $helper)
                                <option value="{{$helper->id}}">{{$helper->helpername}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Remarks</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="{{$cargo->remarks}}" required>
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

<!-- Delete -->

<div class="modal fade" id="delete{{$cargo->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="cargo_id">Delete Cargo</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('cargos.destroy',$cargo->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE CARGO</p>
                        <h2 class="bold del_cargo_origin"></h2>
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

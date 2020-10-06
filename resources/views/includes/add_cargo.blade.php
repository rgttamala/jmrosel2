<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Cargo Information</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('cargos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Origin</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="origin" name="origin" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Destination</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="destination" name="destination" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Route</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="route" name="route" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Truck Type</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="trucktype" name="trucktype" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Cargo Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cargoname" name="cargoname" required>
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
                    
                      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

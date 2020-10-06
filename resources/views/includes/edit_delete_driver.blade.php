<!-- Edit -->
<div class="modal fade" id="edit{{$driver->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="driver_id">Edit Driver</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('drivers.update',$driver->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="drivername" name="drivername" value="{{$driver->drivername}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">SSS</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sss" name="sss" value="{{$driver->sss}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Philhealth</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="philhealth" name="philhealth" value="{{$driver->philhealth}}" required>
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

<div class="modal fade" id="delete{{$driver->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="driver_id">Delete Driver</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('drivers.destroy',$driver->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE DRIVER</p>
                        <h2 class="bold del_driver_drivername"></h2>
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

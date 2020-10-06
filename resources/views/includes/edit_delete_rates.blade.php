<!-- Edit -->
<div class="modal fade" id="edit{{$rate->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="rates_id">Edit Employee Rates</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rates.update',$rate->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Job Description</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jobdescription" name="jobdescription" value="{{$rate->jobdescription}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">SSS</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sss" name="sss" value="{{$rate->sss}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Philhealth</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="philhealth" name="philhealth" value="{{$rate->philhealth}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Frequency</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="frequency" name="frequency" required>
                                <option value="" selected>- Select -</option>
                                <option value="Monthly">Monthly</option>
                                <option value="15 Days">15 Days</option>
                                <option value="Weekly">Weekly</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Salary</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="salary" name="salary" value="{{$rate->salary}}" required>
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

<div class="modal fade" id="delete{{$rate->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="rate_id">Delete Cargo Information</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rates.destroy',$rate->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE CARGO INFORMATION</p>
                        <h2 class="bold del_rates_jobdescription"></h2>
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

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Employee Rates</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rates.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Job Description</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jobdescription" name="jobdescription" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">SSS</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="sss" name="sss" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Philhealth</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="philhealth" name="philhealth" required>
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
                            <input type="number" class="form-control" id="salary" name="salary" required>
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

<div class="modal-content">
    <div class="modal-header clone-modal-header bg-secondary">
        <h4 class="modal-title text-light" id="exampleModalLabel"><i class="fa fa-eye"></i> View Contact</h4>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.NAME') :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="issue_title" placeholder="Enter issue title" value="{{$target->first_name}} {{$target->last_name}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.EMAIL') :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="issue_title" placeholder="Enter issue title" value="{{$target->email}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.PHONE') :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="issue_title" placeholder="Enter issue title" value="{{$target->phone}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.SUBJECT') :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="issue_title" placeholder="Enter issue title" value="{{$target->subject}}" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.MESSAGE') :</label>
                <div class="col-sm-8">
                    <textarea class="form-control" >
                            {{$target->message}}
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="issue_title" class="col-sm-4 col-form-label">@lang('lang.CREATED_AT') :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="issue_title" placeholder="Enter issue title" value="{{date('d M Y \a\t h:i a',strtotime($target->created_at))}}" readonly/>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <fieldset class="w-100">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </fieldset>
    </div>
</div>




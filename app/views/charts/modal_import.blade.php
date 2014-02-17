<div id='modal_import' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4>Import data from CSV file</h4>
	</div>
	
    {{--modal body--}}
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    @if(isset($_GET['user']))
                    <?php 
					$action='charts/uploadcsv?user='.$user;
					$action=URL::to($action);
					?>
						
					<form enctype='multipart/form-data' action="{{$action}}" method='post' id='import_form'>
						Select data set where data will be imported 
						<select name="dataset_to_receive_csv" id="dataset_to_receive_csv">
							<option value=""></option>
							@foreach(Dataset::logged($user)->get() as $dlog)
								<option value="{{$dlog->id}}">{{$dlog->name}}</option>
							@endforeach
						</select>
						<div class="hide" id="upload_group">
						Upload csv file 
							<input class="uploadfile" type='file' name='filename'>
							<input type="hidden" value='{{$_GET["ds"]}}' name='ds'>
							<input type="hidden" value='{{$_GET["user"]}}' name='user'>
							<br>
							<button class='btn' id='upload_button' name='submit' value='Upload'>Import data</button>
							<div id="uploading_csv_div" class="hide">
								<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
								Wait while file is being processed
							</div>
						</div>
					</form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

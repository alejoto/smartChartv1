<div id='modal_import' class="modal hider fader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4>Import data from CSV file</h4>
	</div>
	
    {{--modal body--}}
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12 " id='import_from_generaltemplate'>
                    @if(isset($_GET['user']))
                    <?php 
                    $upload='charts/uploadcsv';
                    $usup='?user='.$user;
					$action=$upload.$usup;
					$action=URL::to($action);
					$usage=$upload.'usage'.$usup;
					$usage=URL::to($usage);
					$demand=$upload.'demand'.$usup;
					$demand=URL::to($demand);
					?>
					<select name="dataset_csv_target" id="dataset_csv_target">
						<option value="0"></option>
						@foreach(Dataset::logged($user)->get() as $dlog)
							<option value="{{$dlog->id}}">{{$dlog->name}}</option>
						@endforeach
					</select>
					<div id="csvfileoptions" class="hider">
						<ul class="unstyled " id="">
							<li>
								<a href="" id='upload_as_general_template_button'>CSV from main template</a>
							</li>
							<li><a href="" id='upload_as_kwusage_button'>KW usage CSV file</a></li>
							<li><a href="" id='upload_as_kwdemand_button'>KW demand CSV file</a></li>
						</ul>
					</div>
						
						
					<form enctype='multipart/form-data' action="{{$action}}" method='post' id='import_form_as_generaltemplate' class='hide'>
						
						<div class="" id="upload_group">
						<h4>Importing data from general template csv file</h4>
							<input class="uploadfile" type='file' name='filename'>
							<input type="hidden" value='{{$_GET["ds"]}}' name='ds' id="dataset_to_receive_csv">
							<input type="hidden" value='{{$_GET["user"]}}' name='user'>
							<br>
							<button class='btn' id='upload_button' name='submit' value='Upload'>Import data</button>
							<div id="uploading_csv_div" class="hide">
								<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
								Wait while file is being processed
							</div>
						</div>
					</form>
					<form enctype='multipart/form-data' action="{{$usage}}" method='post' id='import_form_as_kwusage' class='hide'>
						
						
						<div >
						<h4>Importing kw usage csv file</h4>
							<input class="uploadfile" type='file' name='filename'>
							<input type="hidden" value='{{$_GET["ds"]}}' name='ds'  id="dataset_to_receive_csvusage">
							<input type="hidden" value='{{$_GET["user"]}}' name='user'>
							<br>
							<button class='btn' id='upload_button' name='submit' value='Upload'>Import data</button>
							<div id="uploading_csv_div_usage" class="hide">
								<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
								Wait while file is being processed
							</div>
						</div>
					</form>
					<form enctype='multipart/form-data' action="{{$demand}}" method='post' id='import_form_as_kwdemand' class='hide'>
						
						<div>
						<h4>Importing kw demand csv file</h4>
							<input class="uploadfile" type='file' name='filename'>
							<input type="hidden" value='{{$_GET["ds"]}}' name='ds' id="dataset_to_receive_csvdemand">
							<input type="hidden" value='{{$_GET["user"]}}' name='user'>
							<br>
							<button class='btn' id='upload_button_demand' name='submit' value='Upload'>Import data</button>
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

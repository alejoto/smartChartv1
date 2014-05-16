<div id='modal_import2' class="modal hide fade maureenmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header ">
		
		@if(isset($_GET['ds']))
            @if(Dataset::active($_GET['ds'])->count()>0)
                <div class="row-fluid ">
                    <div class="span12">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>
                            Import data to dataset
                            <b id='building_dataset_modal'> {{Dataset::find($_GET['ds'])->name}} </b>
                            <a href="" id='change_building_from_modal'>(change)</a>
                            <spam id="available_buildings_from_modal" class="hide">
                                CHOOSE DATASET 
                                @if(isset($_GET['user']))
                                <select name="dataset_csv_target" id="dataset_csv_target" class='span4'>
                                    <option value="0"></option>
                                    @foreach(Dataset::logged($user)->get() as $dlog)
                                        <option value="{{$dlog->id}}">{{$dlog->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </spam>
                        </h4>
                    </div>
                </div>
            @endif
        		
    	@else 
    		<div class="row-fluid ">
        		<div class="span12">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4>
        				Import data to dataset
        				<b id='building_dataset_modal'></b>
        			</h4>
        		</div>
        	</div>
    	@endif
	</div>
	
    {{--modal body--}}
    <div class="modal-body ">
        <div class="container-fluid ">
        	
        	<form enctype='multipart/form-data' action="{{URL::to('charts/wz')}}" method='post'>
        		<div class="row-fluid ">
        			<div class="span12 whitebox whitetext">
        				Instructions:
        				<ul class="">
        					<li>File format must be .csv (comma separated values).</li>
        					<li>The first row must contain the headers with names for each column data.</li>
                            			<li>All data must contain date and time of reading, otherwise it will not be saved</li>
        					<li>This import module supports a maximum of 500 rows at once.</li>
        				</ul>
        				<input class="uploadfile  muted" type='file' name='filename'>
        				<input type="hidden" value='{{$_GET["user"]}}' name='user'>
		        		<?php $ds=''; if (isset($_GET['ds'])) { $ds=$_GET['ds']; } ?>
		        		<input type="hidden" id="dataset_from_modal" value='{{$ds}}' name='dataset'>
		        		<br>
		        		<br>
		        		<input class='btn btn-inverse' type="submit" name='submit' value='Start importing file'>
        			</div>
        		</div>
        		
		        		
        	</form>
        </div>
    </div>
    <div class="modal-footer maureenmodal">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

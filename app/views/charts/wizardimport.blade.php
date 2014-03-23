@extends('layouts.base')

@section('content')
<h1>CSV Import module</h1>
Parameters
<ul class="unstyled">
	<li>User: {{$user}}</li>
	<li>Dataset: {{$ds}}</li>

	
	<li>File: {{is_uploaded_file($_FILES['filename']['tmp_name'])}}</li>
	<?php  $handle = fopen($_FILES['filename']['tmp_name'], "r"); ?>
	<li>Opened file: {{$handle}}</li>
	<?php $data=fgetcsv($handle, 1000, ","); ?>
	<li>Data as csv:   </li>
</ul>
<?php 
while (($data=fgetcsv($handle, 2000, ","))!==false) {
	?>
	<div class="row">
		<div class="span12">
			{{$data[0]}} {{$data[1]}} {{$data[2]}} {{$data[3]}}
		</div>
	</div>
	<?php
}

?>

 
 <br>
Choose / change building 

<spam class="dropdown">
	<button class="btn dropdown-toggle" data-toggle="dropdown">Select building <b class="caret"></b></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		@foreach(Dataset::logged($user)->get() as $dl)
			<?php $lk='ds='.$dl->id; 
			$lk=URL::to('/charts/wz?user='.$user.'&'.$lk);?>
			<li><a href="{{$lk}}">{{$dl->name}}</a>
			</li>
		@endforeach
	</ul>
</spam>

<br>

Import file will be set according to the first row data.
<br>
Please choose proper options as data analysis depends on it
<br>
Remember to automate kw usage import option.  Fix bug: breaking line inside cell.
<br>
After importing kw usage ask whether it is usage or demand data.
<ul>
	<li>Import first row</li>
	<li>Display imported data</li>
	<li>Ask if it corresponds to header or values</li>
	<li>Field to be saved at: select list</li>
	<li>Select list gets shorter as fields are being choosen</li>
</ul>
@stop

{{--div tag containing all data to be charted--}}
<div id="availabledatafields" class='hide'>
	
<?php  
if (isset($_GET['user'])) {
	$user=$_GET['user'];
	
	$verifier='';

	//Retrieving all data from DB table
	$data=$data->where('user_id','=',$user);

	

	//Constructing JSON object
	echo '[';  
	$preffix=''; //comma container, empty for first row of data
	foreach ($data->get() as $v) {
		if ($verifier	!=	$v->DATE_READING.' '.$v->TIME_READING) {

			//Fixing date to default amCharts format YYYY/MM/DD
			$date=str_replace('-','/',$v->DATE_READING);

			//Setting "time" as horizontal axis value
			echo $preffix.'{"time":"'.$date.' '.$v->TIME_READING;

			//Adding rest of values to the JSON object
			foreach ($fields as $f) {
				echo '","'.
				$f[0].'":"'.round(($v->$f[0])*$f[1]*100)/100;
				$preffix2=','; 
			}
			echo '"}';
			$preffix=','; 
			$verifier=$v->DATE_READING.' '.$v->TIME_READING;
		}
	}
	echo ']';
	//End of JSON array construction
}
?>
</div>
{{--End of JSON object construction--}}
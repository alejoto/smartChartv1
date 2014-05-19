
<?php 
$ds=$_GET['ds'];
$comma='';
$verifier='';
?>
<div id="data_as_json" class='hide'>[
	@foreach(Buildingregister::activeds($ds)->take(200)->get() as $br)
		@if($verifier	!=	$br->datereading.' '.$br->timereading)
			<?php //Fixing date to default amCharts format YYYY/MM/DD
			$date=str_replace('-','/',$br->datereading);
			?>
			{{$comma}}{"time":"{{$date.' '.$br->timereading}}"
			@foreach(Bfield::display()->get() as $d)
				
					<?php 
					$bcolumn=$d->name;
					$bvalue=$br->$bcolumn;
					if ($bcolumn=='a01OM'||$bcolumn=='b11SFS') {
						$bvalue=$bvalue*100;
					}
					?>
					,"{{$bcolumn}}":"{{$bvalue}}"
				
			@endforeach
		@endif
		}
		<?php $comma=','; ?>
	@endforeach
]</div>

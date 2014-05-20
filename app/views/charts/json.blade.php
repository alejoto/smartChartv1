
<?php 
$ds=$_GET['ds'];
$comma='';
$verifier='';
$skipper=50;
$i=0;
?>
<div id="data_as_json" class='hide'>[
	@foreach(Buildingregister::activeds($ds)->get() as $br)
		@if($i==$skipper)
			@if($verifier	!=	$br->datereading.' '.$br->timereading)
				<?php //Fixing date to default amCharts format YYYY/MM/DD
				$date=str_replace('-','/',$br->datereading);
				$bvalue=0;
				?>
				{{$comma}}{"time":"{{$date.' '.$br->timereading}}"
				@foreach(Bfield::display()->get() as $d)
					@if($d->name!='datereading'&&$d->name!='timereading')
						<?php 
						$bcolumn=$d->name;
						$bvalue=$bvalue+$br->$bcolumn;
						if ($bcolumn=='a01OM'||$bcolumn=='b11SFS') {
							$bvalue=$bvalue*100;
						}
						?>
						,"{{$bcolumn}}":"{{$bvalue/$skipper}}"
					@endif
				@endforeach
			}
			@endif
			<br>
			<?php 
			if ($i==$skipper) {
				$comma=',';
			}
			$i=0; ?>
		@endif
	<?php $i++; ?>
	@endforeach
]</div>

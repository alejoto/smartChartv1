
<?php 
$ds=$_GET['ds'];
$actives=Buildingregister::activeds($ds);
$comma='';
$verifier='';
if ($actives->count()>100) {
	$skipper=round($actives->count()/100);
}
else {$skipper=1;}

$i=0;
$rowmaker=array();
foreach (Bfield::display()->get() as $d) {// Setting the rowmaker array, starting from zero values
	$rowmaker[$d->name]=0;
}
?>
<div id="data_as_json" class='hide'>[
	@foreach($actives->get() as $br)
		@if($verifier	!=	$br->datereading.' '.$br->timereading)
			@foreach(Bfield::display()->get() as $d)
				<?php 
				$column=$d->name;
				$rowmaker[$column]=$rowmaker[$column]+$br->$column; ?>
			@endforeach
		@endif

		@if($i==$skipper)
			@if($verifier	!=	$br->datereading.' '.$br->timereading)
				<?php //Fixing date to default amCharts format YYYY/MM/DD
				$date=str_replace('-','/',$br->datereading);
				//$bvalue=0;
				?>
				{{$comma}}{"time":"{{$date.' '.$br->timereading}}"
				@foreach(Bfield::display()->get() as $d)
					@if($d->name!='datereading'&&$d->name!='timereading')
						<?php 
						$bcolumn=$d->name;
						$bvalue=$rowmaker[$bcolumn]/$skipper;//$br->$bcolumn;
						$bvalue=round($bvalue*100)/100;
						if ($bcolumn=='a01OM'||$bcolumn=='b11SFS') {
							$bvalue=$bvalue*100;
						}
						?>
						,"{{$bcolumn}}":"{{$bvalue}}"
						<?php  $rowmaker[$bcolumn]=0; /*/$skipper*/?>
					@endif
					
				@endforeach
			}
			@endif
			<br>
			<?php 
				$comma=',';
				$i=0;
			?>
		@endif
	<?php $i++; ?>
	@endforeach
]</div>

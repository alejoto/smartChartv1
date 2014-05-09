{{-- Buttons for navigating between pages --}}
<?php  
$first_row='/charts/table?user='.$user.'&ds='.$_GET['ds'].'&page=0';
$first_row=URL::to($first_row);
//$first
?>
<a  class='btn' href="{{$first_row}}">
	<i class="icon-backward"></i>
	first</a>
<spam class="btn-group">
	@if(isset($_GET['page']))
		@if($_GET['page']!=0)
			<a class='btn' href="{{$previous}}"> <i class="icon-chevron-left"></i> Previous </a> 
		@endif
	
	@endif
	<?php  
	$last_rowcount=Buildingregister::activeds($_GET['ds'])->count();
	$last_row_pre=floor($last_rowcount/10);
	if($last_rowcount%10==0) {$last_row_pre=$last_row_pre-1;}
	$last_row=$last_row_pre*10;
	$last_row='/charts/table?user='.$user.'&ds='.$_GET['ds'].'&page='.$last_row;
	$last_row=URL::to($last_row);
	?>
	@if($page!=$last_row_pre*10)
	<a class='btn' href="{{$next}}">Next <i class="icon-chevron-right"></i></a>
	@endif
	
</spam> 
	
<a class='btn' href="{{$last_row}}">
	<i class="icon-forward"></i>
	last
</a>
Displaying from row {{$page+1}} to {{$page+10}} (total rows {{Buildingregister::activeds($_GET['ds'])->count()}})
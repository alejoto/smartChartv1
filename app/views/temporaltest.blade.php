Hi, temporal test
<br>
<?php  


$dmy='13/02/14';
$format='d,m,y';
$format=explode(',', $format);

$mdy='02/13/14';
$format2='m,d,y';
$format2=explode(',', $format2);

$failure1='14-13-2';
$format3='y,d,m';
$format3=explode(',', $format3);
$dateclean=explode('-',$failure1);

$i=0;
$preformatdate='';
foreach ($format3 as $f) {
	$preformatdate[$f]=$dateclean[$i];
	echo $f.'-'.$preformatdate[$f].'<br>';
	$i++;
}
if (strlen($preformatdate['y'])==2){$preformatdate['y']='20'.$preformatdate['y'];}
$conversion1=strtotime($preformatdate['y'].'-'.$preformatdate['m'].'-'.$preformatdate['d']);
$conversion2=date('Y-m-d',$conversion1);
$test1=new dateformatfix;
$result1=$test1->fixdate($dmy,$format);
$result2=$test1->fixdate($mdy,$format2);
$result3=$test1->fixdate($failure1,$format3);

?>
{{var_dump($dateclean)}}
<br>
{{$conversion1}} -->{{$conversion2}}
<br>
{{$preformatdate['y']}}-{{$preformatdate['m']}}-{{$preformatdate['d']}}
<br>
{{var_dump($preformatdate)}}
<br>
Failure format= y,d,m / failure data {{$failure1}} / Expected output = 2014-02-13
<br>Obtained  result: {{$result3}}




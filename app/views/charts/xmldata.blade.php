<?php 
$temp=array();
$temp=array(
    array('time'=>'7:00','temp'=>104)
    ,array('time'=>'7:30','temp'=>102)
    ,array('time'=>'8:00','temp'=>102)
    ,array('time'=>'8:30','temp'=>110)
    ,array('time'=>'9:00','temp'=>102)
    );
?>
<xml version="1.0">

json notation
<br>
<?php 
$pref='';
/*foreach ($temp as $v) {
    # code...
}*/
 ?>
 <data id="temperatures">
    [
    @foreach($temp as $k=>$v)
        {{$pref."{\n".'"time":"'.$v['time'].'","temp":'.$v['temp']."\n"."}"}}
        <?php $pref=",\n" ?>
    @endforeach
    ]
 </data>
 
    
 
 <div id="" class='hide' style=''>
	[{
    "time": "7:00",
    "temp": 104,
    "temp2": 111,
    "limit": 108
}, {
    "time": "8:00",
    "temp": 110,
    "temp2": 116,
    "limit": 108
}, {
    "time": "9:00",
    "temp": 108,
    "temp2": 112,
    "limit": 108
}, {
    "time": "10:00",
    "temp": 113,
    "temp2": 109,
    "limit": 108
}, {
    "time": "11:00",
    "temp": 118,
    "temp2": 104,
    "limit": 108
}, {
    "time": "12:00",
    "temp": 120,
    "temp2": 100,
    "limit": 108
}, {
    "time": "13:00",
    "temp": 123,
    "temp2": 111,
    "limit": 108
}, {
    "time": "14:00",
    "temp": 117,
    "temp2": 113,
    "limit": 108
}, {
    "time": "15:00",
    "temp": 116,
    "temp2": 102,
    "limit": 108
}, {
    "time": "16:00",
    "temp": 105,
    "temp2": 105,
    "limit": 108
}, {
    "time": "17:00",
    "temp": 104,
    "temp2": 114,
    "limit": 108
}, {
    "time": "18:00",
    "temp": 104,
    "temp2": 120,
    "limit": 108
}, {
    "time": "19:00",
    "temp": 103,
    "temp2": 125,
    "limit": 108
}, {
    "time": "20:00",
    "temp": 103,
    "temp2": 123,
    "limit": 108
}, {
    "time": "21:00",
    "temp": 103,
    "temp2": 118,
    "limit": 108
}, {
    "time": "22:00",
    "temp": 103,
    "temp2": 117,
    "limit": 108
}, {
    "time": "23:00",
    "temp": 103,
    "temp2": 115,
    "limit": 108
}]
</div>

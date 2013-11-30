
AmCharts.ready(function () {

var confdataset=$('#param1').html().trim();
confdataset=confdataset.split('|');
var i;
thedataset=[];
var param1=[];
for (var i = 0; i < confdataset.length; i++) {
    thedataset[i]=confdataset[i].replace(' ','').split(',');
    param1[i]=thedataset[i];
}


	createnewchart3(
        'availabledatafields'   //div id with all data to be charted
        ,'time'                 //name of category (horizontal) axis
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"} //name of left and right axis
        ,
        param1           //multidimensional array with some specifications of chart lines and columns
        ,'mychartContainer'     //div id that will display chart
        );
});


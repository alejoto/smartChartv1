function createnewchart2(jsondata,y_axis,x_axis,thecharts,target){
    var chartData=new Object();
    chartData=$('#'+jsondata).text();
    chartData=eval(chartData);

    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = y_axis//;
    //chart.sequencedAnimation=true;
    chart.startEffect='bounce';
    chart.startDuration = 1;
    chart.color = "#000000";
    //chart.addListener('dataUpdated',zoomChart);

    //AXES
    var i=0;
    for (var key in x_axis)
    {
        //
        if (i==0) {
            var left = new AmCharts.ValueAxis();
            left.position = "left";
            left.title = x_axis.leftaxis;
            left.gridAlpha = 0;
            left.axisAlpha = 0;
            chart.addValueAxis(left);
        }
        else {
            var right = new AmCharts.ValueAxis();
            right.position = "right";
            right.title = x_axis.rightaxis;
            left.gridAlpha = 0;
            left.axisAlpha = 0;
            chart.addValueAxis(right);
        }
        i++;
    }
    
    for (var i = 0; i < thecharts.length; i++) {
        //thecharts[i]
        var graph = new AmCharts.AmGraph();
        graph.valueField = thecharts[i][0];
        if (thecharts[i][1]=='left') {
            graph.valueAxis = left;
        }
        else{
            graph.valueAxis = right;
        }
        graph.title = thecharts[i][2];//"Temperature (Fh)";
        graph.type = thecharts[i][3];//"smoothedLine";
        if (thecharts[i][3]=='column') {
            graph.lineAlpha = 1;
            graph.fillAlphas = 1;
            graph.dashLengthField = "dashLengthColumn";
            graph.alphaField = "alpha";
        }
        graph.lineThickness = 2;
        graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
        chart.addGraph(graph);
    };

    var categoryAxis = chart.categoryAxis;
    categoryAxis.autoGridCount  = false;
    categoryAxis.axisColor = "#fff";
    categoryAxis.gridCount = chartData.length;
    categoryAxis.gridPosition = "start";
    categoryAxis.equalSpacing=true;
    categoryAxis.parseDates = true; // in order char to understand dates, we should set parseDates to true
    categoryAxis.minPeriod = "mm"; // as we have data with minute interval, we have to set "mm" here.

    categoryAxis.labelRotation = 90;

    graph.lineColor = "#666666";
    

    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorPosition = "mouse";
    chart.addChartCursor(chartCursor);

    // SCROLLBAR
    var chartScrollbar = new AmCharts.ChartScrollbar();
    //chartScrollbar.graph = graph;
    chartScrollbar.autoGridCount=false;
    chartScrollbar.categoryAxis='';
    chartScrollbar.scrollbarHeight = 40;
    chartScrollbar.color = "#111";
    chartScrollbar.backgroundAlpha=1;
    chartScrollbar.backgroundColor= "#fff";
    chartScrollbar.graphFillAlpha=1;
    chartScrollbar.graphFillColor= "#444444";
    chartScrollbar.selectedBackgroundAlpha=1;
    chartScrollbar.selectedBackgroundColor= "#aaa";
    chartScrollbar.selectedGraphFillAlpha=1;
    chartScrollbar.selectedGraphFillColor= "#111";
    chartScrollbar.autoGridCount = true;
    chart.addChartScrollbar(chartScrollbar);

    // LEGEND
    var legend = new AmCharts.AmLegend();
    legend.marginLeft = 110;
    legend.useGraphSettings = true;
    chart.addLegend(legend);

    chart.write(target);
}


AmCharts.ready(function () {
if ($('#dparameters').html().trim()==1) { var dataparameter=[['ZT','left','Zone Temperature','smoothedLine'],['ZRVS','right','Zone Reheat Valve Signal (%)','column'],['ZOM','right','Zone Occupancy Mode (Occupied/Unoccupied)','column']]; }
if ($('#dparameters').html().trim()==2) { var dataparameter=[['ZT','left','Zone Temperature','smoothedLine'],['ZRVS','right','Zone Reheat Valve Signal (%)','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==3) { var dataparameter=[['MAT','left','Mixed-Air Temp','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OAF','right','Outdoor-Air Fraction temp','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['RAT','left','Return-Air Temp','smoothedLine']]; }
if ($('#dparameters').html().trim()==4) { var dataparameter=[['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OAF','right','Outdoor-Air Fraction temp','column']]; }
if ($('#dparameters').html().trim()==5) { var dataparameter=[['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['RAT','left','Return-Air Temp','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==6) { var dataparameter=[['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==7) { var dataparameter=[['CCV','right','Cooling-Coil Valve Signal (%)','column'],['DATSP','left','Discharge-Air Temp Set Point','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==8) { var dataparameter=[['CCV','right','Cooling-Coil Valve Signal (%)','column'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==9) { var dataparameter=[['CCV','right','Cooling-Coil Valve Signal (%)','column'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==10) { var dataparameter=[['DAT','left','Discharge-Air Temp','smoothedLine'],['MAT','left','Mixed-Air Temp','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['RAT','left','Return-Air Temp','smoothedLine']]; }
if ($('#dparameters').html().trim()==11) { var dataparameter=[['CCV','right','Cooling-Coil Valve Signal (%)','column'],['HCVS','right','Heating-Coil Valve Signal (%)','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==12) { var dataparameter=[['ChWST','left','Chilled-Water Supply Temp','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==13) { var dataparameter=[['ChWST','left','Chilled-Water Supply Temp','smoothedLine'],['CCV','right','Cooling-Coil Valve Signal (%)','column'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==14) { var dataparameter=[['ChWRT','left','Chilled-Water Return Temp','smoothedLine'],['ChWST','left','Chilled-Water Supply Temp','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==15) {  var dataparameter=[ ['ChWRT','left','Chilled-Water Return Temp','smoothedLine'],['CCV','right','Cooling-Coil Valve Signal (%)','column'] ]; }
if ($('#dparameters').html().trim()==16) { var dataparameter=[['HWST','left','Hot-Water Supply Temp','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==17) { var dataparameter=[['HWRT','left','Hot-Water Return Temp','smoothedLine'],['HWST','left','Hot-Water Supply Temp','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==18) { var dataparameter=[['HWLDP','left','Hot-Water Loop Differential Pressure','smoothedLine'],['HCVS','right','Heating-Coil Valve Signal (%)','column']]; }

if ($('#dparameters').html().trim()==19) { var dataparameter=[['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OAF','left','Outdoor-Air Fraction temp','smoothedLine'],['OM','right','Occupancy Mode','column']]; }

if ($('#dparameters').html().trim()==20) { var dataparameter=[['OAT','left','Outdoor-Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor-Air Damper Position Signal (%)','column'],['OM','right','Occupancy Mode','column']]; }
if ($('#dparameters').html().trim()==21) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine'],['DSPSP','left','Duct Static Pressure Set Point','smoothedLine']]; }
if ($('#dparameters').html().trim()==22) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine']]; }
if ($('#dparameters').html().trim()==23) { var dataparameter=[['VAVDPSP','right','VAV Damper Position Set Point (%)','column']]; }
if ($('#dparameters').html().trim()==24) { var dataparameter=[['DAT','left','Discharge-Air Temp','smoothedLine'],['DATSP','left','Discharge-Air Temp Set Point','smoothedLine']]; }
if ($('#dparameters').html().trim()==25) { var dataparameter=[['DAT','left','Discharge-Air Temp','smoothedLine'],['DATSP','left','Discharge-Air Temp Set Point','smoothedLine'],['OAT','left','Outdoor-Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==26) { var dataparameter=[['ZRVS','right','Zone Reheat Valve Signal (%)','column']]; }
if ($('#dparameters').html().trim()==27) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine']]; }
if ($('#dparameters').html().trim()==28) { var dataparameter=[['SFS','right','Supply Fan Status (on/off)','column']]; }


        
       
       

	createnewchart2(
        'availabledatafields'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,
        dataparameter
        ,'mychartContainer'
        );
});
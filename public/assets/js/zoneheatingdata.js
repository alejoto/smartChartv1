$(function(){
	//$('#zone_heating_data').html('nice job');
	//var chartData=$('#temperatures').html();
});

AmCharts.ready(function () {
	var chartData=new Object();
	chartData=$('#zone_heating_data').text();
	chartData=eval(chartData);



    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = "time";
    //chart.sequencedAnimation=true;
    chart.startEffect='bounce';
    chart.startDuration = 1;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

    //AXES

    var tempAxis = new AmCharts.ValueAxis();
    tempAxis.position = "left";
    tempAxis.title = "Temperature (F)";
    tempAxis.gridAlpha = 0;
    tempAxis.axisAlpha = 0;
    chart.addValueAxis(tempAxis);

    // second value axis (on the right) 
    var PercentAxis = new AmCharts.ValueAxis();
    PercentAxis.position = "right"; // this line makes the axis to appear on the right
    //PercentAxis.axisColor = "#FCD202";
    PercentAxis.title = "Percent (%)";
    PercentAxis.gridAlpha = 0;
    PercentAxis.axisThickness = 2;
    chart.addValueAxis(PercentAxis);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = tempAxis;
    graph.valueField = "Zonetemperature";
    graph.title = "Temperature";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);

    //Reheat valve signal
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = PercentAxis;
    graph.valueField = "ReheatValveSignal";
    graph.title = "ZRVS";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);


    // column graph
    var graphZOM = new AmCharts.AmGraph();
    graphZOM.type = "column";
    graphZOM.valueAxis = PercentAxis;
    graphZOM.title = "Occupancy";
    graphZOM.lineColor = "#333333";
    graphZOM.valueField = "Occupancy";
    graphZOM.lineAlpha = 1;
    graphZOM.fillAlphas = 1;
    graphZOM.dashLengthField = "dashLengthColumn";
    graphZOM.alphaField = "alpha";
    //graphZOM.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
    chart.addGraph(graphZOM);


    var categoryAxis = chart.categoryAxis;
    categoryAxis.autoGridCount  = false;
    categoryAxis.axisColor = "#fff";
    categoryAxis.gridCount = chartData.length/2;
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
    //chartScrollbar.color = "#fff";
    chartScrollbar.backgroundAlpha=1;
    chartScrollbar.backgroundColor= "#1A1A1A";
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

    chart.write('chartContainer');
});
/*
|
|
|
|
|
|
|
| SECOND CHART 
*/
AmCharts.ready(function () {
    var chartData2=new Object();
    chartData2=$('#zone_heating_data2').text();
    chartData2=eval(chartData2);

    var chart2 = new AmCharts.AmSerialChart();
    chart2.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart2.dataProvider = chartData2;
    chart2.categoryField = "time";
    //chart2.sequencedAnimation=true;
    chart2.startEffect='bounce';
    chart2.startDuration = 1;
    chart2.color = "#FFFFFF";
    //chart2.addListener('dataUpdated',zoomChart);

    //AXES

    var tempAxis2 = new AmCharts.ValueAxis();
    tempAxis2.position = "left";
    tempAxis2.title = "Temperature (F)";
    tempAxis2.gridAlpha = 0;
    tempAxis2.axisAlpha = 0;
    chart2.addValueAxis(tempAxis2);

    // second value axis (on the right) 
    var PercentAxis2 = new AmCharts.ValueAxis();
    PercentAxis2.position = "right"; // this line makes the axis to appear on the right
    //PercentAxis2.axisColor = "#FCD202";
    PercentAxis2.title = "Percent (%)";
    PercentAxis2.gridAlpha = 0;
    PercentAxis2.axisThickness = 2;
    chart2.addValueAxis(PercentAxis2);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = tempAxis2;
    graph.valueField = "Zonetemperature";
    graph.title = "Zone Temperature";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart2.addGraph(graph);

    //Reheat valve signal
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = tempAxis2;
    graph.valueField = "Outdoortemperature";
    graph.title = "Outdoor temperature";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart2.addGraph(graph);


    // column graph
    var graphZOM = new AmCharts.AmGraph();
    graphZOM.type = "column";
    graphZOM.valueAxis = PercentAxis2;
    graphZOM.title = "Reheat Valve Signal";
    graphZOM.lineColor = "#333333";
    graphZOM.valueField = "ReheatValveSignal";
    graphZOM.lineAlpha = 1;
    graphZOM.fillAlphas = 1;
    graphZOM.dashLengthField = "dashLengthColumn";
    graphZOM.alphaField = "alpha";
    //graphZOM.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
    chart2.addGraph(graphZOM);


    var categoryAxis = chart2.categoryAxis;
    categoryAxis.autoGridCount  = false;
    categoryAxis.axisColor = "#fff";
    categoryAxis.gridCount = chartData2.length/2;
    categoryAxis.gridPosition = "start";
    categoryAxis.equalSpacing=true;
    categoryAxis.parseDates = true; // in order char to understand dates, we should set parseDates to true
    categoryAxis.minPeriod = "mm"; // as we have data with minute interval, we have to set "mm" here.

    categoryAxis.labelRotation = 90;

    graph.lineColor = "#666666";
    

    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorPosition = "mouse";
    chart2.addChartCursor(chartCursor);

    // SCROLLBAR
    var chartScrollbar = new AmCharts.ChartScrollbar();
    //chartScrollbar.graph = graph;
    chartScrollbar.autoGridCount=false;
    chartScrollbar.categoryAxis='';
    chartScrollbar.scrollbarHeight = 40;
    //chartScrollbar.color = "#fff";
    chartScrollbar.backgroundAlpha=1;
    chartScrollbar.backgroundColor= "#1A1A1A";
    chartScrollbar.graphFillAlpha=1;
    chartScrollbar.graphFillColor= "#444444";
    chartScrollbar.selectedBackgroundAlpha=1;
    chartScrollbar.selectedBackgroundColor= "#aaa";
    chartScrollbar.selectedGraphFillAlpha=1;
    chartScrollbar.selectedGraphFillColor= "#111";
    chartScrollbar.autoGridCount = true;
    chart2.addChartScrollbar(chartScrollbar);

    // LEGEND
    var legend = new AmCharts.AmLegend();
    legend.marginLeft = 110;
    legend.useGraphSettings = true;
    chart2.addLegend(legend);

    chart2.write('chartContainer2');
});
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
    //graph.bullet = "round";
    //graph.bulletSize = 8;
    //graph.bulletBorderColor = "#FFFFFF";
    //graph.bulletBorderAlpha = 1;
    //graph.bulletBorderThickness = 2;
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
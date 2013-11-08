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
    chart.startDuration = 2;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueField = "Zonetemperature";
    graph.title = "Temperature";
    graph.type = "smoothedLine";
    graph.bullet = "round";
    graph.bulletSize = 8;
    graph.bulletBorderColor = "#FFFFFF";
    graph.bulletBorderAlpha = 1;
    graph.bulletBorderThickness = 2;
    graph.lineThickness = 2;
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);


    var categoryAxis = chart.categoryAxis;
    categoryAxis.autoGridCount  = false;
    categoryAxis.axisColor = "#fff";
    categoryAxis.gridCount = chartData.length;
    categoryAxis.gridPosition = "start";

    categoryAxis.labelRotation = 90;

    graph.lineColor = "#666666";

    var tempAxis = new AmCharts.ValueAxis();
    tempAxis.title = "Temperature (F)";
    tempAxis.gridAlpha = 0;
    tempAxis.axisAlpha = 0;
    chart.addValueAxis(tempAxis);
    

    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorPosition = "mouse";
    chart.addChartCursor(chartCursor);

    // SCROLLBAR
    var chartScrollbar = new AmCharts.ChartScrollbar();
    chartScrollbar.graph = graph;
    chartScrollbar.scrollbarHeight = 40;
    chartScrollbar.color = "#fff";
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

    chart.write('chartContainer');
});
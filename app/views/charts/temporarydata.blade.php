<script type = "text/javascript">

var chartData = [{
    time: "7:00",
    temp: 104,
    temp2: 111,
    limit: 108
}, {
    time: "8:00",
    temp: 110,
    temp2: 116,
    limit: 108
}, {
    time: "9:00",
    temp: 108,
    temp2: 112,
    limit: 108
}, {
    time: "10:00",
    temp: 113,
    temp2: 109,
    limit: 108
}, {
    time: "11:00",
    temp: 118,
    temp2: 104,
    limit: 108
}, {
    time: "12:00",
    temp: 120,
    temp2: 100,
    limit: 108
}, {
    time: "13:00",
    temp: 123,
    temp2: 111,
    limit: 108
}, {
    time: "14:00",
    temp: 117,
    temp2: 113,
    limit: 108
}, {
    time: "15:00",
    temp: 116,
    temp2: 102,
    limit: 108
}, {
    time: "16:00",
    temp: 105,
    temp2: 105,
    limit: 108
}, {
    time: "17:00",
    temp: 104,
    temp2: 114,
    limit: 108
}, {
    time: "18:00",
    temp: 104,
    temp2: 120,
    limit: 108
}, {
    time: "19:00",
    temp: 103,
    temp2: 125,
    limit: 108
}, {
    time: "20:00",
    temp: 103,
    temp2: 123,
    limit: 108
}, {
    time: "21:00",
    temp: 103,
    temp2: 118,
    limit: 108
}, {
    time: "22:00",
    temp: 103,
    temp2: 117,
    limit: 108
}, {
    time: "23:00",
    temp: 103,
    temp2: 115,
    limit: 108
}]; 

AmCharts.ready(function () {
    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = "time";
    chart.startDuration = 2;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueField = "temp";
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

AmCharts.ready(function () {
    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = "time";
    chart.startDuration = 1;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueField = "temp";
    graph.type = "smoothedLine";
    graph.bullet = "round";
    graph.bulletSize = 8;
    graph.bulletBorderColor = "#FFFFFF";
    graph.bulletBorderAlpha = 1;
    graph.bulletBorderThickness = 2;
    graph.lineThickness = 2;
    //graph.valueField = "value";
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);

    //limit
    var graph = new AmCharts.AmGraph();
    graph.valueField = "limit";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
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

    chart.write('chartContainer2');
});

AmCharts.ready(function () {
    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = "time";
    chart.startDuration = 1;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

    //temp 1
    var graph = new AmCharts.AmGraph();
    graph.valueField = "temp";
    graph.title = "Temp inside";
    graph.type = "smoothedLine";
    graph.bullet = "round";
    graph.bulletSize = 8;
    graph.bulletBorderColor = "#FFFFFF";
    graph.bulletBorderAlpha = 1;
    graph.bulletBorderThickness = 2;
    graph.lineThickness = 2;
    //graph.valueField = "value";
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);


    //temp 2
    var graph = new AmCharts.AmGraph();
    graph.valueField = "temp2";
    graph.type = "smoothedLine";
    graph.title = "Temp outside";
    graph.bullet = "round";
    graph.bulletSize = 8;
    graph.bulletBorderColor = "#FFFFFF";
    graph.bulletBorderAlpha = 1;
    graph.bulletBorderThickness = 2;
    graph.lineThickness = 2;
    //graph.valueField = "value";
    graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
    chart.addGraph(graph);

    //limit
    var graph = new AmCharts.AmGraph();
    graph.valueField = "limit";
    graph.title = "Danger zone";
    graph.type = "smoothedLine";
    graph.lineThickness = 2;
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

    // LEGEND
    var legend = new AmCharts.AmLegend();
    legend.useGraphSettings = true;
    chart.addLegend(legend);

    chart.write('chartContainer3');
});
</script>
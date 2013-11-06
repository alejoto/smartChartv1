<script type = "text/javascript">

var chartData = [{
    time: "7:00",
    temp: 104
}, {
    time: "8:00",
    temp: 110
}, {
    time: "9:00",
    temp: 108
}, {
    time: "10:00",
    temp: 113
}, {
    time: "11:00",
    temp: 118
}, {
    time: "12:00",
    temp: 120
}, {
    time: "13:00",
    temp: 123
}, {
    time: "14:00",
    temp: 117
}, {
    time: "15:00",
    temp: 116
}, {
    time: "16:00",
    temp: 105
}, {
    time: "17:00",
    temp: 104
}, {
    time: "18:00",
    temp: 104
}, {
    time: "19:00",
    temp: 103
}, {
    time: "20:00",
    temp: 103
}, {
    time: "21:00",
    temp: 103
}, {
    time: "22:00",
    temp: 103
}, {
    time: "23:00",
    temp: 103
}]; 

AmCharts.ready(function () {
    var chart = new AmCharts.AmSerialChart();
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";
    chart.dataProvider = chartData;
    chart.categoryField = "time";
    chart.startDuration = 2;
    chart.color = "#FFFFFF";
    //chart.addListener('dataUpdated',zoomChart);

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
    chartScrollbar.color = "#000";
    chartScrollbar.autoGridCount = true;
    chart.addChartScrollbar(chartScrollbar);

    chart.write('chartContainer');


});
</script>
function createnewchart(jsondata,y_axis,x_axis,thecharts,target){
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
    chart.color = "#FFFFFF";
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

    chart.write(target);
}
AmCharts.ready(function () {

    createnewchart(
        'availabledatafields'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[['ZT','left','Temperature (Fh)','smoothedLine']
        ,['ZRVS','right','Reheat valve signal (%)','smoothedLine']
        ,['ZOM','right','Occupancy (%)','column']
        ]
        ,'mychartContainer'
        );


    createnewchart(
        'zone_heating_data'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[['Zonetemperature','left','Temperature (Fh)','smoothedLine']
        ,['ReheatValveSignal','right','Reheat valve signal (%)','smoothedLine']
        ,['Occupancy','right','Occupancy (%)','column']
        ]
        ,'chartContainer'
        );

    createnewchart(
        'zone_heating_data2'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[['Zonetemperature','left','Temperature (Fh)','smoothedLine']
        ,['Outdoortemperature','left','Outdoor temperature','smoothedLine']
        ,['ReheatValveSignal','right','Reheat Valve Signal (%)','column']
        ]
        ,'chartContainer2'
        );

    createnewchart(
        'zone_heating_data3'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[['mixedairtemperature','left','Mixed-Air Temperature','smoothedLine']
        ,['Outdoordamperpositionsignal','right','Damper position signal (%)','smoothedLine']
        ,['outdoorairfraction','left','outdoor air fraction (Fh)','column']
        ,['oat','left','outdoor air temperature','smoothedLine']
        ,['rat','left','Return air temperature','smoothedLine']
        ]
        ,'chartContainer3'
        );

    createnewchart(
        'zone_heating_data3'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[
        ['Outdoordamperpositionsignal','right','Damper position signal (%)','smoothedLine']
        ,['outdoorairfraction','left','outdoor air fraction (Fh)','column']
        ,['oat','left','outdoor air temperature','smoothedLine']
        ]
        ,'chartContainer4'
        );

    createnewchart(
        'zone_heating_data3'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[
        ['Outdoordamperpositionsignal','right','Damper position signal (%)','smoothedLine']
        ,['outdoorairfraction','left','outdoor air fraction (Fh)','column']
        ,['rat','left','Return air temperature','smoothedLine']
        ]
        ,'chartContainer5'
        );

    createnewchart(
        'zone_heating_data3'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[
         ['oat','left','outdoor air temperature','smoothedLine']
        ,['rat','left','Return air temperature','smoothedLine']
        ,['Outdoordamperpositionsignal','right','Damper position signal (%)','column']
        ]
        ,'chartContainer6'
        );
});


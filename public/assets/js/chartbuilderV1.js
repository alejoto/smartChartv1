function createnewchart2(jsondata,y_axis,x_axis,thecharts,target){

    /*
    | RETRIEVING DATA FROM HTML TAG 
    | @param "chartData" receives data to be charted
    | @param "jsondata" is the same html tag id containing data (must be JSON format)
    */
    var chartData=new Object();
    chartData=$('#'+jsondata).text();
    chartData=eval(chartData);//Data must be json converted with 'eval' method


    /* ------------------------------------------------------------------------------------------------
    |
    | CHART CONSTRUCTION
    | 
    */

    var chart = new AmCharts.AmSerialChart();//Creating new chart object
    chart.pathToImages = "http://www.amcharts.com/lib/3/images/";//path containing images of scrollbar
    chart.dataProvider = chartData;
    chart.categoryField = y_axis;
    chart.sequencedAnimation=false; //Multiple animations at the same time, for faster appearance
    chart.startEffect='bounce';
    chart.startDuration = 1;
    chart.color = "#000000";

    /*
    | AXES
    | @param "x_axis" is a function parameter array containing boolean 0/1.
    |       0 is for building left (primary) axis.
    |       1 is for building right (secondary) axis.
    */
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
    
    /*
    | ADDING DATA TO BE CHARTED
    | @param "graph" contains all elements for drawing lines/columns of the chart.
    | @param "thecharts" contains a multidimensional array with specific elements for constructing the chart,
    | such as type of dataset to be charted, title of each dataset, etcetera.
    | 
    */
    for (var i = 0; i < thecharts.length; i++) {
        var graph = new AmCharts.AmGraph();
        graph.valueField = thecharts[i][0];

        //Associating dataset to the primary or secondary axis
        if (thecharts[i][1]=='left') {
            graph.valueAxis = left; 
        }
        else{
            graph.valueAxis = right;
        }

        //Adding title to the dataset
        graph.title = thecharts[i][2];

        //Drawing dataset as line or column
        graph.type = thecharts[i][3];
        if (thecharts[i][3]=='column') //additional features for columns
        {
            graph.lineAlpha = 1;
            graph.fillAlphas = 1;
            graph.dashLengthField = "dashLengthColumn";
            graph.alphaField = "alpha";
        }
        graph.lineThickness = 2;
        graph.balloonText = "[[category]]<br><b><span style='font/size:14px;'>[[value]]</span></b>";
        chart.addGraph(graph);
    };


    /*
    | HORIZONTAL AXIS
    | @param categoryAxis= object for horizontal axis.
    |
    */
    var categoryAxis = chart.categoryAxis;
    categoryAxis.autoGridCount  = false;
    categoryAxis.axisColor = "#fff";
    categoryAxis.gridCount = chartData.length/5;
    categoryAxis.gridPosition = "start";
    categoryAxis.equalSpacing=false;// Displaying gap on data
    categoryAxis.parseDates = true; // Parsing horizontal axis to date if timestamp or date format
    categoryAxis.minPeriod = "mm"; // Minimum interval.  Minute = "mm".
    categoryAxis.labelRotation = 90; //category label rotation in degrees. Avoid text overlapping.
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

    /*
    | WRITING CHART
    | Gathering all parameters for chart construction
    | @param "target" contains the HTLM tag id where chart will be displayed
    */
    chart.write(target);
}
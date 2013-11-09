AmCharts.ready(function () {
	createnewchart(
        'availabledatafields'
        ,'time'
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"}
        ,[['ChWRT','left','Temperature (Fh)','smoothedLine']
        //,['ReheatValveSignal','right','Reheat valve signal (%)','smoothedLine']
        //,['Occupancy','right','Occupancy (%)','column']
        ]
        ,'mychartContainer'
        );
});
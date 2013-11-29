AmCharts.ready(function () {

//var param1=$('#param1').html().trim();//not working
//var firstset=['ZT','left','Zone Temperature','smoothedLine'];
var confdataset=$('#param1').html().trim();
confdataset=confdataset.split('|');
var i;
thedataset=[];
var param1=[];
for (var i = 0; i < confdataset.length; i++) {
    thedataset[i]=confdataset[i].split(',');
    param1[i]=thedataset[i];
}



/*if ($('#dparameters').html().trim()==1) { var dataparameter=param1; } 
//if ($('#dparameters').html().trim()==1) { var dataparameter=[['ZT','left','Zone Temperature','smoothedLine'],['ZRVS','right','Zone Reheat Valve Signal (%)','column'],['ZOM','right','Zone Occupancy Mode (Occupied/Unoccupied)','column']]; }
if ($('#dparameters').html().trim()==2) { var dataparameter=[['ZT','left','Zone Temperature','smoothedLine'],['ZRVS','right','Zone Reheat Valve Signal (%)','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==3) { var dataparameter=[['MAT','left','Mixed/Air Temp','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OAF','right','Outdoor/Air Fraction temp','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['RAT','left','Return/Air Temp','smoothedLine']]; }
if ($('#dparameters').html().trim()==4) { var dataparameter=[['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OAF','right','Outdoor/Air Fraction temp','column']]; }
if ($('#dparameters').html().trim()==5) { var dataparameter=[['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['RAT','left','Return/Air Temp','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==6) { var dataparameter=[['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==7) { var dataparameter=[['CCV','right','Cooling/Coil Valve Signal (%)','column'],['DATSP','left','Discharge/Air Temp Set Point','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==8) { var dataparameter=[['CCV','right','Cooling/Coil Valve Signal (%)','column'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==9) { var dataparameter=[['CCV','right','Cooling/Coil Valve Signal (%)','column'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column']]; }
if ($('#dparameters').html().trim()==10) { var dataparameter=[['DAT','left','Discharge/Air Temp','smoothedLine'],['MAT','left','Mixed/Air Temp','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['RAT','left','Return/Air Temp','smoothedLine']]; }
if ($('#dparameters').html().trim()==11) { var dataparameter=[['CCV','right','Cooling/Coil Valve Signal (%)','column'],['HCVS','right','Heating/Coil Valve Signal (%)','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==12) { var dataparameter=[['ChWST','left','Chilled/Water Supply Temp','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==13) { var dataparameter=[['ChWST','left','Chilled/Water Supply Temp','smoothedLine'],['CCV','right','Cooling/Coil Valve Signal (%)','column'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==14) { var dataparameter=[['ChWRT','left','Chilled/Water Return Temp','smoothedLine'],['ChWST','left','Chilled/Water Supply Temp','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==15) {  var dataparameter=[ ['ChWRT','left','Chilled/Water Return Temp','smoothedLine'],['CCV','right','Cooling/Coil Valve Signal (%)','column'] ]; }
if ($('#dparameters').html().trim()==16) { var dataparameter=[['HWST','left','Hot/Water Supply Temp','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==17) { var dataparameter=[['HWRT','left','Hot/Water Return Temp','smoothedLine'],['HWST','left','Hot/Water Supply Temp','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==18) { var dataparameter=[['HWLDP','left','Hot/Water Loop Differential Pressure','smoothedLine'],['HCVS','right','Heating/Coil Valve Signal (%)','column']]; }
if ($('#dparameters').html().trim()==19) { var dataparameter=[['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OAF','left','Outdoor/Air Fraction temp','smoothedLine'],['OM','right','Occupancy Mode','column']]; }
if ($('#dparameters').html().trim()==20) { var dataparameter=[['OAT','left','Outdoor/Air Temp (temp)','smoothedLine'],['OADPS','right','Outdoor/Air Damper Position Signal (%)','column'],['OM','right','Occupancy Mode','column']]; }
if ($('#dparameters').html().trim()==21) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine'],['DSPSP','left','Duct Static Pressure Set Point','smoothedLine']]; }
if ($('#dparameters').html().trim()==22) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine']]; }
if ($('#dparameters').html().trim()==23) { var dataparameter=[['VAVDPSP','right','VAV Damper Position Set Point (%)','column']]; }
if ($('#dparameters').html().trim()==24) { var dataparameter=[['DAT','left','Discharge/Air Temp','smoothedLine'],['DATSP','left','Discharge/Air Temp Set Point','smoothedLine']]; }
if ($('#dparameters').html().trim()==25) { var dataparameter=[['DAT','left','Discharge/Air Temp','smoothedLine'],['DATSP','left','Discharge/Air Temp Set Point','smoothedLine'],['OAT','left','Outdoor/Air Temp (temp)','smoothedLine']]; }
if ($('#dparameters').html().trim()==26) { var dataparameter=[['ZRVS','right','Zone Reheat Valve Signal (%)','column']]; }
if ($('#dparameters').html().trim()==27) { var dataparameter=[['DSP','left','Duct Static Pressure','smoothedLine']]; }
if ($('#dparameters').html().trim()==28) { var dataparameter=[['SFS','right','Supply Fan Status (on/off)','column']]; }*/


	createnewchart3(
        'availabledatafields'   //div id with all data to be charted
        ,'time'                 //name of category (horizontal) axis
        ,{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"} //name of left and right axis
        ,
        param1           //multidimensional array with some specifications of chart lines and columns
        ,'mychartContainer'     //div id that will display chart
        );
});


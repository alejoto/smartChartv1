/* 

*

*

-------------------------------------------------------------------------

* name          :   tiprequired(reqfld)

* Description   :   Displays a 'tooltip-type' message (TwitterBootstrap format), 

*                   when required fields are left empty.

* Depend on     :   Twitterboostrap tooltip function (bootstrap.js file)

* Dependant     :   clinic_eval.js, patients.js, right_catheter.js, 

*/



function tiprequired(reqfld) {

    $(document).ready(function() {

        reqfld.blur(function() {

            if (reqfld.val() == "") {

                reqfld.tooltip({

                    title: 'Requerido',

                    placement: 'right'

                });

                reqfld.tooltip('show');

            } else reqfld.tooltip('destroy');

        });

    });

}

/* 

*

*

-------------------------------------------------------------------------

* name          :   hideshow1(main, second)

* Description   :   Hides 'second' tag while 'first' is empty, 

*                   'second' tag is displayed when 'first' is filled.

* Depend on     :   jquery

* Dependant     :   show_ifnoempty(one, two) , hide_if_empty(n_empty, hid_shw) 

*                   

*/



function hideshow1(main, second) {

    if (main.val() != "") {

        second.show("fast");

    }

    else {

        second.hide("fast");

    }

}



/* 

*

*

-------------------------------------------------------------------------

* name          :   show_ifnoempty(one, two)

* Description   :   Keeps 'two' tag hidden while 'one' is empty, 

*                   'two' tag is displayed when keyup on 'one'.

* Depend on     :   hideshow1(main, second)

* Dependant     :   blood_test.js, cardiovascular.js, clinic_eval.js,

*               :   diagnostic.js, right_catheter.js 

*                   hmd_dateformat(dr_y, dr_m, dr_d, join_date)

*/



function show_ifnoempty(one, two) {

    $(document).ready(function() {

        two.hide();

        one.keyup(function() {

            hideshow1(one, two)

        });

        one.blur(function() {

            hideshow1(one, two)

        });

    })

}



/*

*

*

-------------------------------------------------------------------------

* Name          :   hide_if_empty(n_empty, hid_shw)

* Description   :   Useful in select list fields. Keeps 'hid_shw' hidden  

*                   while 'n_empty' select field is empty. 'hid_shw' tag  

*                   is displayed when 'n_empty' is changed with no-empty value.

* Depend on     :   hideshow1(main, second)

* Dependant     :   clinic_eval.js, right_catheter.js

*/



function hide_if_empty(n_empty, hid_shw) {

    $(document).ready(function() {

        hid_shw.hide();

    })



    n_empty.change(function() {

        hideshow1(n_empty, hid_shw);

    })

}



/*

*

*

-------------------------------------------------------------------------

* Name          :   hide_show_savebutton(fields,button)

* Description   :   Hides the 'save' button until all 'required' fields

*                   are completed. DOES NOT WORK WITH RADIO BUTTONS AND CHECKBOXES

* Depend on     :   jquery

* Dependant     :   blood_test.js, cardiovascular.js, clinic_eval.js, diagnostic.js

*               :   patients.js

*/

function hide_show_savebutton(fields,button) {

    $(document).ready(function() {

        button.hide();

        prefield=fields;

        for (var i = 0; i < prefield.length; i++) {

            prefield[i].css('background-color','#F0FAFF');/*coloring required empty fields with soft blue*/

        };

    });

    function filled_fields(){

        filledfields=0;

        var i=0;

        for (;fields[i];)

        {

            if(fields[i].val()!=="") {

                fields[i].css('background-color','#fff');

                filledfields=filledfields+1;

            }

            else {fields[i].css('background-color','#F0FAFF');}

            i++;

        }

        if (fields.length==filledfields) {button.show("fast");}

        else {button.hide("fast");}

    }

    var ii=0;

    

    var typfd;



    for (;fields[ii];)

    {

        typfd=fields[ii].prop("tagName");

        if (typfd==="SELECT") {

            fields[ii].change(function(){filled_fields();});

        } 

        else {

            fields[ii].keyup(function(){filled_fields();});

        }

        

        fields[ii].blur(function(){filled_fields();});

        ii++;

    }

}



/*

*

*

-------------------------------------------------------------------------

* Name          :   cancel_updaterow(cancel,reset,hide)

* Description   :   Clear all text input field contents and hide those.

*                   required after clicking "cancel" button.

* Depend on     :   jquery

* Dependant     :   PENDING TO UPDATE

*/

function cancel_updaterow(cancel,reset,hide) {

    cancel.click(function(){

        

        for (var i = 0; i < reset.length; i++) {

            reset[i].val('');

        };

        

        for (var i = 0; i < hide.length; i++) {

            hide[i].hide();

        };

        

    });

}



/*

*

*

-------------------------------------------------------------------------

* Name          :   onlynumber(o_nb)

* Description   :   Allows only number keys to be used.

*                   Only integer numbers can be entered.

* Depend on     :   jquery

* Dependant     :   num_ranges(vale, maxi, mini, int_float)

*/

function onlynumber(o_nb) {

    o_nb.keydown(function(event) {

        if (o_nb.val() == "" && (event.keyCode == 48 || event.keyCode == 96)){

            event.preventDefault();

        }else{

            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 ||

                event.keyCode == 45 || event.keyCode == 27 || 

                event.keyCode == 13 || (event.keyCode == 65 && 

                        event.ctrlKey === true) || (event.keyCode >= 35 && 

                                event.keyCode <= 39)) {} 

            else {

                if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) 

                    && (event.keyCode < 96 || event.keyCode > 105)) 

                {

                    event.preventDefault();

                }

            }

        }

    });

}

/*

*

*

-------------------------------------------------------------------------

* Name          :   floatnb(fltnum) DEPRECATED
* Description   :   Enables only number keys and decimal separator  DEPRECATED
*                   (comma or dot depending on system config).  The
*                   remaining keyboard keys get disabled.
* Depend on     :   jquery DEPRECATED
* Dependant     :   num_ranges(vale, maxi, mini, int_float) DEPRECATED
*/

/*function floatnb(fltnum) {
    fltnum.keypress(function(eve) {
        if ((eve.which != 46 || $(this).val().indexOf('.') != -1) 
            && (eve.which < 48 || eve.which > 57) 
            || (eve.which == 46 && $(this).caret().start == 0)) {
            eve.preventDefault();
        }
        // Next function: if left digits are deleted until decimal separator, 
        // function adds a zero '0' at left position before the decimal separator.
        fltnum.keyup(function(eve) {
            if ($(this).val().indexOf('.') == 0) {
                $(this).val($(this).val().substring(1));
            }
        });
    });
}*/

/** Function count the occurrences of substring in a string;
     * @param {String} string   Required. The string;
     * @param {String} subString    Required. The string to search for;
     * @param {Boolean} allowOverlapping    Optional. Default: false;
     */
    function hmdoccurrences(string, subString, allowOverlapping){
    
        string+=""; subString+="";
        if(subString.length<=0) return string.length+1;
    
        var n=0, pos=0;
        var step=(allowOverlapping)?(1):(subString.length);
    
        while(true){
            pos=string.indexOf(subString,pos);
            if(pos>=0){ n++; pos+=step; } else break;
        }
        return(n);
    } 

function hmdfloatnumb(id) {
        $(id).keydown(function(event) {
        var value = $(this).val();
            
            // Allow: backspace, delete, tab, escape, enter, minus (-) and .
        if ( $.inArray(event.keyCode,[46,8,9,27,13,56,190,173,189,109,110]) !== -1 ||
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
    $(id).keyup(function(e){
        var value=$(this).val();
        var minus=value.indexOf("-");
        var minusduplicated=hmdoccurrences(value, "-");
        var period=hmdoccurrences(value, ".");
        if (minus>0||period>1||minusduplicated>1) {
            $(this).val(value.substring(0,value.length - 1));
        }
    });
    }
/*

*
*
-------------------------------------------------------------------------
* Name          :   num_ranges(vale, maxi, mini, int_float)
* Description   :   Alert when data number is out of range.
*                   It also blocks all keyboard except numeric
*                   keys and decimal separator key.
* Depend on     :   bootstrap.js (popover function), jquery.
*                   onlynumber(o_nb), hmdfloatnumb(id)
* Dependant     :   
*/
function num_ranges(vale, maxi, mini, int_float) {
    $(document).ready(function() {
        if (int_float == 0) {
            onlynumber(vale);
        } else {
            hmdfloatnumb(vale)
        };

        vale.blur(function() {
            if (vale.val() > maxi && vale.val() != "") {
                vale.popover('destroy');
                vale.popover({
                    title: "Valor debe ser menor o igual a " + maxi,
                    placement: 'right'
                });
                vale.popover('show');
                vale.focus();
            }
            else if (vale.val() < mini && vale.val() != "") {
                vale.popover('destroy');
                vale.popover({
                    title: "Valor debe ser mayor o igual a " + mini,
                    placement: 'right'

                });
                vale.popover('show');
                vale.focus();
            } /**/
            else vale.popover('destroy');
        });
    });
}

/*

*

*

-------------------------------------------------------------------------

* Name          :   concatenate_y_m_d(year,month,day,input)

* Description   :   Concatenates separated date fields in hidden client-side

*                   input field, in order to send dates with ajax or submit

*                   methods. 

* Depend on     :   jquery

* Dependant     :  

*/

function concatenate_y_m_d(year,month,day,input) {

    day.keyup(function(){

        var month_v=month.val();

        var day_v=day.val();

        if (month_v.length==1) {month_v='0'+month_v;}

        if (day_v.length==1) {day_v='0'+day_v;}

        var concatdate=

        year.val()+"-"+

        month_v+"-"+

        day_v;

        input.val(concatdate);

    });

}

/*

*

*

-------------------------------------------------------------------------

* Name          :   hmd_dateformat(year,month,day)

* Description   :   Limits days according to the month and bisester year,

*                   displays month fields if year is no-empty, same with

*                   day field with month.  Also limits month to 1-12 values. 

*                   Keyboard is disabled except number keys.

* Depend on     :   jquery, bootstrap.js (tooltip and popover),

*                   

* Dependant     :   

*/

function hmd_dateformat(year,month,day) {

    show_ifnoempty(year, month);

    show_ifnoempty(month, day);

    num_ranges(month, 12, 1, 0);

    onlynumber(day);



        function month_nm_days() {

        var bisester = year.val() % 4;

        /*pending to set inside function in order to activate with blur in addition to keyup*/

        if (month.val() == "2" && bisester == 0&& day.val()>29)

        {

            day.popover('destroy');

            day.popover({title:'valor maximo permitido 29',placement: 'top'});

            day.popover('show');

            day.focus();

        }

        else if (month.val() == "2" &&  bisester!= 0 && day.val()>28) {

            day.popover('destroy');

            day.popover({title:'valor maximo permitido 28',placement: 'top'});

            day.popover('show');

            day.focus();

        }

        else if ((month.val() == "1"||month.val() == "3"||month.val() == "5"

            ||month.val() == "7"||month.val() == "8"||month.val() == "10"

            ||month.val() == "12") &&  day.val()>31) {

            day.popover('destroy');

            day.popover({title:'valor maximo permitido 31',placement: 'top'});

            day.popover('show');

            day.focus();

        }

        else if ((month.val() == "4"||month.val() == "6"||month.val() == "9"

            ||month.val() == "11") &&  day.val()>30) {

            day.popover('destroy');

            day.popover({title:'valor maximo permitido 30',placement: 'top'});

            day.popover('show');

            day.focus();

        }

        else {day.popover('destroy');}

    }

    day.keyup(function(){month_nm_days() ;});

    day.blur(function(){month_nm_days() ;});

    month.blur(function(){month_nm_days() ;});

}



/*

*

*

-------------------------------------------------------------------------

* Name          :   up_cas(lwc)

* Description   :   Changes all text inside field to uppercase while writing

* Depend on     :   jquery

* Dependant     :   

*/

function up_cas(lwc) {

    lwc.keyup(function() {

        lwc.val($(this).val().toUpperCase());

    });

}

/*

*

*

-------------------------------------------------------------------------

* Name          :   clickhideshow(butn, hd, sw)

* Description   :   Hides 'hd' tag while displaying 'sw' tag

* Depend on     :   jquery

* Dependant     :   

*/

function clickhideshow(butn, hd, sw) {

    butn.click(function() {

        hd.hide("fast");

        sw.show("fast");

    })

}





/*
*
*
-------------------------------------------------------------------------
* Name          :   samevalue(origin, targeted)
* Description   :   Rewrites same value entered in a specific text field
*                   with keyup trigger
* Depend on     :   jquery
* Dependant     :   
*/

function samevalue(origin, targeted) {
    origin.keyup(function() {
        targeted.val(origin.val());
    });
}
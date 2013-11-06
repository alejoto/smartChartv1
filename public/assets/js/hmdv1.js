

/*
*
*
-------------------------------------------------------------------------
* Name          :   hide_show_savebutton(fields,button)
* Description   :   Hides the 'save' button until all 'required' fields
*                   are completed. DOES NOT WORK WITH RADIO BUTTONS AND CHECKBOXES
* Depend on     :   jquery

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
//regexp for email, return true or false after verification.
function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {return true;}
        else {return false;}
    }

//Input field validation for email regexp
function valid_email(input,message) {
	$('#'+input).blur(function(){
		if (!validateEmail($('#'+input).val())
			&&$('#'+input).val()!='')
		{
			$('#'+input).focus();
			$("#"+message).html("Please enter valid email");
			
		}
		else
		{
			$("#"+message).html("");
		}
	});
}

//Field verification for subscribing page
function pwd_match(email,pwd,confirm,mssg,btn) {
    //hide confirm field and subscribe
    
    $('#'+confirm).hide();
    $('#'+btn).hide();

    $('#'+email).keyup(function(){
        if (validateEmail($('#'+email).val())) {
            $('#'+pwd).show('fast');
        }
        else {
            $('#'+confirm).hide('fast');
            $('#'+btn).hide('fast');
        }
    });

    function trice_validation() {
        if ($('#'+pwd).val()==$('#'+confirm).val()
            &&$('#'+confirm).val().length>=6
            &&validateEmail($('#'+email).val())) {
            $('#'+btn).show('fast');
            $('#'+mssg).html('');
        }
        else {
            $('#'+mssg).html('Password and confirm must match');
            $('#'+btn).hide();
        }
    }

    $('#'+pwd).keyup(function(){
        var pl=$('#'+pwd).val().length;
        if (pl<6) {
            $('#'+mssg).html('Password must contain at least six characters');
            $('#'+confirm).hide();
            $('#'+confirm).html('');
            $('#'+btn).hide();

        }
        else if ($('#'+confirm).val()!=''
            &&$('#'+confirm).val()!=$('#'+pwd).val()) {
            $('#'+mssg).html('Password and confirm must match');
            $('#'+btn).hide();
        }

            else
            {

            $('#'+confirm).show('fast');
            $('#'+mssg).html('');
            $('#'+confirm).keyup(function() {trice_validation();});
        }
    }); 
    $('#'+email).keyup(function() {trice_validation();});
    $('#'+email).change(function() {trice_validation();});
}

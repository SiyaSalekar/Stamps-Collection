function categoryid_validation(){
    'use strict';
    var userid_name = document.getElementById("category_id");
    var userid_value = document.getElementById("category_id").value;
    var userid_length = userid_value;
    if(userid_length<1 || userid_length>4)
    {
    document.getElementById('uid_err').innerHTML = 'ID doesnt exist';
    userid_name.focus();
    document.getElementById('uid_err').style.color = "#FF0000";
    return false;
    }
    else if(!/^[0-9]+$/.test(userid_length)){
        document.getElementById('uid_err').innerHTML = 'Only Numbers Accepted';
        userid_name.focus();
    document.getElementById('uid_err').style.color = "#FF0000";
    return false;
    }
    else
    {
    document.getElementById('uid_err').innerHTML = 'Valid user id';
    document.getElementById('uid_err').style.color = "#00AF33";
    }
    return true;
}
function price_validation(){
    'use strict';
    var userid_name = document.getElementById("price");
    var userid_value = document.getElementById("price").value;
    var userid_length = userid_value;

    if(userid_length===""){
        document.getElementById('pr_err').innerHTML = 'cannot be empty';
        userid_name.focus();
    document.getElementById('pr_err').style.color = "#FF0000";
        return false;
    }
    else if(userid_length<0 || userid_length>1000)
    {
    document.getElementById('pr_err').innerHTML = 'Enter Price [0-1000]';
    userid_name.focus();
    document.getElementById('pr_err').style.color = "#FF0000";
    return false;
    }
    else if(!/^(?:\d{0,5}\.\d{1,2})$|^\d{0,5}$/g.test(userid_length)){
        document.getElementById('pr_err').innerHTML = 'Only Numbers Accepted';
        userid_name.focus();
    document.getElementById('pr_err').style.color = "#FF0000";
    return false;
    }
    
    else
    {
    document.getElementById('pr_err').innerHTML = 'Price OK';
    document.getElementById('pr_err').style.color = "#00AF33";
    }
    return true;
}
function year_validation(){
    'use strict';
    var userid_name = document.getElementById("year");
    var userid_value = document.getElementById("year").value;
    var userid_length = userid_value;
  
    if(userid_length<1880 || userid_length>2022)
    {
    document.getElementById('yr_err').innerHTML = 'Year should be greater than 1880 and less than or equal to current year';
    userid_name.focus();
    document.getElementById('yr_err').style.color = "#FF0000";
    return false;
    }
    else if(!/^[0-9]+$/.test(userid_length)){
        document.getElementById('yr_err').innerHTML = 'Only Numbers Accepted';
        userid_name.focus();
    document.getElementById('yr_err').style.color = "#FF0000";
    return false;
    }
    else
    {
    document.getElementById('yr_err').innerHTML = 'Year OK';
    document.getElementById('yr_err').style.color = "#00AF33";
    }
    return true;
}
function size_validation(){
    'use strict';
    var userid_name = document.getElementById("size");
    var userid_value = document.getElementById("size").value;
    var userid_length = userid_value;
    if(!/(\d+(\.\d+|)\s?x\s?\d+(\.\d+|)(\s?x\s?\d*(\.?\d+|))?)$/.test(userid_length)){
        document.getElementById('sr_err').innerHTML = 'Incorrect Dimension Format';
        userid_name.focus();
    document.getElementById('sr_err').style.color = "#FF0000";
    return false;
    }
    else
    {
    document.getElementById('sr_err').innerHTML = 'Size OK';
    document.getElementById('sr_err').style.color = "#00AF33";
    }
    return true;
}

function validate(){
		
    var valid = true;
    valid = valid && categoryid_validation() && price_validation() && year_validation() && size_validation();
    
    $("#btn-submit").attr("disabled",true);
    if(valid) {
        $("#btn-submit").attr("disabled",false);
    }	
}

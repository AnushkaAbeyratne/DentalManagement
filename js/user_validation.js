$(document).ready(function(){
});

$("#addEmployee").submit(function () {

    var fname=$("#emp_fname").val();
    var lname=$("#emp_lname").val();
    var emp_email=$("#emp__email").val();
    var gender=$("#emp_gender").val();
    var dob=$("#emp_dob").val();
    var nic=$("#emp_nic").val();
    var cno1=$("#emp_cno1").val();
    var cno2=$("#emp_cno2").val();


    if (fname=="")
    {
        $("#alertDiv").html("First Name cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#fname").focus();
        return false;
    }

    if (lname==""){
        $("#alertDiv").html("Last Name cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#lname").focus();
        return false;
    }

    if(emp_email=="")
    {
        $("#alertDiv").html("Email Cannot be Empty!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#user_email").focus();
        return false;
    }
    if(gender=="")
    {
        $("#alertDiv").html("Please Select your gender!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#gender").focus();
        return false;
    }
    if(dob=="")
    {
        $("#alertDiv").html("Date of Birth Cannot be Empty!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#dob").focus();
        return false;
    }
    if(nic=="")
    {
        $("#alertDiv").html("NIC Cannot be Empty!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#nic").focus();
        return false;
    }
    if(user_role=="")
    {
        $("#alertDiv").html("User Role Cannot be Empty!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#user_role").focus();
        return false;
    }
    if(cno1=="")
    {
        $("#alertDiv").html("Contact Number 1 Cannot be Empty!!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#cno1").focus();
        return false;
    }
    var patnic=/^[0-9]{9}[vVxX]$/;

    var patcno=/^\+94[0-9]{9}$/;

    var patmob=/^\+947[0-9]{8}$/;

    var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

    if(!nic.match(patnic))
    {
        $("#alertDiv").html("NIC is Invalid");
        $("#alertDiv").addClass("alert alert-danger");
        $("#nic").focus();
        return false;
    }
    if(!cno1.match(patcno))
    {
        $("#alertDiv").html("Contact Number 1 is Invalid");
        $("#alertDiv").addClass("alert alert-danger");
        $("#cno1").focus();
        return false;
    }
    if((cno2!="")&&(!cno2.match(patmob)))
    {
        $("#alertDiv").html("Contact Number 2(Mobile) is Invalid");
        $("#alertDiv").addClass("alert alert-danger");
        $("#cno2").focus();
        return false;
    }
    if(!emp_email.match(patemail))
    {
        $("#alertDiv").html("Email is Invalid");
        $("#alertDiv").addClass("alert alert-danger");
        $("#emp_email").focus();
        return false;

    }


})
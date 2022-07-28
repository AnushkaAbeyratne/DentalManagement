$(document).ready(function(){
    });

    $("addSupplier").submit(function () {

    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var user_email=$("#user_email").val();
    var dob=$("#dob").val();
    var nic=$("#nic").val();
    var cno1=$("#cno1").val();
    var cno2=$("#cno2").val();
    var user_role=$("#user_role").val();

    if (fname==""){
        $("#alertDiv1").html("First Name cannot be Empty!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#fanme").focus();
        return false;
    }

    if (lname==""){
        $("#alertDiv1").html("Last Name cannot be Empty!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#lanme").focus();
        return false;
    }

    if(user_email=="")
    {
        $("#alertDiv1").html("Email Cannot be Empty!!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#user_email").focus();
        return false;
    }
    if(dob=="")
    {
        $("#alertDiv1").html("Date of Birth Cannot be Empty!!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#dob").focus();
        return false;
    }
    if(nic=="")
    {
        $("#alertDiv1").html("NIC Cannot be Empty!!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#nic").focus();
        return false;
    }
    if(user_role=="")
    {
        $("#alertDiv1").html("User Role Cannot be Empty!!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#user_role").focus();
        return false;
    }
    if(cno1=="")
    {
        $("#alertDiv1").html("Contact Number 1 Cannot be Empty!!!");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#cno1").focus();
        return false;
    }
    var patnic=/^[0-9]{9}[vVxX]$/;

    var patcno=/^\+94[0-9]{9}$/;

    var patmob=/^\+947[0-9]{8}$/;

    var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

    if(!nic.match(patnic))
    {
        $("#alertDiv1").html("NIC is Invalid");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#nic").focus();
        return false;
    }
    if(!cno1.match(patcno))
    {
        $("#alertDiv1").html("Contact Number 1 is Invalid");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#cno1").focus();
        return false;
    }
    if((cno2!="")&&(!cno2.match(patmob)))
    {
        $("#alertDiv1").html("Contact Number 2(Mobile) is Invalid");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#cno2").focus();
        return false;
    }
    if(!user_email.match(patemail))
    {
        $("#alertDiv1").html("Email is Invalid");
        $("#alertDiv1").addClass("alert alert-danger");
        $("#user_email").focus();
        return false;

    }


})
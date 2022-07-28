$(document).ready(function () {

    $("#addPatient").submit(function () {
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var email=$("#email").val();
    var nic=$("#nic").val();
    var age=$("#age").val();
    var cno1=$("#cno1").val();
    var cno2=$("#cno2").val();
    var address=$("#address").val();

     if (fname=="")
     {
        $("#alertDiv").html("First Name cannot be Empty!!");
         $("#alertDiv").addClass("alert alert-danger");
        $("#fname").focus();
         return false;
    }
    if (lname=="")
    {
        $("#alertDiv").html("Last Name cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#lname").focus();
        return false;
    }
    if (email=="")
    {
        $("#alertDiv").html("Email Address cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#email").focus();
        return false;
    }
    if (nic=="")
    {
        $("#alertDiv").html("NIC cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#nic").focus();
        return false;
    }
    if (age=="")
    {
        $("#alertDiv").html("Age cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#age").focus();
        return false;
    }
    if (cno1=="")
    {
        $("#alertDiv").html("Contact number cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#cno1").focus();
        return false;
    }
    if (address=="")
    {
        $("#alertDiv").html("Address cannot be Empty!!");
        $("#alertDiv").addClass("alert alert-danger");
        $("#address").focus();
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
    if(!email.match(patemail))
    {
        $("#alertDiv").html("Email is Invalid");
        $("#alertDiv").addClass("alert alert-danger");
        $("#user_email").focus();
        return false;

    }



});




})
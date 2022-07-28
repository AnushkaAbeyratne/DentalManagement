$(document).ready(function(){
    // login validation///
    $("#loginform").submit(function () {

        var username = $("#username").val();
        var password = $("#password").val();

        if ((username == "") && (password == "")) {
            $("#alertmsg").html("<h6>Username and password Cannot be Empty!!!</h6>");
            $("#alertmsg").addClass("alert alert-danger");
            return false;
        }
        else {
            if (username == "") {
                $("#alertmsg").html("<h6>Username Cannot be Empty!");
                $("#alertmsg").addClass("alert alert-danger");
                $("#username").focus();
                return false;
            }
            if (password=="") {
                $("#alertmsg").html("<h6>Password Cannot be Empty!");
                $("#alertmsg").addClass("alert alert-danger");
                $("#password").focus();
                return false;
            }
            else {
                return  true;
            }

        }
    });

    // end of the login validation


// employee validation
    $("#addEmployee").submit(function () {

        var emp_title = $("#emp_title").val();
        var emp_fname = $("#emp_fname").val();
        var emp_lname = $("#emp_lname").val();
        var emp_email = $("#emp_email").val();
        var emp_nic = $("#emp_nic").val();
        var emp_dob = $("#emp_dob").val();
        var emp_cno1 = $("#emp_cno1").val();
        var emp_cno2 = $("#emp_cno2").val();

        if (emp_title == "") {
            $("#alertDiv").html("Title cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_title").focus();
            return false;
        }
        if (emp_fname == "") {
            $("#alertDiv").html("First Name cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_fname").focus();
            return false;
        }

        if (emp_lname == "") {
            $("#alertDiv").html("Last Name cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_lname").focus();
            return false;
        }

        if (emp_email == "") {
            $("#alertDiv").html("Email Cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_email").focus();
            return false;
        }
        if (emp_nic == "") {
            $("#alertDiv").html("NIC Cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_nic").focus();
            return false;
        }
        if (emp_dob >= "DOB Cannot be Empty") {
            $("#alertDiv").html("Cannot add DOB");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_dob").focus();
            return false;
        }

        if (emp_cno1 == "") {
            $("#alertDiv").html("Contact Number 1 Cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_cno1").focus();
            return false;
        }
        var patnic = /^[0-9]{9}[vVxX]$/;

        var patcno = /^\+94[0-9]{9}$/;

        var patmob = /^\+947[0-9]{8}$/;

        var patemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

        if (!emp_nic.match(patnic)) {
            $("#alertDiv").html("NIC is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#nic").focus();
            return false;
        }
        if (!emp_cno1.match(patcno)) {
            $("#alertDiv").html("Contact Number 1 is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#cno1").focus();
            return false;
        }
        if ((emp_cno2 != "") && (!emp_cno2.match(patmob))) {
            $("#alertDiv").html("Contact Number 2(Mobile) is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#cno2").focus();
            return false;
        }
        if (!emp_email.match(patemail)) {
            $("#alertDiv").html("Email is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_email").focus();
            return false;

        }
    })
    // end of employee validation


    // User validation///////////
    $("#addUsers").submit(function () {

        var emp_id = $("#emp_id").val();
        var roleId = $("#user_role_id").val();
        if (emp_id == "") {
            $("#alertDiv").html("Emp Id cannot be Empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#emp_id").focus();
            return false;
        }
        if (roleId==" ") {
            $("#alertDiv").html("Please select your user role !");
            $("#alertDiv").addClass("alert alert-danger");
            $("#user_role_id").focus();
            return false;
        }
        // return false;
    })

    // end of user validation//////

// patient validation
    $("#addPatient").submit(function () {

        var title = $("#pat_title").val();
        var fname = $("#pat_fname").val();
        var lname = $("#pat_lname").val();
        var email = $("#pat_email").val();
        var nic = $("#pat_nic").val();
        var age = $("#pat_age").val();
        var cno = $("#pat_cno").val();
        var no = $("#pat_no").val();
        var street = $("#pat_street").val();
        var city = $("#pat_city").val();


        if (title == "") {
            $("#alertDiv").html("Title cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#title").focus();
            return false;
        }
        if (fname == "") {
            $("#alertDiv").html("First Name cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#fname").focus();
            return false;
        }
        if (lname == "") {
            $("#alertDiv").html("Last Name cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#lname").focus();
            return false;
        }
        if (email == "") {
            $("#alertDiv").html("Email Address cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#email").focus();
            return false;
        }
        if (nic == "") {
            $("#alertDiv").html("NIC cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#nic").focus();
            return false;
        }
        if (age == "") {
            $("#alertDiv").html("Age cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#age").focus();
            return false;
        }
        if (cno == "") {
            $("#alertDiv").html("Contact number cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#cno1").focus();
            return false;
        }
        if (no == "") {
            $("#alertDiv").html("Address No cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#address").focus();
            return false;
        }
        if (street == "") {
            $("#alertDiv").html("Street cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#address").focus();
            return false;
        }
        if (city == "") {
            $("#alertDiv").html("City cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#address").focus();
            return false;
        }

        var patnic = /^[0-9]{9}[vVxX]$/;
        var patmob = /^\+947[0-9]{8}$/;
        var patemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

        if (!nic.match(patnic)) {
            $("#alertDiv").html("NIC is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#nic").focus();
            return false;
        }
        if (!cno.match(patcno)) {
            $("#alertDiv").html("Contact Number 1 is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#cno1").focus();
            return false;
        }
        if (!email.match(patemail)) {
            $("#alertDiv").html("Email is Invalid");
            $("#alertDiv").addClass("alert alert-danger");
            $("#user_email").focus();
            return false;
        }


    })
//  end of the patient validation////


    // schedule validation//////


    $("#addSchedule").submit(function (){

        var dentist=$("#dentist_id").val();
        var date=$("#date").val();
        var startTime=$("#startTime").val();
        var endTime=$("#endTime").val();
        var interval=$("#interval").val();


        if(dentist=="")
        {
            $("#alertDiv").html("Please select dentist!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#dentist_id").focus();
            return false;
        }
        if(date=="")
        {
            $("#alertDiv").html("Date Cannot be Empty!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#date").focus();
            return false;
        }
        if(startTime=="")
        {
            $("#alertDiv").html("Start time Cannot be Empty!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#startTime").focus();
            return false;
        }
        if(endTime=="")
        {
            $("#alertDiv").html("End time Cannot be Empty!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#endTime").focus();
            return false;
        }
        if(interval=="")
        {
            $("#alertDiv").html("Please select duration!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#interval").focus();
            return false;
        }
        if(startTime===endTime)
        {
            $("#alertDiv").html("Start time and end time Cannot be same!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#startTime").focus();
            return false;
        }
        if(startTime>endTime)
        {
            $("#alertDiv").html("Invalid Time Duration!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#startTime").focus();
            $("#timeslots").hide();
            return false;
        }
    });
    // end of the schedule validation/////


    // appointment validation //

    $("#addAppointment").submit(function () {
        var patient_id=$("#patient_id").val();
        var dentist_id=$("#dentist_id").val();
        var schedule_date=$("#schedule_date").val();
        var schedule_time=$("#schedule_time").val();
        var appointment_status=$("#appointment_status").val();
        var treatment_type=$("#treatment_type").val();

        if (patient_id=="")
        {
            $("#alertDiv").html("Please select patient!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#patient_id").focus();
            return false;
        }
        if (dentist_id=="")
        {
            $("#alertDiv").html("Please select dentist!!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#dentist_id").focus();
            return false;
        }
        if (schedule_date=="")
        {
            $("#alertDiv").html("Please select schedule date!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#schedule_date").focus();
            return false;
        }
        if (schedule_time=="")
        {
            $("#alertDiv").html("Please select schedule time!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#schedule_time").focus();
            return false;
        }
        if (appointment_status=="")
        {
            $("#alertDiv").html("Please select appointment status!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#appointment_status").focus();
            return false;
        }
        if (treatment_type=="")
        {
            $("#alertDiv").html("Please select treatment type!!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#treatment_type").focus();
            return false;
        }
    });
    // end of the appointment validation ///

    $("addSupplier").submit(function () {

        var cname = $("#cname").val();
        var ccno1 = $("#ccno1").val();
        var ccno2 = $("#ccno2").val();
        var cemail = $("#cemail").val();
        var add_no = $("#add_no").val();
        var add_street = $("#add_street").val();
        var add_city = $("#add_city").val();
        var pname = $("#pname").val();
        var pemail = $("#pemail").val();
        var pcno1 = $("#pcno1").val();
        var pcno2 = $("#pcno2").val();
        var nic = $("#nic").val();
        var position = $("#position").val();

        if (cname == "") {
            $("#alertDiv1").html("Company Name cannot be Empty!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#cname").focus();
            return false;
        }

        if (ccno1 == "") {
            $("#alertDiv1").html("Contact Number 1 cannot be Empty!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#ccno1").focus();
            return false;
        }

        if (ccno2 == "") {
            $("#alertDiv1").html("Contact Number 2 Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#ccno2").focus();
            return false;
        }
        if (cemail == "") {
            $("#alertDiv1").html("Email be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#cemail").focus();
            return false;
        }
        if (add_no == "") {
            $("#alertDiv1").html("Address no be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#add_no").focus();
            return false;
        }
        if (add_street == "") {
            $("#alertDiv1").html("Address street Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#add_street").focus();
            return false;
        }
        if (add_city == "") {
            $("#alertDiv1").html("Address city Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#add_city").focus();
            return false;
        }
        if (pname == "") {
            $("#alertDiv1").html("Person name Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pname").focus();
            return false;
        }
        if (pemail == "") {
            $("#alertDiv1").html("Person email Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pemail").focus();
            return false;
        }
        if (pcno1 == "") {
            $("#alertDiv1").html("Person Contact number 1 Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pcno1").focus();
            return false;
        }
        if (pcno2 == "") {
            $("#alertDiv1").html("Person Contact number Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pcno2").focus();
            return false;
        }
        if (nic == "") {
            $("#alertDiv1").html("NIC number Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#nic").focus();
            return false;
        }
        if (position == "") {
            $("#alertDiv1").html("Position Cannot be Empty!!!");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#position").focus();
            return false;
        }
        var patnic = /^[0-9]{9}[vVxX]$/;

        var patcno = /^\+94[0-9]{9}$/;

        var patmob = /^\+947[0-9]{8}$/;

        var patemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

        if (!nic.match(patnic)) {
            $("#alertDiv1").html("NIC is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#nic").focus();
            return false;
        }
        if (!ccno1.match(patcno)) {
            $("#alertDiv1").html("Company Contact Number 1 is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#ccno1").focus();
            return false;
        }
        if ((ccno2 != "") && (!ccno2.match(patmob))) {
            $("#alertDiv1").html("Company Contact Number 2(Mobile) is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#ccno2").focus();
            return false;
        }
        if (!pcno1.match(patcno)) {
            $("#alertDiv1").html("Person Contact Number 1 is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pcno1").focus();
            return false;
        }
        if ((pcno2 != "") && (!pcno2.match(patmob))) {
            $("#alertDiv1").html("Person Contact Number 2(Mobile) is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pcno2").focus();
            return false;
        }
        if (!cemail.match(patemail)) {
            $("#alertDiv1").html(" Company email address is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#cemail").focus();
            return false;

        }
        if (!pemail.match(patemail)) {
            $("#alertDiv1").html(" Person email address is Invalid");
            $("#alertDiv1").addClass("alert alert-danger");
            $("#pemail").focus();
            return false;

        }
    });


    $("#addGrn").submit(function () {

        var ref_id = $("#ref_id").val();
        var supplier = $("#supplier").val();
        var grn_display = $("#grn_display tr").length;

        if (ref_id == "") {
            $("#alertDiv").html("Ref Id cannot be empty!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#ref_id").focus();
            return false;
        }
        if (supplier == "") {
            $("#alertDiv").html("Please select supplier");
            $("#alertDiv").addClass("alert alert-danger");
            $("#supplier").focus();
            return false;
        }
        if (grn_display == 0) {
            $("#alertDiv").html("Table cannot be empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#grn_display").focus();
            return false;
        }
    })

    });

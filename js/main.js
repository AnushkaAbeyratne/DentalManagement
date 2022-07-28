$(document).ready(function (){

    $('#myTable').DataTable( {
        dom :'Bfrtip',
        buttons : [
            'copy', 'excel', 'pdf','csv','print'
        ],
        pageLength : 5,
        // lengthMenu: [
        //     [5,10,25,50,-1],[5,10,25,50,"All"]
        // ]
    } );

    // $(".qty").keyup(function (){
    //     alert('red');
    //     // var qty = parseFloat($("#qty").val());
    //     // var r_price = parseFloat($("#r_price").val());
    //     // var p_amount = qty * r_price;
    //     // $(".p_amount").val(p_amount);
    // })

    $("#user_role").change(function(){
        var url="../controller/employeeController.php?status=getmodule";

        var x= $("#user_role").val();
        $.post(url,{role_id:x},function(data) {

        })
    });




// user suggestion  //
    $("#emp_id").keyup(function()  {
        var emp_id = $(this).val();
        var url1 = "../controller/employeeController.php?status=searchKey";

        if (emp_id !== ""){
            $.post(url1, {emp_id:emp_id}, function(data){
                $("#searchEmp").html(data).show();
            });
        }
        else{
            $("#searchEmp").html("").show();
        }

        var url2 = "../controller/employeeController.php?status=searchEmployee";

        $.post(url2,{emp_id:emp_id},function(result){
        var title;
        if (result == null){
            $("#emp_fname").val("");
            $("#emp_email").val("");
            $("#emp_nic").val("");
        }
        else{
            if (result.emp_title==1){
                title = 'Mr.';
            }
            if (result.emp_title==2){
                title = 'Mrs.';
            }
            if (result.emp_title==3){
                title = 'Miss.';
            }
            if (result.emp_title==4){
                title = 'Dr.';
            }
            $("#emp_fname").val(title+' '+result.emp_fname+' '+result.emp_lname);
            $("#emp_email").val(result.emp_email);
            $("#emp_nic").val(result.emp_nic);
        }
        },"json");
    })

    // end of the user suggestion //


    // history suggestion //

    $("#pat_id").keyup(function() {
        var pat_id = $(this).val();
        var url = "../controller/patientController.php?status=searchKeys";
        console.log(pat_id);
        if (pat_id !== ""){
            $.post(url, {pat_id:pat_id}, function (data) {
                $("#searchPatients").html(data).show();
            })
        }else{
           $("#searchPatients").html("").show();
        }
        var url1 = "../controller/patientController.php?status=searchPatient";
        $.post(url1, {pat_id:pat_id}, function(result) {
            console.log(result);
            if (result == null){
                $("#pat_name").val("");
            }
            else{
                $("#pat_name").val(result.patient_fname+' '+result.patient_lname);
            }
        },"json");
    });

    // end of the history suggestion //


    ///   schedule  ////
    $("#interval").change(function(){
        var url="../controller/scheduleController.php?status=getslots";

        var x= $("#interval").val();
        $.post(url,{schedule_id:x},function(data){
            $("#getslots").html(data).show();
        });
    });

    function addMinutes(time, minsToAdd) {
        function D(J) {
            return (J < 10 ? '0' : '') + J;
        };
        var piece = time.split(':');
        var mins = piece[0] * 60 + +piece[1] + +minsToAdd;
        return D(mins % (24 * 60) / 60 | 0) + ':' + D(mins % 60);
    }

    function subMinutes(time, minsToAdd) {
        function D(J) {
            return (J < 10 ? '0' : '') + J;
        };
        var piece = time.split(':');
        var mins = piece[0] * 60 + +piece[1] + -minsToAdd;
        return D(mins % (24 * 60) / 60 | 0) + ':' + D(mins % 60);
    }

    $("#interval").change(function () {
        var startTime = $("#startTime").val();
        var endTime = $("#endTime").val();
        var interval = $("#interval").val();
        if (startTime<endTime){
            var newendTime = subMinutes(endTime, interval);
            getTimeSlots(startTime, newendTime, interval);
        }
        });

    function getTimeSlots(startTime, endTime, interval) {
        var timeslots = [startTime];

        while (startTime < endTime) {
            startTime = addMinutes(startTime, interval);
            timeslots.push(startTime);
        }
        $.each(timeslots, function (index, value) {
            $('#timeslots').append(value + '<br>');
        })
     }

    $("#date").change(function () {
        $("#alertDiv").removeClass('alert').empty()
        var date = $("#date").val();
        var dentist_id = $("#dentist_id").val();

        $.post('../controller/scheduleController.php', {
            status: 'checkDentistByDate',
            date: date,
            dentist_id: dentist_id
        }, function (response) {
            if (response==null||response==""){
                $("#alertDiv").removeClass('alert').empty()
            }else {
                $("#alertDiv").html(response).addClass("alert alert-danger")
            }
        });

    });
    /// end of the schedule////

})
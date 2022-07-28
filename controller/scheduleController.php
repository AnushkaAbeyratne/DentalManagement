<?php
if(isset($_REQUEST["status"]))
{
    include '../model/schedule_model.php';
    $scheduleObj = new Schedule();

    $status=$_REQUEST["status"];
    switch ($status) {

        case "add_schedule":

            $date = $_POST["date"];
            $startTime = $_POST["startTime"];
            $endTime = $_POST["endTime"];
            $interval = $_POST["interval"];
            $dentist = $_POST["dentist"];

            $timeslots=array();
            $startTime=strtotime($startTime);
            $endTime=strtotime($endTime);
            $minutes=$interval*60;
            $newEndTime = $endTime-$minutes;
            $minutes=$interval*60;
            while ($startTime<=$newEndTime ){
                $timeslots[]=date('g:i', $startTime);
                $startTime+=$minutes;
            }
            $duration = gmdate('H:i:s', $interval * 60);

            try {
                if ($dentist == "") {
                    throw new Exception("Dentist Name Cannot Be Empty!");
                }
                if ($date == "") {
                    throw new Exception("Date Cannot Be Empty!");
                }
                if ($startTime == "") {
                    throw new Exception("Start time Cannot Be Empty!");
                }
                if ($endTime == "") {
                    throw new Exception("End time Cannot Be Empty!");
                }
                if ($interval == "") {
                    throw new Exception("Duration Cannot Be Empty!");
                }

                $scheduleId= $scheduleObj->addSchedule($date, $_POST["startTime"],$_POST["endTime"],$duration,$dentist);

               if ($scheduleId > 0) {
                    foreach ($timeslots as $time){
                        $scheduleObj->addTimeSlot($scheduleId, date('H:i:s', strtotime($time)));
                    }
                    $msg="Successfully Inserted Schedule";
                    $msg=base64_encode($msg);
                    ?>
                   <script>
                       window.location="../view/view_schedule.php?msg=<?php echo $msg ?>"
                   </script>
                   <?php
               }
            }
            catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location="../view/add_schedule.php?msg=<?php echo $msg ?>"
                </script>
                <?php
            }
            break;

        case "get_schedules":
            $empId = $_POST['employee_emp_id'];
            $result = $scheduleObj->getDateByDentist($empId);
            $output = "<option value=''>---</option>";
            while($row = $result->fetch_assoc()){
                $output .= "<option value='" . $row['schedule_date'] . "'>" . $row['schedule_date'] . "</option>";
            }
            echo $output;
            break;

        case "get_time":
            $scheduleDate = $_POST['schedule_date'];
            $dentist_id = $_POST['dentist_id'];
            $result = $scheduleObj->getTimeByDate($scheduleDate,$dentist_id);
            $output = "<option value=''>---</option>";
            while($row = $result->fetch_assoc()){
                $output .= "<option value='" . $row['timeslot_id'] . "'>" . $row['timeslot_start_time'] . "</option>";
            }
            echo $output;
            break;

        case "delete_schedule":
            $scheduleId = $_POST['scheduleId'];
            $scheduleObj->deleteSchedule($scheduleId);
            echo $scheduleId;
            break;

        case "checkDentistByDate":
            $scheduleId = $_POST['dentist_id'];
            $scheduleDate = $_POST['date'];
            $scheduleResult=$scheduleObj->checkDentistByDates($scheduleId,$scheduleDate);
            if ($scheduleResult===false){
                $msg = "Already Date Taken!";
                echo $msg;
            }
            break;
    }

}


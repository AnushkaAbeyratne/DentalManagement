<?php
include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();

class Schedule{

        function addSchedule($date,$start_time,$end_time,$duration,$employee_emp_id){
            $con=$GLOBALS["con"];
            $sql="INSERT INTO schedule(schedule_date,start_time,end_time,duration,employee_emp_id)
                    VALUES ('$date','$start_time','$end_time','$duration','$employee_emp_id')";
            $result=$con->query($sql);
            $scheduleId=$con->insert_id;
            return $scheduleId;
        }

         function getAllSchedule()
        {
            date_default_timezone_set("Asia/Colombo");
            $date = date("Y-m-d");
            $con=$GLOBALS["con"];
            $sql="SELECT * FROM schedule s, employee e WHERE s.employee_emp_id=e.emp_id AND s.schedule_date>='$date' AND s.schedule_deleted='0'";
            $result = $con->query($sql);
            return $result;
        }

        function addTimeSlot($scheduleId, $timeslot){
            $con=$GLOBALS["con"];
            $sql="INSERT INTO timeslot(timeslot_start_time,schedule_schedule_id) VALUES ('$timeslot', $scheduleId)";
            $result=$con->query($sql);
            return $result;

        }

        function deleteSchedule($scheduleId){
            $con=$GLOBALS["con"];
            $sql="UPDATE schedule,appointment,timeslot SET schedule.schedule_deleted=1,appointment.appointment_status=0,
                   timeslot.status=2 WHERE schedule_id='$scheduleId'";
            $result=$con->query($sql);
            return $result;
        }

        function getAllDentist()
        {
            $con=$GLOBALS["con"];
            $sql="SELECT * FROM login l, role r, employee e WHERE l.employee_emp_id=e.emp_id AND l.role_role_id=r.role_id AND r.role_id='3'";
            $result=$con->query($sql);
            return $result;
        }

        function getDateByDentist($empId)
        {
            date_default_timezone_set("Asia/Colombo");
            $date = date("Y-m-d");
            $con=$GLOBALS["con"];
            $sql="SELECT * FROM schedule WHERE employee_emp_id='$empId' AND schedule_date>='$date' AND schedule_deleted=0 GROUP BY schedule_date";
            $result=$con->query($sql);
            return $result;
        }

        function getTimeByDate($scheduleDate,$empId)
        {
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM schedule s, timeslot t WHERE s.schedule_id=t.schedule_schedule_id AND s.schedule_date='$scheduleDate' 
                        AND s.employee_emp_id='$empId' AND t.status=0";
            $result = $con->query($sql);
            return $result;
        }

        function checkDentistByDates($empId,$scheduleDate){
            $con=$GLOBALS["con"];
            $sql="SELECT 1 FROM schedule WHERE employee_emp_id='$empId' AND schedule_date='$scheduleDate'";
            $result= $con->query($sql);
            if($result->num_rows>0)
            {
                return false;
            }else {
                return true;
            }
        }
    function getScheduleCount($from,$to)
    {
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d");
        $con = $GLOBALS["con"];
        $sql = "SELECT COUNT(schedule_id) as schedulecount ,e.emp_fname,e.emp_lname FROM schedule s,employee e WHERE s.employee_emp_id=e.emp_id 
                AND s.schedule_date BETWEEN '$from' AND '$to' GROUP BY s.employee_emp_id";
        $result = $con->query($sql);
        return $result;
    }
//SELECT * FROM appointment WHERE appointment_date BETWEEN ADDDATE('2021-04-29',INTERVAL 1 DAY)
//AND ADDDATE('2021-04-29',INTERVAL 8 DAY)
//
//
//UPCOMING WEEK APPOINTMENT
//
//
//SELECT * FROM appointment WHERE appointment_date BETWEEN ADDDATE(LAST_DAY(SUBDATE('2021-06-01', INTERVAL 2 MONTH)), INTERVAL 1 DAY) AND
//LAST_DAY(SUBDATE('2021-06-01', INTERVAL 1 MONTH))
//
//last month

}

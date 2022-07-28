DROP TABLE IF EXISTS appointment;

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_status` varchar(20) NOT NULL DEFAULT '1' COMMENT 'confirmed-1\r\ndeleted-0\r\n',
  `patient_patient_id` varchar(11) NOT NULL,
  `timeslot_timeslot_id` int(11) NOT NULL,
  `treatment_treatment_id` int(11) NOT NULL,
  `employee_emp_id` varchar(10) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `employee_emp_id` (`employee_emp_id`),
  KEY `time_time_id` (`timeslot_timeslot_id`),
  KEY `treatment_treatment_id` (`treatment_treatment_id`),
  KEY `patient_fk` (`patient_patient_id`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`timeslot_timeslot_id`) REFERENCES `timeslot` (`timeslot_id`),
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`treatment_treatment_id`) REFERENCES `treatment` (`treatment_id`),
  CONSTRAINT `patient_fk` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointment VALUES("1","1""2021-04-29","2021-04-29""0","0""PAT00006","PAT00006""102","102""2","2""EMP00003""EMP00003"),
("2","2""2021-04-29","2021-04-29""0","0""PAT00005","PAT00005""103","103""12","12""EMP00003""EMP00003"),
("3","3""2021-04-30","2021-04-30""0","0""PAT00001","PAT00001""107","107""3","3""EMP00002""EMP00002"),
("4","4""2021-05-02","2021-05-02""0","0""PAT00006","PAT00006""126","126""3","3""EMP00002""EMP00002"),
("5","5""2021-05-02","2021-05-02""0","0""PAT00007","PAT00007""127","127""1","1""EMP00002""EMP00002"),
("6","6""2021-05-05","2021-05-05""0","0""PAT00002","PAT00002""20","20""6","6""EMP00002""EMP00002"),
("7","7""2021-05-06","2021-05-06""1","1""PAT00002","PAT00002""2","2""4","4""EMP00002""EMP00002"),
("8","8""2021-05-04","2021-05-04""1","1""PAT00005","PAT00005""138","138""5","5""EMP00003""EMP00003"),
("9","9""2021-05-06","2021-05-06""1","1""PAT00006","PAT00006""4","4""8","8""EMP00002""EMP00002"),
("10","10""2021-05-05","2021-05-05""1","1""PAT00006","PAT00006""146","146""5","5""EMP00003""EMP00003"),
("11","11""2021-05-05","2021-05-05""1","1""PAT00005","PAT00005""147","147""11","11""EMP00003""EMP00003");



DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `emp_id` varchar(10) NOT NULL,
  `emp_title` int(11) NOT NULL,
  `emp_fname` varchar(60) NOT NULL,
  `emp_lname` varchar(60) NOT NULL,
  `emp_image` varchar(45) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_gender` varchar(1) NOT NULL,
  `emp_email` varchar(45) NOT NULL,
  `emp_nic` varchar(45) NOT NULL,
  `emp_cno1` varchar(15) NOT NULL,
  `emp_cno2` varchar(15) NOT NULL,
  `emp_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO employee VALUES("EMP00001","EMP00001""3","3""Anushka","Anushka""Abeyratne","Abeyratne""EMP00001_1619604589.jpg","EMP00001_1619604589.jpg""1993-01-31","1993-01-31""1","1""anu@gmail.com","anu@gmail.com""935310067V","935310067V""+94112390784","+94112390784""+94712647365","+94712647365""1""1"),
("EMP00002","EMP00002""4","4""Sanuka","Sanuka""Fernando","Fernando""EMP00002_1619604629.jpg","EMP00002_1619604629.jpg""2021-04-30","2021-04-30""0","0""sanu@hotmail.com","sanu@hotmail.com""954527897V","954527897V""+94112789674","+94112789674""+94712674356","+94712674356""1""1"),
("EMP00003","EMP00003""4","4""Ayon","Ayon""Ashmitha","Ashmitha""EMP00003_1619618755.jpg","EMP00003_1619618755.jpg""2018-10-17","2018-10-17""0","0""ayu@yahoo.com","ayu@yahoo.com""994527897V","994527897V""+94112390786","+94112390786""+94712390784","+94712390784""1""1"),
("EMP00004","EMP00004""1","1""Madhawa","Madhawa""Wijesekara","Wijesekara""EMP00004_1619618831.jpg","EMP00004_1619618831.jpg""1976-04-25","1976-04-25""0","0""mad@gmail.com","mad@gmail.com""764634646V","764634646V""+94112674356","+94112674356""+94712390784","+94712390784""1""1"),
("EMP00005","EMP00005""2","2""Damitha","Damitha""Herath","Herath""EMP00005_1619618934.jpg","EMP00005_1619618934.jpg""1995-09-16","1995-09-16""1","1""damitha@gmail.com","damitha@gmail.com""952130579V","952130579V""+94112390000","+94112390000""+94712674098","+94712674098""1""1");



DROP TABLE IF EXISTS grn;

CREATE TABLE `grn` (
  `grn_id` varchar(11) NOT NULL,
  `ref_id` varchar(11) NOT NULL,
  `total` float NOT NULL,
  `receive_date` date NOT NULL,
  `supplier_sup_id` int(11) NOT NULL,
  PRIMARY KEY (`grn_id`),
  KEY `supplier_sup_id` (`supplier_sup_id`),
  CONSTRAINT `grn_ibfk_1` FOREIGN KEY (`supplier_sup_id`) REFERENCES `supplier` (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO grn VALUES("GRN00001","GRN00001""A123","A123""2000","2000""2021-04-30","2021-04-30""1""1"),
("GRN00002","GRN00002""B12389","B12389""1000","1000""2021-05-03","2021-05-03""2""2"),
("GRN00003","GRN00003""D890789","D890789""1800","1800""2021-05-05","2021-05-05""2""2");



DROP TABLE IF EXISTS history;

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `history_date` date NOT NULL,
  `history_comment` varchar(500) NOT NULL,
  `employee_emp_id` varchar(10) NOT NULL,
  `patient_patient_id` varchar(10) NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `patient_patient_id` (`patient_patient_id`),
  KEY `employee_emp_id` (`employee_emp_id`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `history_ibfk_2` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO history VALUES("1","1""2021-04-28","2021-04-28""Cefaclor 250-mg","Cefaclor 250-mg""EMP00001","EMP00001""PAT00001""PAT00001"),
("2","2""2021-05-05","2021-05-05""dshacdgjsalvcs","dshacdgjsalvcs""EMP00001","EMP00001""PAT00001""PAT00001"),
("3","3""2021-05-05","2021-05-05""gvdjavkjvdljavfhwvefyugeuyfew","gvdjavkjvdljavfhwvefyugeuyfew""EMP00001","EMP00001""PAT00002""PAT00002");



DROP TABLE IF EXISTS invoice;

CREATE TABLE `invoice` (
  `invoice_id` varchar(20) NOT NULL,
  `invoice_time` time NOT NULL,
  `invoice_date` date NOT NULL,
  `employee_emp_id` varchar(45) NOT NULL,
  `invoice_total` decimal(10,2) NOT NULL,
  `patient_patient_id` varchar(20) NOT NULL,
  `appointment_appointment_id` int(11) NOT NULL,
  `treatment_treatment_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `employee_emp_id` (`employee_emp_id`),
  KEY `appointment_appointment_id` (`appointment_appointment_id`),
  KEY `patient_patient_id` (`patient_patient_id`),
  KEY `treatment_treatment_id` (`treatment_treatment_id`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`appointment_appointment_id`) REFERENCES `appointment` (`appointment_id`),
  CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`treatment_treatment_id`) REFERENCES `treatment` (`treatment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO invoice VALUES("INV00001","INV00001""00:44:43","00:44:43""2021-05-04","2021-05-04""EMP00003","EMP00003""620.00","620.00""PAT00005","PAT00005""8","8""5""5"),
("INV00002","INV00002""00:47:27","00:47:27""2021-05-04","2021-05-04""EMP00003","EMP00003""770.00","770.00""PAT00005","PAT00005""8","8""5""5"),
("INV00003","INV00003""00:48:37","00:48:37""2021-05-04","2021-05-04""EMP00003","EMP00003""710.00","710.00""PAT00005","PAT00005""8","8""5""5"),
("INV00004","INV00004""01:44:35","01:44:35""2021-05-04","2021-05-04""EMP00003","EMP00003""650.00","650.00""PAT00005","PAT00005""8","8""5""5"),
("INV00005","INV00005""18:38:28","18:38:28""2021-05-05","2021-05-05""EMP00003","EMP00003""3620.00","3620.00""PAT00006","PAT00006""10","10""5""5"),
("INV00006","INV00006""18:39:00","18:39:00""2021-05-05","2021-05-05""EMP00003","EMP00003""1700.00","1700.00""PAT00006","PAT00006""10","10""5""5"),
("INV00007","INV00007""18:40:02","18:40:02""2021-05-05","2021-05-05""EMP00003","EMP00003""1700.00","1700.00""PAT00006","PAT00006""10","10""5""5"),
("INV00008","INV00008""18:49:26","18:49:26""2021-05-05","2021-05-05""EMP00003","EMP00003""1700.00","1700.00""PAT00006","PAT00006""10","10""5""5"),
("INV00009","INV00009""18:52:30","18:52:30""2021-05-05","2021-05-05""EMP00003","EMP00003""1700.00","1700.00""PAT00006","PAT00006""10","10""5""5"),
("INV00010","INV00010""18:54:09","18:54:09""2021-05-05","2021-05-05""EMP00003","EMP00003""1700.00","1700.00""PAT00006","PAT00006""10","10""5""5"),
("INV00011","INV00011""19:14:09","19:14:09""2021-05-05","2021-05-05""EMP00003","EMP00003""560.00","560.00""PAT00006","PAT00006""10","10""5""5"),
("INV00012","INV00012""09:13:26","09:13:26""2021-05-06","2021-05-06""EMP00002","EMP00002""2120.00","2120.00""PAT00006","PAT00006""9","9""8""8");



DROP TABLE IF EXISTS invoice_has_medicine_item;

CREATE TABLE `invoice_has_medicine_item` (
  `Invoice_invoice_id` varchar(20) NOT NULL,
  `medicine_item_item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Invoice_invoice_id`,`medicine_item_item_id`),
  KEY `medicine_item_item_id` (`medicine_item_item_id`),
  CONSTRAINT `invoice_has_medicine_item_ibfk_1` FOREIGN KEY (`medicine_item_item_id`) REFERENCES `medicine_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO invoice_has_medicine_item VALUES("INV00001","INV00001""1","1""1","1""120.00","120.00""120.00""120.00"),
("INV00002","INV00002""1","1""2","2""120.00","120.00""240.00""240.00"),
("INV00002","INV00002""2","2""1","1""30.00","30.00""30.00""30.00"),
("INV00003","INV00003""1","1""1","1""120.00","120.00""120.00""120.00"),
("INV00003","INV00003""2","2""3","3""30.00","30.00""90.00""90.00"),
("INV00004","INV00004""1","1""1","1""120.00","120.00""120.00""120.00"),
("INV00004","INV00004""2","2""1","1""30.00","30.00""30.00""30.00"),
("INV00005","INV00005""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00006","INV00006""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00007","INV00007""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00008","INV00008""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00009","INV00009""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00010","INV00010""1","1""10","10""120.00","120.00""1200.00""1200.00"),
("INV00011","INV00011""2","2""2","2""30.00","30.00""60.00""60.00"),
("INV00012","INV00012""1","1""1","1""120.00","120.00""120.00""120.00");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(60) NOT NULL,
  `login_password` varchar(60) NOT NULL,
  `login_status` tinyint(4) NOT NULL DEFAULT 1,
  `role_role_id` int(11) NOT NULL,
  `employee_emp_id` varchar(10) NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `fk_role_id` (`role_role_id`),
  KEY `fk_emp_id` (`employee_emp_id`),
  CONSTRAINT `fk_emp_id` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `fk_role_id` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO login VALUES("1","1""anu@gmail.com","anu@gmail.com""fa0afff30dead995c1714dd4841815ad14f84d4a","fa0afff30dead995c1714dd4841815ad14f84d4a""1","1""1","1""EMP00001""EMP00001"),
("2","2""sanu@hotmail.com","sanu@hotmail.com""a8473a21f970f9f3a8be2a77e124f68f81c6409b","a8473a21f970f9f3a8be2a77e124f68f81c6409b""1","1""3","3""EMP00002""EMP00002"),
("3","3""ayu@yahoo.com","ayu@yahoo.com""abfb40f0f656cc2ad6d549b6878b3b69743fa6d2","abfb40f0f656cc2ad6d549b6878b3b69743fa6d2""1","1""3","3""EMP00003""EMP00003"),
("4","4""mad@gmail.com","mad@gmail.com""b4235ada15dfbd12d382cbc6a5776474d4b96459","b4235ada15dfbd12d382cbc6a5776474d4b96459""1","1""4","4""EMP00004""EMP00004"),
("5","5""damitha@gmail.com","damitha@gmail.com""e22f05aec917fa1ae4f17bb7e6a6f56a0c4ba523","e22f05aec917fa1ae4f17bb7e6a6f56a0c4ba523""1","1""2","2""EMP00005""EMP00005");



DROP TABLE IF EXISTS medicine_item;

CREATE TABLE `medicine_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `unit_unit_id` int(11) NOT NULL,
  `supplier_sup_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`item_id`),
  KEY `unit_unit_id` (`unit_unit_id`),
  KEY `supplier_sup_id` (`supplier_sup_id`),
  CONSTRAINT `medicine_item_ibfk_1` FOREIGN KEY (`unit_unit_id`) REFERENCES `unit` (`unit_id`),
  CONSTRAINT `medicine_item_ibfk_2` FOREIGN KEY (`supplier_sup_id`) REFERENCES `supplier` (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO medicine_item VALUES("1","1""Cotton","Cotton""2","2""1","1""1""1"),
("2","2""syringe","syringe""2","2""2","2""1""1");



DROP TABLE IF EXISTS module;

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `module_image` text CHARACTER SET latin1 NOT NULL,
  `module_url` text CHARACTER SET latin1 NOT NULL,
  `module_status` int(11) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO module VALUES("1","1""User Management","User Management""user.png","user.png""emp_Mgt.php","emp_Mgt.php""1""1"),
("2","2""Patient Management","Patient Management""group.png","group.png""patient_mgt.php","patient_mgt.php""1""1"),
("3","3""Schedule Management","Schedule Management""calender.png","calender.png""view_schedule.php","view_schedule.php""1""1"),
("4","4""Appointment Management","Appointment Management""sthetiscope.png","sthetiscope.png""view_appointment.php","view_appointment.php""1""1"),
("5","5""Inventory Management","Inventory Management""hospital.png","hospital.png""view_inventory.php","view_inventory.php""1""1"),
("6","6""Purchase Management","Purchase Management""truck.png","truck.png""purchase_mgt.php","purchase_mgt.php""1""1"),
("7","7""Payment Management","Payment Management""money.png","money.png""payment.php","payment.php""1""1"),
("8","8""Report Management","Report Management""seo-report.png","seo-report.png""reports.php","reports.php""1""1"),
("9","9""Backup Management","Backup Management""server.png","server.png""backup.php","backup.php""1""1");



DROP TABLE IF EXISTS module_role;

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`module_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO module_role VALUES("1","1""1""1"),
("2","2""1""1"),
("2","2""2""2"),
("2","2""3""3"),
("2","2""5""5"),
("3","3""1""1"),
("3","3""2""2"),
("3","3""3""3"),
("3","3""5""5"),
("4","4""1""1"),
("4","4""2""2"),
("4","4""3""3"),
("4","4""4""4"),
("4","4""5""5"),
("5","5""1""1"),
("5","5""5""5"),
("6","6""1""1"),
("6","6""4""4"),
("7","7""1""1"),
("7","7""4""4"),
("8","8""1""1"),
("9","9""1""1");



DROP TABLE IF EXISTS patient;

CREATE TABLE `patient` (
  `patient_id` varchar(10) NOT NULL,
  `patient_title` varchar(45) NOT NULL,
  `patient_fname` varchar(60) NOT NULL,
  `patient_lname` varchar(60) NOT NULL,
  `patient_gender` varchar(1) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `patient_email` varchar(45) NOT NULL,
  `patient_cno` varchar(15) NOT NULL,
  `patient_no` varchar(45) NOT NULL,
  `patient_street` varchar(45) NOT NULL,
  `patient_city` varchar(45) NOT NULL,
  `patient_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO patient VALUES("PAT00001","PAT00001""2","2""Nirashani","Nirashani""Abeykoon","Abeykoon""0","0""30","30""nira@gmail.com","nira@gmail.com""+94713562123","+94713562123""72","72""horana rd","horana rd""horana","horana""1""1"),
("PAT00002","PAT00002""3","3""Naida Moreno","Naida Moreno""Steven Hutchinson","Steven Hutchinson""1","1""35","35""heqe@mailinator.com","heqe@mailinator.com""+94713425637","+94713425637""78","78""Id impedit non inve","Id impedit non inve""Et sit ab unde sunt ","Et sit ab unde sunt ""1""1"),
("PAT00003","PAT00003""1","1""Connor Vinson","Connor Vinson""Lacota English","Lacota English""0","0""43","43""rohatyjequ@mailinator.com","rohatyjequ@mailinator.com""+94713562123","+94713562123""124/A","124/A""Eu proident sint iu","Eu proident sint iu""Necessitatibus omnis","Necessitatibus omnis""1""1"),
("PAT00004","PAT00004""2","2""roshini","roshini""hasitha","hasitha""0","0""23","23""rosh@gmail.com","rosh@gmail.com""+94713562735","+94713562735""65/A","65/A""rabukkana road","rabukkana road""rabukkana","rabukkana""1""1"),
("PAT00005","PAT00005""2","2""lakshini","lakshini""samrasinghe","samrasinghe""0","0""30","30""lak@hotmail.com","lak@hotmail.com""+94713562735","+94713562735""124/A","124/A""horana rd","horana rd""horana","horana""1""1"),
("PAT00006","PAT00006""1","1""Yasiru","Yasiru""Chanaka","Chanaka""0","0""30","30""yash@gmail.com","yash@gmail.com""+94713562735","+94713562735""124/A","124/A""piliyandala rd","piliyandala rd""piliyandala","piliyandala""1""1"),
("PAT00007","PAT00007""2","2""Raveeni","Raveeni""Samaranayake","Samaranayake""0","0""30","30""ravi@gmail.com","ravi@gmail.com""+94713562123","+94713562123""72","72""alubomulla rd","alubomulla rd""panadura","panadura""1""1");



DROP TABLE IF EXISTS role;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  `role_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO role VALUES("1","1""Admin","Admin""1""1"),
("2","2""Receptionist","Receptionist""1""1"),
("3","3""Dentist","Dentist""1""1"),
("4","4""Cashier","Cashier""1""1"),
("5","5""Nurse","Nurse""1""1"),
("6","6""Cleaner","Cleaner""1""1");



DROP TABLE IF EXISTS schedule;

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_date` date NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `schedule_deleted` int(11) NOT NULL DEFAULT 0 COMMENT 'deleted-1\r\nnot deleted-0',
  `employee_emp_id` varchar(10) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `employee_emp_id` (`employee_emp_id`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO schedule VALUES("1","1""2021-04-29","2021-04-29""19:00","19:00""21:00","21:00""00:30:00","00:30:00""1","1""EMP00003""EMP00003"),
("2","2""2021-04-30","2021-04-30""15:00","15:00""17:00","17:00""00:20:00","00:20:00""1","1""EMP00002""EMP00002"),
("3","3""2021-05-02","2021-05-02""15:15","15:15""18:15","18:15""01:00:00","01:00:00""1","1""EMP00003""EMP00003"),
("4","4""2021-05-06","2021-05-06""15:30","15:30""17:30","17:30""01:00:00","01:00:00""1","1""EMP00002""EMP00002"),
("5","5""2021-05-03","2021-05-03""14:30","14:30""16:30","16:30""00:20:00","00:20:00""1","1""EMP00003""EMP00003"),
("6","6""2021-05-02","2021-05-02""16:00","16:00""18:00","18:00""00:30:00","00:30:00""1","1""EMP00002""EMP00002"),
("7","7""2021-05-07","2021-05-07""21:46","21:46""18:44","18:44""00:30:00","00:30:00""0","0""EMP00002""EMP00002"),
("8","8""2021-05-20","2021-05-20""18:00","18:00""19:00","19:00""00:30:00","00:30:00""0","0""EMP00003""EMP00003"),
("9","9""2021-05-05","2021-05-05""21:20","21:20""19:20","19:20""00:30:00","00:30:00""0","0""EMP00002""EMP00002"),
("10","10""2021-05-13","2021-05-13""20:20","20:20""23:20","23:20""00:30:00","00:30:00""0","0""EMP00002""EMP00002"),
("11","11""2021-05-21","2021-05-21""03:20","03:20""01:20","01:20""00:30:00","00:30:00""0","0""EMP00003""EMP00003"),
("12","12""2021-05-04","2021-05-04""10:30","10:30""12:30","12:30""00:20:00","00:20:00""0","0""EMP00003""EMP00003"),
("13","13""2021-05-07","2021-05-07""17:00","17:00""19:00","19:00""01:00:00","01:00:00""0","0""EMP00003""EMP00003"),
("14","14""2021-05-05","2021-05-05""18:30","18:30""20:30","20:30""00:30:00","00:30:00""0","0""EMP00003""EMP00003");



DROP TABLE IF EXISTS stock;

CREATE TABLE `stock` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `receive_qty` int(11) NOT NULL,
  `current_qty` int(11) NOT NULL,
  `receive_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `receive_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `stock_paid_amount` decimal(10,2) NOT NULL,
  `stock_status` int(11) NOT NULL DEFAULT 1,
  `medicine_item_item_id` int(11) NOT NULL,
  `grn_grn_id` varchar(11) NOT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `grn_grn_id` (`grn_grn_id`),
  KEY `medicine_item_item_id` (`medicine_item_item_id`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`grn_grn_id`) REFERENCES `grn` (`grn_id`),
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`medicine_item_item_id`) REFERENCES `medicine_item` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO stock VALUES("1","1""20","20""0","0""2021-04-30","2021-04-30""2021-09-03","2021-09-03""100.00","100.00""120.00","120.00""2000.00","2000.00""0","0""1","1""GRN00001""GRN00001"),
("2","2""50","50""48","48""2021-05-03","2021-05-03""2022-05-27","2022-05-27""20.00","20.00""30.00","30.00""1000.00","1000.00""1","1""2","2""GRN00002""GRN00002"),
("3","3""30","30""29","29""2021-05-05","2021-05-05""2023-04-01","2023-04-01""50.00","50.00""55.00","55.00""1500.00","1500.00""1","1""1","1""GRN00003""GRN00003"),
("4","4""30","30""30","30""2021-05-05","2021-05-05""2023-04-01","2023-04-01""10.00","10.00""20.00","20.00""300.00","300.00""1","1""2","2""GRN00003""GRN00003");



DROP TABLE IF EXISTS supplier;

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `com_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `com_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `com_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `address_no` varchar(20) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `person_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `person_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `person_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `person_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nic` varchar(12) CHARACTER SET latin1 NOT NULL,
  `positionn` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO supplier VALUES("1","1""ABC(Pvt)Ltd","ABC(Pvt)Ltd""+94112563080","+94112563080""+94713728980","+94713728980""ABC@gmail.com","ABC@gmail.com""","""","""","""Kasun wijewardena","Kasun wijewardena""kasun@abc.com","kasun@abc.com""+94112563999","+94112563999""+94112563999","+94112563999""867537657V","867537657V""Supplier","Supplier""1""1"),
("2","2""Crown(Pvt)Ltd","Crown(Pvt)Ltd""+94112563872","+94112563872""+94713728947","+94713728947""crown@yahoo.com","crown@yahoo.com""","""","""","""Lakshan Perera","Lakshan Perera""lakshan@crown.com","lakshan@crown.com""+94116253090","+94116253090""+94116253090","+94116253090""935096067V","935096067V"" Manager"," Manager""1""1"),
("3","3""Denta(Pvt)Ltd","Denta(Pvt)Ltd""+94111234000","+94111234000""+94713728947","+94713728947""Denta@gmail.com","Denta@gmail.com""","""","""","""Mihira Fernando","Mihira Fernando""mihira@denta.com","mihira@denta.com""+94112563090","+94112563090""+94112563090","+94112563090""806746328V","806746328V""Supplier Manager","Supplier Manager""1""1"),
("4","4""Dentures(Pvt)Ltd","Dentures(Pvt)Ltd""+941125896741","+941125896741""+947137096453","+947137096453""den@gmail.com","den@gmail.com""","""","""","""yashan alwis","yashan alwis""yash@gmail.com","yash@gmail.com""+94112560975","+94112560975""+94112560975","+94112560975""935078934V","935078934V""Supplier Manager","Supplier Manager""1""1"),
("5","5""Bfs(Pvt)Ltd","Bfs(Pvt)Ltd""","""+941125639876","+941125639876""+94713728876","+94713728876""bfs@gmail.com","bfs@gmail.com""72/A","72/A""pannala rd","pannala rd""colombo","colombo""Sanjeewa Perera","Sanjeewa Perera""sanjeewa@gmail.com","sanjeewa@gmail.com""+94112569876","+94112569876""+94112569876","+94112569876""935296786V","935296786V""1""1"),
("6","6""Alpha(Pvt)Ltd","Alpha(Pvt)Ltd""+941125638729","+941125638729""+94711234000","+94711234000""alpha@yahoo.com","alpha@yahoo.com""180/c","180/c""kirulapana rd","kirulapana rd""kirulapana","kirulapana""Ashani Mendis","Ashani Mendis""ashani@yahoo.com","ashani@yahoo.com""+94112563090","+94112563090""+94112563090","+94112563090""867537657V","867537657V""Manager","Manager""1""1"),
("7","7""Trop(Pvt)Ltd","Trop(Pvt)Ltd""+941125630000","+941125630000""+947137280000","+947137280000""trop@gmail.com","trop@gmail.com""80","80""padukka rd","padukka rd""padukka","padukka""Niroma Deerasekara","Niroma Deerasekara""niro@gmail.com","niro@gmail.com""+9411898980909","+9411898980909""+9411898980909","+9411898980909""935096067V","935096067V"" Manager"," Manager""1""1");



DROP TABLE IF EXISTS timeslot;

CREATE TABLE `timeslot` (
  `timeslot_id` int(11) NOT NULL AUTO_INCREMENT,
  `timeslot_start_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'booked - 1\r\ncancel - 2\r\nnot booked-0',
  `schedule_schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`timeslot_id`),
  KEY `schedule_schedule_id` (`schedule_schedule_id`),
  CONSTRAINT `timeslot_ibfk_1` FOREIGN KEY (`schedule_schedule_id`) REFERENCES `schedule` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4;

INSERT INTO timeslot VALUES("1","1""01:40:00","01:40:00""1","1""4""4"),
("2","2""02:25:00","02:25:00""1","1""4""4"),
("3","3""03:10:00","03:10:00""1","1""4""4"),
("4","4""03:55:00","03:55:00""1","1""4""4"),
("5","5""04:40:00","04:40:00""0","0""4""4"),
("6","6""04:00:00","04:00:00""2","2""5""5"),
("7","7""04:30:00","04:30:00""2","2""5""5"),
("8","8""05:00:00","05:00:00""2","2""5""5"),
("9","9""04:00:00","04:00:00""2","2""6""6"),
("10","10""04:45:00","04:45:00""2","2""6""6"),
("11","11""05:30:00","05:30:00""2","2""6""6"),
("12","12""01:00:00","01:00:00""2","2""7""7"),
("13","13""01:30:00","01:30:00""2","2""7""7"),
("14","14""02:00:00","02:00:00""2","2""7""7"),
("15","15""01:41:00","01:41:00""2","2""8""8"),
("16","16""02:11:00","02:11:00""2","2""8""8"),
("17","17""02:41:00","02:41:00""2","2""8""8"),
("18","18""03:11:00","03:11:00""2","2""8""8"),
("19","19""03:41:00","03:41:00""2","2""8""8"),
("20","20""03:30:00","03:30:00""2","2""9""9"),
("21","21""04:30:00","04:30:00""2","2""9""9"),
("22","22""05:30:00","05:30:00""2","2""9""9"),
("23","23""06:30:00","06:30:00""2","2""9""9"),
("24","24""01:40:00","01:40:00""2","2""10""10"),
("25","25""01:55:00","01:55:00""2","2""10""10"),
("26","26""02:10:00","02:10:00""2","2""10""10"),
("27","27""02:25:00","02:25:00""2","2""10""10"),
("28","28""02:40:00","02:40:00""2","2""10""10"),
("29","29""02:55:00","02:55:00""2","2""10""10"),
("30","30""03:10:00","03:10:00""2","2""10""10"),
("31","31""03:25:00","03:25:00""2","2""10""10"),
("32","32""03:40:00","03:40:00""2","2""10""10"),
("33","33""03:20:00","03:20:00""2","2""11""11"),
("34","34""03:50:00","03:50:00""2","2""11""11"),
("35","35""04:20:00","04:20:00""2","2""11""11"),
("36","36""06:30:00","06:30:00""2","2""12""12"),
("37","37""07:00:00","07:00:00""2","2""12""12"),
("38","38""07:30:00","07:30:00""2","2""12""12"),
("39","39""08:00:00","08:00:00""2","2""12""12"),
("40","40""08:30:00","08:30:00""2","2""12""12"),
("41","41""03:30:00","03:30:00""2","2""13""13"),
("42","42""04:30:00","04:30:00""2","2""13""13"),
("43","43""05:30:00","05:30:00""2","2""13""13"),
("44","44""06:30:00","06:30:00""2","2""13""13"),
("45","45""07:30:00","07:30:00""2","2""13""13"),
("46","46""08:30:00","08:30:00""2","2""14""14"),
("47","47""09:30:00","09:30:00""2","2""14""14"),
("48","48""10:30:00","10:30:00""2","2""14""14"),
("49","49""11:30:00","11:30:00""2","2""14""14"),
("50","50""02:30:00","02:30:00""2","2""16""16"),
("51","51""04:00:00","04:00:00""2","2""16""16"),
("52","52""05:30:00","05:30:00""2","2""16""16"),
("53","53""08:30:00","08:30:00""2","2""17""17"),
("54","54""09:00:00","09:00:00""2","2""17""17"),
("55","55""09:30:00","09:30:00""2","2""17""17"),
("56","56""10:00:00","10:00:00""2","2""17""17"),
("57","57""10:30:00","10:30:00""2","2""17""17"),
("58","58""10:00:00","10:00:00""2","2""18""18"),
("59","59""10:30:00","10:30:00""2","2""18""18"),
("60","60""11:00:00","11:00:00""2","2""18""18"),
("61","61""08:00:00","08:00:00""2","2""19""19"),
("62","62""08:30:00","08:30:00""2","2""19""19"),
("63","63""09:00:00","09:00:00""2","2""19""19"),
("64","64""10:00:00","10:00:00""2","2""20""20"),
("65","65""10:30:00","10:30:00""2","2""20""20"),
("66","66""11:00:00","11:00:00""2","2""20""20"),
("67","67""01:30:00","01:30:00""2","2""21""21"),
("68","68""02:00:00","02:00:00""2","2""21""21"),
("69","69""02:30:00","02:30:00""2","2""21""21"),
("70","70""03:00:00","03:00:00""2","2""21""21"),
("71","71""03:30:00","03:30:00""2","2""21""21"),
("72","72""07:50:00","07:50:00""2","2""22""22"),
("73","73""08:20:00","08:20:00""2","2""22""22"),
("74","74""08:50:00","08:50:00""2","2""22""22"),
("75","75""08:10:00","08:10:00""2","2""23""23"),
("76","76""08:40:00","08:40:00""2","2""23""23"),
("77","77""09:10:00","09:10:00""2","2""23""23"),
("78","78""08:20:00","08:20:00""2","2""24""24"),
("79","79""08:50:00","08:50:00""2","2""24""24"),
("80","80""09:20:00","09:20:00""2","2""24""24"),
("81","81""08:25:00","08:25:00""2","2""25""25"),
("82","82""08:55:00","08:55:00""2","2""25""25"),
("83","83""09:25:00","09:25:00""2","2""25""25"),
("84","84""08:30:00","08:30:00""2","2""26""26"),
("85","85""09:00:00","09:00:00""2","2""26""26"),
("86","86""09:30:00","09:30:00""2","2""26""26"),
("87","87""10:00:00","10:00:00""2","2""26""26"),
("88","88""10:30:00","10:30:00""2","2""26""26"),
("89","89""08:45:00","08:45:00""2","2""27""27"),
("90","90""09:15:00","09:15:00""2","2""27""27"),
("91","91""09:45:00","09:45:00""2","2""27""27"),
("92","92""08:00:00","08:00:00""2","2""28""28"),
("93","93""08:30:00","08:30:00""2","2""28""28"),
("94","94""09:00:00","09:00:00""2","2""28""28"),
("95","95""01:00:00","01:00:00""2","2""29""29"),
("96","96""01:30:00","01:30:00""2","2""29""29"),
("97","97""02:00:00","02:00:00""2","2""29""29"),
("98","98""02:30:00","02:30:00""2","2""29""29"),
("99","99""03:00:00","03:00:00""2","2""29""29"),
("100","100""03:30:00","03:30:00""2","2""29""29"),
("101","101""04:00:00","04:00:00""2","2""29""29"),
("102","102""07:00:00","07:00:00""2","2""1""1"),
("103","103""07:30:00","07:30:00""2","2""1""1"),
("104","104""08:00:00","08:00:00""2","2""1""1"),
("105","105""08:30:00","08:30:00""2","2""1""1"),
("106","106""09:00:00","09:00:00""2","2""1""1"),
("107","107""03:00:00","03:00:00""2","2""2""2"),
("108","108""03:20:00","03:20:00""2","2""2""2"),
("109","109""03:40:00","03:40:00""2","2""2""2"),
("110","110""04:00:00","04:00:00""2","2""2""2"),
("111","111""04:20:00","04:20:00""2","2""2""2"),
("112","112""04:40:00","04:40:00""2","2""2""2"),
("113","113""05:00:00","05:00:00""2","2""2""2"),
("114","114""03:15:00","03:15:00""2","2""3""3"),
("115","115""04:15:00","04:15:00""2","2""3""3"),
("116","116""05:15:00","05:15:00""2","2""3""3"),
("117","117""06:15:00","06:15:00""2","2""3""3"),
("118","118""03:30:00","03:30:00""2","2""4""4"),
("119","119""04:30:00","04:30:00""2","2""4""4"),
("120","120""02:30:00","02:30:00""2","2""5""5"),
("121","121""02:50:00","02:50:00""2","2""5""5"),
("122","122""03:10:00","03:10:00""2","2""5""5"),
("123","123""03:30:00","03:30:00""2","2""5""5"),
("124","124""03:50:00","03:50:00""2","2""5""5"),
("125","125""04:10:00","04:10:00""2","2""5""5"),
("126","126""04:00:00","04:00:00""2","2""6""6"),
("127","127""04:30:00","04:30:00""2","2""6""6"),
("128","128""05:00:00","05:00:00""2","2""6""6"),
("129","129""05:30:00","05:30:00""2","2""6""6"),
("130","130""06:00:00","06:00:00""2","2""8""8"),
("131","131""06:30:00","06:30:00""2","2""8""8"),
("132","132""08:20:00","08:20:00""2","2""10""10"),
("133","133""08:50:00","08:50:00""2","2""10""10"),
("134","134""09:20:00","09:20:00""2","2""10""10"),
("135","135""09:50:00","09:50:00""2","2""10""10"),
("136","136""10:20:00","10:20:00""2","2""10""10"),
("137","137""10:50:00","10:50:00""2","2""10""10"),
("138","138""10:30:00","10:30:00""1","1""12""12"),
("139","139""10:50:00","10:50:00""0","0""12""12"),
("140","140""11:10:00","11:10:00""0","0""12""12"),
("141","141""11:30:00","11:30:00""0","0""12""12"),
("142","142""11:50:00","11:50:00""0","0""12""12"),
("143","143""12:10:00","12:10:00""0","0""12""12"),
("144","144""05:00:00","05:00:00""0","0""13""13"),
("145","145""06:00:00","06:00:00""0","0""13""13"),
("146","146""06:30:00","06:30:00""1","1""14""14"),
("147","147""07:00:00","07:00:00""1","1""14""14"),
("148","148""07:30:00","07:30:00""0","0""14""14"),
("149","149""08:00:00","08:00:00""0","0""14""14");



DROP TABLE IF EXISTS treatment;

CREATE TABLE `treatment` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `treatment_price` decimal(10,2) NOT NULL,
  `treatment_status` int(11) NOT NULL,
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO treatment VALUES("1","1""Bonding","Bonding""2000.00","2000.00""1""1"),
("2","2""Braces","Braces""3000.00","3000.00""1""1"),
("3","3""Bridges and Implants","Bridges and Implants""1000.00","1000.00""1""1"),
("4","4""Crowns and caps","Crowns and caps""1000.00","1000.00""1""1"),
("5","5""Dentures","Dentures""500.00","500.00""1""1"),
("6","6""Extraction","Extraction""1000.00","1000.00""1""1"),
("7","7""Filling and repairs","Filling and repairs""500.00","500.00""1""1"),
("8","8""Gum surgery","Gum surgery""2000.00","2000.00""1""1"),
("9","9""Root canals","Root canals""5000.00","5000.00""1""1"),
("10","10""Sealants","Sealants""1000.00","1000.00""1""1"),
("11","11""Teeth whitening","Teeth whitening""1200.00","1200.00""1""1"),
("12","12""Veneers","Veneers""1000.00","1000.00""1""1"),
("13","13""Other","Other""1000.00","1000.00""1""1");



DROP TABLE IF EXISTS unit;

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(45) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO unit VALUES("1","1""bottle""bottle"),
("2","2""piece""piece"),
("3","3""ml""ml");




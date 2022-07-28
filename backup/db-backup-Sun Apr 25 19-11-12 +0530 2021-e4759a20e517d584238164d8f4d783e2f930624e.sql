DROP TABLE IF EXISTS appointment;

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_status` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointment VALUES("1","1""2021-04-15","2021-04-15""1","1""PAT00001","PAT00001""7","7""9","9""EMP00003""EMP00003"),
("2","2""2021-04-14","2021-04-14""2","2""PAT00002","PAT00002""1","1""12","12""EMP00004""EMP00004"),
("3","3""2021-04-25","2021-04-25""1","1""PAT00002","PAT00002""9","9""8","8""EMP00002""EMP00002"),
("4","4""2021-04-25","2021-04-25""1","1""PAT00003","PAT00003""9","9""9","9""EMP00002""EMP00002"),
("5","5""2021-04-18","2021-04-18""2","2""PAT00003","PAT00003""6","6""5","5""EMP00003""EMP00003"),
("6","6""2021-04-23","2021-04-23""1","1""PAT00001","PAT00001""1","1""9","9""EMP00002""EMP00002"),
("7","7""2021-04-18","2021-04-18""1","1""PAT00002","PAT00002""8","8""8","8""EMP00003""EMP00003"),
("8","8""2021-04-25","2021-04-25""1","1""PAT00002","PAT00002""11","11""10","10""EMP00002""EMP00002"),
("9","9""2021-04-18","2021-04-18""1","1""PAT00001","PAT00001""6","6""9","9""EMP00003""EMP00003");



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

INSERT INTO employee VALUES("EMP00001","EMP00001""3","3""Anushka","Anushka""Abeyratne","Abeyratne""EMP00001_1619179970.jpg","EMP00001_1619179970.jpg""2021-04-18","2021-04-18""1","1""anu@gmail.com","anu@gmail.com""935310067V","935310067V""+94112789120","+94112789120""+94713467382","+94713467382""1""1"),
("EMP00002","EMP00002""4","4""Subash","Subash""Karunarathne","Karunarathne""EMP00002_1619189271.jpg","EMP00002_1619189271.jpg""1990-04-25","1990-04-25""0","0""suba@gmail.com","suba@gmail.com""909345678V","909345678V""+94112789674","+94112789674""+94712647365","+94712647365""1""1");



DROP TABLE IF EXISTS grn;

CREATE TABLE `grn` (
  `grn_id` varchar(11) NOT NULL,
  `ref_id` varchar(11) NOT NULL,
  `total` float NOT NULL,
  `receive_date` date NOT NULL,
  `supplier_supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`grn_id`),
  KEY `supplier_supplier_id` (`supplier_supplier_id`),
  CONSTRAINT `grn_ibfk_1` FOREIGN KEY (`supplier_supplier_id`) REFERENCES `supplier` (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO grn VALUES("GRN00001","GRN00001""Sed repudia","Sed repudia""2003","2003""0000-00-00","0000-00-00""3""3"),
("GRN00002","GRN00002""Maxime quia","Maxime quia""1049400","1049400""2013-03-24","2013-03-24""4""4"),
("GRN00003","GRN00003""A123","A123""500","500""2021-04-18","2021-04-18""2""2"),
("GRN00004","GRN00004""B12345","B12345""50000","50000""2021-04-18","2021-04-18""3""3"),
("GRN00005","GRN00005""C2345","C2345""100000","100000""2021-04-17","2021-04-17""3""3"),
("GRN00006","GRN00006""X345","X345""1200","1200""2021-04-18","2021-04-18""3""3"),
("GRN00007","GRN00007""A12345","A12345""1000","1000""2021-04-20","2021-04-20""4""4");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO history VALUES("1","1""2021-04-25","2021-04-25""Abacavir.\nAbacavir / dolutegravir / lamivudine \nAbacavir / lamivudine \nAcyclovir.","Abacavir.\nAbacavir / dolutegravir / lamivudine \nAbacavir / lamivudine \nAcyclovir.""EMP00001","EMP00001""PAT00001""PAT00001"),
("2","2""2021-04-25","2021-04-25""Hydrocortisone 500mg","Hydrocortisone 500mg""EMP00001","EMP00001""PAT00002""PAT00002"),
("3","3""2021-04-25","2021-04-25""Cefixime 1mg per day","Cefixime 1mg per day""EMP00001","EMP00001""PAT00002""PAT00002"),
("4","4""2021-04-25","2021-04-25""Dapsone 100-mg tablet ","Dapsone 100-mg tablet ""EMP00001","EMP00001""PAT00003""PAT00003"),
("5","5""2021-04-25","2021-04-25""emicizumab 60 mg/0.4 ml","emicizumab 60 mg/0.4 ml""EMP00001","EMP00001""PAT00003""PAT00003"),
("6","6""2021-04-25","2021-04-25""Hydromorphoneavailable as 2 mg tablets, 4 mg tablets and a 1 mg/ml liquid taken by mouth","Hydromorphoneavailable as 2 mg tablets, 4 mg tablets and a 1 mg/ml liquid taken by mouth""EMP00001","EMP00001""PAT00004""PAT00004");



DROP TABLE IF EXISTS invoice;

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_time` time NOT NULL,
  `invoice_date` date NOT NULL,
  `emp_id` varchar(45) NOT NULL,
  `invoice_total` decimal(10,2) NOT NULL,
  `appointment_appointment_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS invoice_has_medicine_item;

CREATE TABLE `invoice_has_medicine_item` (
  `Invoice_invoice_id` int(11) NOT NULL,
  `medicine_item_item_id` int(11) NOT NULL,
  PRIMARY KEY (`Invoice_invoice_id`,`medicine_item_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO login VALUES("2","2""anu@gmail.com","anu@gmail.com""fa0afff30dead995c1714dd4841815ad14f84d4a","fa0afff30dead995c1714dd4841815ad14f84d4a""1","1""1","1""EMP00001""EMP00001"),
("3","3""suba@gmail.com","suba@gmail.com""2d9f37c1b15881e8bc0334a4b022a23718e0e49b","2d9f37c1b15881e8bc0334a4b022a23718e0e49b""1","1""4","4""EMP00002""EMP00002");



DROP TABLE IF EXISTS medicine_item;

CREATE TABLE `medicine_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `unit_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `unit_unit_id` (`unit_unit_id`),
  CONSTRAINT `medicine_item_ibfk_1` FOREIGN KEY (`unit_unit_id`) REFERENCES `unit` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO medicine_item VALUES("1","1""cotton","cotton""2""2"),
("2","2""syringe","syringe""2""2");



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
("8","8""Report Management","Report Management""seo-report.png","seo-report.png""report.php","report.php""1""1"),
("9","9""Backup Management","Backup Management""server.png","server.png""backup.php","backup.php""1""1");



DROP TABLE IF EXISTS module_role;

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`module_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO module_role VALUES("1","1""1""1"),
("1","1""4""4"),
("2","2""1""1"),
("2","2""3""3"),
("2","2""4""4"),
("2","2""6""6"),
("3","3""1""1"),
("3","3""2""2"),
("3","3""5""5"),
("4","4""1""1"),
("5","5""1""1"),
("5","5""2""2"),
("6","6""1""1"),
("6","6""3""3"),
("6","6""6""6"),
("7","7""1""1"),
("8","8""1""1"),
("8","8""2""2"),
("8","8""5""5"),
("9","9""1""1");



DROP TABLE IF EXISTS patient;

CREATE TABLE `patient` (
  `patient_id` varchar(10) NOT NULL,
  `patient_title` varchar(45) NOT NULL,
  `patient_fname` varchar(60) NOT NULL,
  `patient_lname` varchar(60) NOT NULL,
  `patient_gender` varchar(1) NOT NULL,
  `patient_age` varchar(45) NOT NULL,
  `patient_email` varchar(45) NOT NULL,
  `patient_cno` varchar(15) NOT NULL,
  `patient_no` varchar(45) NOT NULL,
  `patient_street` varchar(45) NOT NULL,
  `patient_city` varchar(45) NOT NULL,
  `patient_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO patient VALUES("PAT00001","PAT00001""2","2""Nirashani","Nirashani""Abeykoon","Abeykoon""0","0""28y","28y""nira@gmail.com","nira@gmail.com""+94713562123","+94713562123""72","72""horana rd","horana rd""horana","horana""1""1"),
("PAT00002","PAT00002""3","3""Naida Moreno","Naida Moreno""Steven Hutchinson","Steven Hutchinson""1","1""35y","35y""heqe@mailinator.com","heqe@mailinator.com""+94713425637","+94713425637""78","78""Id impedit non inve","Id impedit non inve""Et sit ab unde sunt ","Et sit ab unde sunt ""1""1"),
("PAT00003","PAT00003""1","1""Connor Vinson","Connor Vinson""Lacota English","Lacota English""0","0""43y","43y""rohatyjequ@mailinator.com","rohatyjequ@mailinator.com""+94713562123","+94713562123""124/A","124/A""Eu proident sint iu","Eu proident sint iu""Necessitatibus omnis","Necessitatibus omnis""1""1"),
("PAT00004","PAT00004""2","2""roshini","roshini""hasitha","hasitha""0","0""23y","23y""rosh@gmail.com","rosh@gmail.com""+94713562735","+94713562735""65/A","65/A""rabukkana road","rabukkana road""rabukkana","rabukkana""1""1"),
("PAT00005","PAT00005""2","2""lakshini","lakshini""samrasinghe","samrasinghe""0","0""30y","30y""lak@hotmail.com","lak@hotmail.com""+94713562735","+94713562735""124/A","124/A""horana rd","horana rd""horana","horana""1""1"),
("PAT00006","PAT00006""1","1""Yasiru","Yasiru""Chanaka","Chanaka""0","0""30y","30y""yash@gmail.com","yash@gmail.com""+94713562735","+94713562735""124/A","124/A""piliyandala rd","piliyandala rd""piliyandala","piliyandala""1""1"),
("PAT00007","PAT00007""2","2""Raveeni","Raveeni""Samaranayake","Samaranayake""0","0""30y","30y""ravi@gmail.com","ravi@gmail.com""+94713562123","+94713562123""72","72""alubomulla rd","alubomulla rd""panadura","panadura""1""1");



DROP TABLE IF EXISTS payment;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` datetime NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1,
  `appointment_appointment_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS prescription;

CREATE TABLE `prescription` (
  `pres_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `pres_comment` varchar(500) CHARACTER SET latin1 NOT NULL,
  `pres_date` date NOT NULL,
  `pres_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`pres_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO prescription VALUES("1","1""0","0""paracetamol tablets, 500mg x 4 /day daily","paracetamol tablets, 500mg x 4 /day daily""2020-10-12","2020-10-12""1""1"),
("2","2""0","0""Doxycycline capsules, 100mg 2 capsules on the first day followed by 1 capsule daily","Doxycycline capsules, 100mg 2 capsules on the first day followed by 1 capsule daily""2020-10-13","2020-10-13""1""1");



DROP TABLE IF EXISTS purchase_order;

CREATE TABLE `purchase_order` (
  `order_id` varchar(225) CHARACTER SET latin1 NOT NULL,
  `order_date` date NOT NULL,
  `sup_id` int(11) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`order_id`),
  KEY `sup_id` (`sup_id`),
  CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS role;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  `role_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO role VALUES("1","1""Admin","Admin""1""1"),
("2","2""Owner","Owner""1""1"),
("3","3""Receptionist","Receptionist""1""1"),
("4","4""Dentist","Dentist""1""1"),
("5","5""Cashier","Cashier""1""1"),
("6","6""Nurse","Nurse""1""1"),
("7","7""Cleaner","Cleaner""1""1");



DROP TABLE IF EXISTS schedule;

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_date` date NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `schedule_status` tinyint(4) NOT NULL,
  `schedule_deleted` int(11) NOT NULL DEFAULT 1,
  `employee_emp_id` varchar(10) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `employee_emp_id` (`employee_emp_id`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`employee_emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO schedule VALUES("1","1""2021-04-16","2021-04-16""12:30","12:30""15:30","15:30""00:30:00","00:30:00""0","0""1","1""EMP00002""EMP00002"),
("2","2""2021-04-18","2021-04-18""16:00","16:00""18:00","18:00""00:30:00","00:30:00""0","0""1","1""EMP00003""EMP00003"),
("3","3""2021-04-29","2021-04-29""13:30","13:30""17:30","17:30""01:00:00","01:00:00""0","0""1","1""EMP00004""EMP00004"),
("4","4""2021-04-23","2021-04-23""13:40","13:40""16:40","16:40""00:45:00","00:45:00""0","0""1","1""EMP00002""EMP00002"),
("5","5""2021-04-18","2021-04-18""16:00","16:00""17:00","17:00""00:30:00","00:30:00""0","0""1","1""EMP00003""EMP00003"),
("6","6""2021-04-25","2021-04-25""16:00","16:00""18:00","18:00""00:45:00","00:45:00""0","0""1","1""EMP00002""EMP00002"),
("7","7""2021-04-24","2021-04-24""01:00","01:00""02:00","02:00""00:30:00","00:30:00""0","0""1","1""EMP00002""EMP00002"),
("8","8""2021-04-23","2021-04-23""01:41","01:41""03:41","03:41""00:30:00","00:30:00""0","0""1","1""EMP00002""EMP00002");



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
  `stock_status` int(11) NOT NULL,
  `medicine_item_item_id` int(11) NOT NULL,
  `grn_grn_id` varchar(11) NOT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `grn_grn_id` (`grn_grn_id`),
  KEY `medicine_item_item_id` (`medicine_item_item_id`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`grn_grn_id`) REFERENCES `grn` (`grn_id`),
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`medicine_item_item_id`) REFERENCES `medicine_item` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO stock VALUES("1","1""500","500""500","500""2021-04-18","2021-04-18""2021-04-30","2021-04-30""100.00","100.00""200.00","200.00""50000.00","50000.00""0","0""1","1""GRN00004""GRN00004"),
("2","2""1000","1000""1000","1000""2021-04-17","2021-04-17""2021-04-30","2021-04-30""100.00","100.00""200.00","200.00""100000.00","100000.00""0","0""1","1""GRN00005""GRN00005"),
("3","3""60","60""60","60""2021-04-18","2021-04-18""2021-04-30","2021-04-30""20.00","20.00""30.00","30.00""1200.00","1200.00""0","0""1","1""GRN00006""GRN00006"),
("4","4""100","100""100","100""2021-04-20","2021-04-20""2021-04-30","2021-04-30""10.00","10.00""20.00","20.00""1000.00","1000.00""0","0""2","2""GRN00007""GRN00007");



DROP TABLE IF EXISTS supplier;

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `com_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `com_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `com_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `com_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `person_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `person_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `person_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `person_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nic` varchar(12) CHARACTER SET latin1 NOT NULL,
  `positionn` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO supplier VALUES("1","1""ABC(Pvt)Ltd","ABC(Pvt)Ltd""No.75 galle road,Mount Lavinia","No.75 galle road,Mount Lavinia""+94112563080","+94112563080""+94713728123","+94713728123""ABC@gmail.com","ABC@gmail.com""Kasun wijewardena","Kasun wijewardena""kasun@abc.com","kasun@abc.com""+94112563999","+94112563999""+94112563999","+94112563999""867537657V","867537657V""Supplier","Supplier""1""1"),
("2","2""Crown(Pvt)Ltd","Crown(Pvt)Ltd""No.75 kandy road,kandy","No.75 kandy road,kandy""+94112563872","+94112563872""+94713728947","+94713728947""crown@yahoo.com","crown@yahoo.com""Lakshan Perera","Lakshan Perera""lakshan@crown.com","lakshan@crown.com""+94116253090","+94116253090""+94116253090","+94116253090""935096067V","935096067V"" Manager"," Manager""1""1"),
("3","3""Denta(Pvt)Ltd","Denta(Pvt)Ltd""No.75 nawala road,Nugegoda","No.75 nawala road,Nugegoda""+94111234000","+94111234000""+94713728947","+94713728947""Denta@gmail.com","Denta@gmail.com""Mihira Fernando","Mihira Fernando""mihira@denta.com","mihira@denta.com""+94112563090","+94112563090""+94112563090","+94112563090""806746328V","806746328V""Supplier Manager","Supplier Manager""1""1"),
("4","4""Dentures(Pvt)Ltd","Dentures(Pvt)Ltd""No.60 yakkla road,kandy","No.60 yakkla road,kandy""+941125896741","+941125896741""+947137096453","+947137096453""den@gmail.com","den@gmail.com""yashan alwis","yashan alwis""yash@gmail.com","yash@gmail.com""+94112560975","+94112560975""+94112560975","+94112560975""935078934V","935078934V""Supplier Manager","Supplier Manager""1""1");



DROP TABLE IF EXISTS timeslot;

CREATE TABLE `timeslot` (
  `timeslot_id` int(11) NOT NULL AUTO_INCREMENT,
  `timeslot_start_time` time NOT NULL,
  `booked` int(11) NOT NULL,
  `schedule_schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`timeslot_id`),
  KEY `schedule_schedule_id` (`schedule_schedule_id`),
  CONSTRAINT `timeslot_ibfk_1` FOREIGN KEY (`schedule_schedule_id`) REFERENCES `schedule` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO timeslot VALUES("1","1""01:40:00","01:40:00""0","0""4""4"),
("2","2""02:25:00","02:25:00""0","0""4""4"),
("3","3""03:10:00","03:10:00""0","0""4""4"),
("4","4""03:55:00","03:55:00""0","0""4""4"),
("5","5""04:40:00","04:40:00""0","0""4""4"),
("6","6""04:00:00","04:00:00""1","1""5""5"),
("7","7""04:30:00","04:30:00""0","0""5""5"),
("8","8""05:00:00","05:00:00""0","0""5""5"),
("9","9""04:00:00","04:00:00""0","0""6""6"),
("10","10""04:45:00","04:45:00""0","0""6""6"),
("11","11""05:30:00","05:30:00""1","1""6""6"),
("12","12""01:00:00","01:00:00""0","0""7""7"),
("13","13""01:30:00","01:30:00""0","0""7""7"),
("14","14""02:00:00","02:00:00""0","0""7""7"),
("15","15""01:41:00","01:41:00""0","0""8""8"),
("16","16""02:11:00","02:11:00""0","0""8""8"),
("17","17""02:41:00","02:41:00""0","0""8""8"),
("18","18""03:11:00","03:11:00""0","0""8""8"),
("19","19""03:41:00","03:41:00""0","0""8""8");



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




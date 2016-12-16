<?php
#(1) Insert a music instrument 

/* This queri insert a music instrument to the database */
$stmt = $conn->prepare("INSERT INTO instrument(instrument_id, instrument_name, category, details) VALUES(:instrumentId, :instrumentName, :category, :details)");
$stmt->bindParam(':instrumentId', $instrumentId);
$stmt->bindParam(':instrumentName', $instrumentName);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':details', $details);

$stmt->execute();

#(2) Insert a hall
$stmt = $conn->prepare("INSERT INTO hall(hall_name, capacity, building_name) VALUES(:hallName, :capacity, :buildingName)");
$stmt->bindParam(':hallName', $hallName);
$stmt->bindParam(':capacity', $capacity);
$stmt->bindParam(':buildingName', $buildingName);

#(2) Insert a module 
$stmt = $conn->prepare("INSERT INTO module(module_code, instrument_id) VALUES(:moduleCode, :instrumentId)");
$stmt->bindParam(':moduleCode', $moduleCode);
$stmt->bindParam(':instrumentId', $instrumentId);

#(2) Insert a class module 

/* This query insert a class to the database with already inserted instrument id */
$stmt = $conn->prepare("INSERT INTO class_module(class_module, class_name, module_code, class_type, monthly_fee) VALUES(:classModule, :className, :moduleCode, :classType, :monthlyFee)");
$stmt->bindParam(':classModule', $classModule);
$stmt->bindParam(':className', $className);
$stmt->bindParam(':moduleCode', $moduleCode);
$stmt->bindParam(':classType', $classType);
$stmt->bindParam(':monthlyFee', $monthlyFee);

$stmt->execute();

#(3) Update a class

/* Update the every columns except the class_id in class table 
 * NOTE - Should set non updating properties to the previous value of the class otherwise this query tries to update them  *        to null and will raise an exception
 */
$stmt = $conn->prepare("UPDATE class SET class_id = :classId, class_type = :classType, num_students = :numStudents,  location = :location, monthly_class_fee = :monthlyClassFee, instrument_id = :instrumentId WHERE class_id = :classID");
$stmt->bindParam(':classId', $classId);
$stmt->bindParam(':classType', $classType);
$stmt->bindParam(':numStudents', $numStudents);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':monthlyClassFee', $monthlyClassFee);
$stmt->bindParam(':instrumentId', $instrumentId);

$stmt->execute();


#(4) Search a class by its id || location || instrument

/* This method search a class based on id or location or instrument 
 * No need to set all the values one is enough, wild cards were used
 */
$stmt = $conn->prepare("SELECT class_id, class_type, num_students, location, monthly_class_fee, instrument_id FROM class WHERE class_id = :classId AND class_type = :classType  AND location = :location AND instrument_id = :instrumentId");
$stmt->bindParam(':classId', "%".$classId);
$stmt->bindParam(':classType', "%".$classType);
$stmt->bindParam(':location', "%".$location);
$stmt->bindParam(':instrumentId', "%".$instrumentId);

#(5) After selecting a particular class,  all the related details such as title, id, location, instrument, fee, teacher, 
#number of students, etc must be shown in another page.

/* To get the class information and teachers information, should get the class object intially and get the teachers list
 * and assign to the previous object
 */
$stmt = $conn->prepare("SELECT class_id, class_type, num_students, location, monthly_class_fee, instrument_id FROM class WHERE class_id = :classId");
$stmt->bindParam(':classId', $classId);

#getting teachers should be done separetly 
$stmt = $conn->prepare("SELECT T.teacher_id, T.t_first_name , T.t_last_name, T.t_dob, T.qualifications FROM teacher AS T NATURAL JOIN class_teacher_allocation AS CTA WHERE  CTA.class_id = :classId");
$stmt->bindParam(':classId', $classId);


#(6) 
/* Student registration
 * Queries are coded in an order that they should be executed
 */
# Insert a student 
$stmt = $conn->prepare("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_dob, std_gender) VALUES(:studentId, :studentFName, :studentMName, :studentLName, :studentDob, :studentGender)");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':studentFName', $studentFName);
$stmt->bindParam(':studentMName', $studentMName);
$stmt->bindParam(':studentLName', $studentLName);
$stmt->bindParam(':studentDob', $studentDob);
$stmt->bindParam(':studentGender', $studentGender);

#Insert registratio information 
$stmt = $conn->prepare("INSERT INTO student_registration(student_id, date_registered, registration_fee, birth_certificate) VALUES(:studentId, :dateRegistered, :registrationFee, :birthCertificate)");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':dateRegistered', $dateRegistered);
$stmt->bindParam(':registrationFee', $registrationFee);
$stmt->bindParam(':birthCertificate', $birthCertificate);

#Insert a parent or a guardian - all the fields are required
$stmt = $conn->prepare("INSERT INTO parent_guardian(p_g_first_name, p_g_last_name, p_g_gender, type) VALUES(:pgFName, :pgLName, pgGender, pgType)");
$stmt->bindParam(':pgFName', $pgFName);
$stmt->bindParam(':pgLName', $pgLName);
$stmt->bindParam(':pgGender', $pgGender);
$stmt->bindParam(':pgType', $pgType);

#Get the Id of the parent_guardian and assign it to the pgobject immediately after the above code
$stmt = $conn->prepare("SELECT LAST_INSERT_ID()");

#Insert to student_family referencing parent with the student if 
# **********************NOTE if this code is executed immediately after the above code then value can be inserted as last_insert_id() otherwise go with the properties ************************ 
$stmt = $conn->prepare("INSERT INTO student_family(student_id,parent_guardian) VALUES(:studentId, :pgId)");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':pgId', $pgId);

#Insert siblings 
/* both the coulmn's are PKs therefore insert ignore is used*/
$stmt = $conn->prepare("INSERT IGNORE INTO sibling(student_id,sibling_id) VALUES(:studentId, :siblingId)");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':siblingId', $pgsiblingIdId);


#(7) Insert to takes
# no need to insert the grade at the begining it comes under update 
$stmt = $conn->prepare("INSERT INTO takes(student_id, class_module) VALUES(:studentId, :classModule)");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':classModule', $classModule);

#(8) Insert grade( update the table takes)
$stmt = $conn->prepare("UPDATE takes SET grade = :grade WHERE student_id = :studenId, class_id = :classId");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':classId', $classId);

#(9) Fee payment for class
$stmt = $conn->prepare("INSERT INTO fee_payment(paid_date, paid_amt, takes_id) VALUES(:paidDate, :paidAmt, (SELECT takes_id FROM takes WHERE student_id = :studentId AND class_id = :classId))");
$stmt->bindParam(':studentId', $studentId);
$stmt->bindParam(':classId', $classId);

#(10)
SELECT DATE_FORMAT(SA.class_date, "%d-%b-%Y"), SA.is_late, SA.is_present, CM.module_code, CM.class_type, TA.student_id, CONCAT(ST.std_first_name , ' ', ST.std_last_name) student_name 
FROM student_attendance SA 
NATURAL JOIN takes TA 
NATURAL JOIN class_module CM
LEFT JOIN student ST 
ON ST.student_id = TA.student_id 
WHERE CM.module_code LIKE "%" OR CM.class_type LIKE "%" OR CONCAT(ST.std_first_name , ' ', ST.std_last_name) LIKE "%" OR DATE_FORMAT(SA.class_date, "%d-%b-%Y") LIKE "%"


#11 Insert to student_attendance table
$is_present = false;
$is_late = false;
if($val == 11){
	is_present = true;
}else if($val == 01){
	is_late = true;
}

DB::statement("INSERT INTO student_attendance(takes_id, is_late, is_present) 
	VALUES((SELECT takes_id FROM takes WHERE student_id = ?, AND class_module_id = ?),?,?)",[$student_id, $class_module_id, $is_late, $is_present]);



























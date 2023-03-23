<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app.db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['add_patient'])) {

	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$dob = $_POST['dob'];
	$contact_no = $_POST['contact_no'];
	$address = $_POST['address'];

	$sql = "INSERT INTO PATIENT (Pid, Pname, DOB, ContactNo, Address)
	VALUES ('$pid', '$pname', '$dob', '$contact_no', '$address')";

	if (mysqli_query($conn, $sql)) {
	    echo "Patient record added successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else if (isset($_POST['add_diagnosis'])) {

	$did = $_POST['did'];
	$dname = $_POST['dname'];
	$medication = $_POST['medication'];
	$department = $_POST['department'];

	$sql = "INSERT INTO DIAGNOSIS (Did, Dname, Medication, Department)
	VALUES ('$did', '$dname', '$medication', '$department')";

	if (mysqli_query($conn, $sql)) {
	    echo "Diagnosis record added successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else if (isset($_POST['assign_treatment'])) {

	$pid = $_POST['pid'];
	$type = $_POST['type'];
	$did = $_POST['did'];
	$doctor_name = $_POST['doctor_name'];

	$sql = "INSERT INTO TREATMENT (Pid, Type, Did, DoctorName)
	VALUES ('$pid', '$type', '$did', '$doctor_name')";

	if (mysqli_query($conn, $sql)) {
	    echo "Treatment assigned successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else if (isset($_POST['update_patient'])) {

	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$dob = $_POST['dob'];
	$contact_no = $_POST['contact_no'];
	$address = $_POST['address'];

	$sql = "UPDATE PATIENT SET Pname='$pname', DOB='$dob', ContactNo='$contact_no', Address='$address' WHERE Pid='$pid'";

	if (mysqli_query($conn, $sql)) {
	    echo "Patient record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else if (isset($_POST['delete_patient'])) {

	$pid = $_POST['pid'];

	$sql = "DELETE FROM PATIENT WHERE Pid='$pid'";

	if (mysqli_query($conn, $sql)) {
	    echo "Patient record deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

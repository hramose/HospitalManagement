<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=$_SESSION['user']['id'];
	$sql1 =mysql_query("select count(*) from consultation as c, patient as p where c.doctor_id='$doctorid' and c.patient_id=p.patient_id and c.con_time='00:00:00';");

	while ($row = mysql_fetch_array($sql1))
	{
		$count_waitinglist=$row['count(*)'];
	}




	$sql2 =mysql_query("select p_name, age, phno,address from consultation as c, patient as p where c.doctor_id='$doctorid' and c.patient_id=p.patient_id and c.con_time='00:00:00'");

	$i=0;
	while($row = mysql_fetch_array($sql2))
	{
		$patient_name[$i]=$row['p_name'];
		$age[$i]=$row['age'];
		$phone_no[$i]=$row['phno'];
		$address[$i]=$row['address'];
		$i++;
		//echo ($row['p_name'].$row['age'].$row['phno'].$row['address']);
	}
	mysql_close($con);
?>
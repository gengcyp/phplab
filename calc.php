

<?php

if ($_POST["menu"] == "bmi"){
	checkBMI();
}else if ($_POST["menu"] == "bmr"){
	checkBMR();
}else if ($_POST["menu"] == "tc"){
	checkTC();
}


function checkBMI(){
	if ((is_numeric($_POST["bmiH"]))  and (is_numeric($_POST["bmiW"]))	){
		calcBMI();
	}else{
		echo "Please check your input";
	}
}
function checkBMR(){
	if ($_POST["gender"] == "no"){
		echo "Please select gender";

	}else if ((is_numeric($_POST["bmr-h"]))  and (is_numeric($_POST["bmr-w"])) and (is_numeric($_POST["bmr-a"]))){
		calcBMR();
	}else{
		echo "Please check your input";
	}


}
function checkTC(){
	if ((is_numeric($_POST["ldl"]))  and (is_numeric($_POST["hdl"])) and (is_numeric($_POST["trc"]))){
		calcTC();
	}else{
		echo "Please check your input";
	}
}

function calcBMI(){
	$bmi = $_POST["bmiW"]/(($_POST["bmiH"]/100)**2);
	echo "BMI = ".$bmi."<br>";
	if ($bmi<18.5){
		$text = "<b>น้ำหนักน้อยเกินไป</b><br>ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม";
	}else if ($bmi<23.5){
		$text = "<b>น้ำหนักปกติ</b><br>และมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้";
	}else if ($bmi<28.5){
		$text = "<b>น้ำหนักเกิน</b><br>หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23";
	}else if ($bmi<35){
		$text = "<b>โรคอ้วนระดับ1 </b><br>และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย";
	}else if ($bmi<40){
		$text = "<b>โรคอ้วนระดับ2 </b>คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง";
	}else{
		$text = "<b>โรคอ้วนขั้นสูงสุด</b>";
	}
	echo $text;
}
function calcBMR(){

	$act = $_POST["activity"] ;
	if ($act == 1)		{$b = 1.2;}
	else if ($act == 2)	{$b = 1.375;}
	else if ($act == 3)	{$b = 1.55;}
	else if ($act == 4)	{$b = 1.735;}
	else if ($act == 5)	{$b = 1.9;}
	else 				{$b = 0;}

	$w = $_POST["bmr-w"];
	$h = $_POST["bmr-h"];
	$a = $_POST["bmr-a"];

	if ($_POST["gender"] == "male"){		
		$bmr = 66 + (13.7*$w) + (5*$h) - (6.8*$a);
	}else if ($_POST["gender"] == "female"){
		$bmr = 665 + (9.6*$w) + (1.8*$h) - (4.7*$a);
	}	
	$burn= $bmr*$b;

	echo "BMR = ".$bmr." kcal";
	echo "<br>";
	echo "TDEE = ".$burn." kcal";
}
function calcTC(){
	$ldl = $_POST["ldl"];
	$hdl = $_POST["hdl"];
	$trc = $_POST["trc"];

	if ($ldl <100) 		{$b="ดีมาก Ideal"; $n="ไขมันแอลดีแอลต่ำ ";}
	else if($ldl <130) 	{$b="ดี Near Optimal"; $n="ไขมันแอลดีแอลสูงเล็กน้อย";}
	else if($ldl <160) 	{$b="พอใช้ Borderline"; $n="ไขมันแอลดีแอลค่อนข้างสูง";}
	else if($ldl <190) 	{$b="ไม่ดีHign"; $n="ไขมันแอลดีแอลสูง";}
	else 				{$b="ไม่ดีมาก Severely high"; $n="อันตราย!!!";}
	echo "LDL =".$ldl." mg/DL <br><b>".$b."</b><br>".$n."<br><br>";

	if ($hdl >60){ 		$h="ดีมาก Good"	;}
	else if($hdl >40){	$h="ค่อนข้างเสี่ยงที่จะเป็นโรคหัวใจ Borderline risk"	;}
	else{				$h="มีความเสี่ยงสูงที่จะเป็นโรคหัวใจHigh risk"	;}
	echo "HDL =".$hdl." mg/DL <br><b>".$h."</b><br><br>";

	if ($trc <150) 		{$h="ดีมาก Ideal" ;}
	else if($trc <200) 	{$h="สูงเล็กน้อยElevated";}
	else if($trc <500) 	{$h="สูง High" ;}
	else 				{$h="สูงมากExtremely high"; }
	echo "Triglycerides =".$trc." mg/DL <br><b>".$h."</b><br><br>";

	$tc = $ldl+$hdl+($trc/5);
	if ($tc <200) 		{$t="ดีมาก Ideal";}
	else if($tc <240) 	{$t="ค่อนข้างสูงElevated" ;}
	else 				{$t="สูงมาก High";}

	echo "Total Cholesterol:".$tc."<br><b>".$t."</b>";


}
?>
<br><a href="index.php">Back</a>
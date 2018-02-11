<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function (){
			$(document).on('change', '#menu', function(e) {
    			setValue(this.options[e.target.selectedIndex].index);
			});
		});
		function setValue(i){
			$("menu").hide();
			$("#menu").show();
			

			if 		(i == 1){	$("#bmi").show();}
			else if (i == 2){	$("#bmr").show();}
			else if (i == 3){	$("#tc").show();}
			//resetForm();
		}
		function resetForm(){
			$("#menu").val("choose");
			document.getElementById("form").reset();
		}
	</script>
	<style type="text/css">
		input,#menu,#select-bmr {
		 	height:35px;
    		font-size:20pt; 
    		font-family: 'Kanit', sans-serif;
		}
		input[type="radio"] {
			transform: scale(1.75);
		}
		form {
			font-family: 'Kanit', sans-serif;font-size:20pt;
		}
		
	</style>
</head>



<body>

<form id="form"  method="post" action='calc.php'>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<select id="menu" name="menu" method="post">
	<option value="choose">---- Choose ----</option>
  <option value="bmi">BMI</option>
  <option value="bmr">BMR</option>
  <option value="tc">Total Cholesterol</option>
</select>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<menu id="bmi" style="display:none">
	<h3>การวัดดัชนีมวลร่างกาย Body Mass Index (BMI)</h3>
	Height (cm):<input type="text" name="bmiH"><br><br>
	Weight (Kg):<input type="text" name="bmiW"><br><br>
	<input type="submit" value="Calculate">
</menu>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<menu id="bmr" style="display:none" >
	<h3>คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</h3>
	Gender:
	<input type="radio" name="gender" value="no" style="display: none" checked>	
  	<input type="radio" name="gender" value="male"> Male	
  	<input type="radio" name="gender" value="female"> Female
  	<br><br>
	Height (cm):<input type="text" name="bmr-h"><br><br>
	Weight (Kg):<input type="text" name="bmr-w"><br><br>
	Age :		<input type="text" name="bmr-a"><br><br>
	Activity or Exercise:
		<select id="select-bmr" name="activity" >
			<option value="1">Never</option>
  			<option value="2">Sometimes (1-3 days per week)</option>
  			<option value="3">Normally (3-5 days per week)</option>
  			<option value="4">Ususlly (6-7 days per week)</option>
  			<option value="5">Always (everyday)</option>
		</select><br>
	<input type="submit" value="Calculate">
</menu>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<menu id="tc" style="display:none" >
	<h3>คำนวณค่าคอเลสเตอรอลรวม</h3>
	LDL:			<input type="text" name="ldl"><br><br>
	HDL:			<input type="text" name="hdl"><br><br>
	Triglycerides:	<input type="text" name="trc"><br><br>
	<input type="submit" value="Calculate">

</menu>
</form>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


</body>
</html>
<div id="webform">
<h2>Patient Details</h2>
<form action="" method="post">
<label>Name: </label>
<input type="text" name="name" required placeholder="Please Enter Name"/>
<br><br>
<label>Email Address: </label>
<input type="email" name="email" required placeholder="example@gmail.com"/><br><br>
<label>Mobile Number: </label>
<input type="Mobile" name="mobile" required placeholder="9999999999"/><br><br>
<label>Date Of Birth: </label>
<input type="Date" name="dob" required placeholder="dd/mm/yyyy"/><br><br>
<label>Username: </label>
<input type="text" name="username" required placeholder="Please Enter Username"><br><br>
<label>Password: </label>
<input type="Password" name="password" required><br><br>
<label>Blood Group: </label>
<input type="Blood" name="blood"><br><br>
<label>Where do you live? </label>
<input type="city" name="city" required placeholder="Enter your city"/><br><br>
<label>Gender: </label>
<select name="gender" required>
    <option value=""> Select </option>
    <option value="M"> Male </option>
	<option value="F"> Female </option>
	<option value="O"> Other </option>
</select>
<br><br>
<label>Are you under a therapist's care now? </label>
<select name="therapist" required>
    <option value=""> Select </option>
    <option value="Y"> Yes </option>
	<option value="N"> No </option>
</select>
<br><br>
<label>If yes, upload your medical report provided by them: </label>
<input type="file" name="file" placeholder="Upload files"><br><br>
<label>Are you taking any medication? </label>
<select name="med" required>
	<option value=""> Select </option>
	<option value="Y"> Yes </option>
	<option value="N"> No </option>
</select><br><br>
<label>Are you allergic to any of the following? </label><br>
<input type="checkbox" name="allergy[]" value="Aspirin">
<label>Aspirin</label><br>
<input type="checkbox" name="allergy[]" value="Penicillin">
<label>Penicillin</label><br>
<input type="checkbox" name="allergy[]" value="Codeine">
<label>Codeine</label><br>
<input type="checkbox" name="allergy[]" value="Local Anesthetics">
<label>Local Anesthetics</label><br>
<input type="text" name="allergy[]" placeholder="other"><br><br>
<label>Do you have or ever had any of the follwing? </label><br>
<input type="checkbox" name="disease[]" value="HIV/AIDS">
<label>HIV/AIDS</label><br>
<input type="checkbox" name="disease[]" value="Alzheimer's Disease">
<label>Alzheimer's Disease</label><br>
<input type="checkbox" name="disease[]" value="Drug Addiction">
<label>Drug Addiction*</label><br>
<input type="checkbox" name="disease[]" value="Epilepsy">
<label>Epilepsy</label><br>
<input type="checkbox" name="disease[]" value="Heart Attack">
<label>Heart Attack</label><br>
<input type="checkbox" name="disease[]" value="Tuberculosis">
<label>Tuberculosis*</label><br>
<input type="checkbox" name="disease[]" value="Herpes">
<label>Herpes</label><br>
<input type="checkbox" name="disease[]" value="Hepatitis">
<label>Hepatitis*</label><br>
<input type="text" name="disease[]" placeholder="other"><br><br>
<label>If you filled any * field, please elaborate: </label><br>
<input type="text" name="spec" placeholder="Description"><br><br>

<input type="submit" value=" Submit Details " name="submit"/><br />
</form>
</div>
<?php
if(isset($_POST["submit"])){
include 'dbconfig.php';
$all = $_POST["allergy"];
$allergies="";
for($i=0;$i<sizeof($all);$i++)
{
 $allergies.=$all[$i];
 $allergies.=",";
}
$all2 = $_POST["disease"];
$diseases="";
for($i=0;$i<sizeof($all2);$i++)
{
 $diseases.=$all2[$i];
 $diseases.=",";
}
// echo $allergies;
$sql = "INSERT INTO entries (name, email, mobile, dob, username, password, blood, city, gender, therapist, file, med, allergy, disease)
VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["mobile"]."','".$_POST["dob"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["blood"]."','".$_POST["city"]."','".$_POST["gender"]."','".$_POST["therapist"]."','".$_POST["file"]."','".$_POST["med"]."','$allergies','$diseases')";

if ($conn->query($sql) === TRUE) {
echo "
    <script type= 'text/javascript'>
        alert('New record created successfully');
    </script>";
} 
else 
{
    echo 
   " <script type= 'text/javascript'>
        alert('Error');
    </script>";

}

$conn->close();
}
?>
<div id="webform" background="john.jpg">
<h2>Therapist Details</h2>
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
<label>Gender: </label>
<select name="gender" required>
    <option value=""> Select </option>
    <option value="M"> Male </option>
    <option value="F"> Female </option>
    <option value="O"> Other </option>
</select>
<br><br>
<label>Qualification: </label>
<select name="qualification" required>
    <option value=""> Select </option>
    <option value="M.B.B.S."> M.B.B.S. </option>
    <option value="B.D.S."> B.D.S. </option>
    <option value="B.A.M.S."> B.A.M.S. </option>
    <option value="B.U.M.S."> B.U.M.S. </option>
    <option value="B.H.M.S."> B.H.M.S. </option>
    <option value="M.D."> M.D. </option>
    <option value="M.S."> M.S. </option>
    <option value="D.N.B."> D.N.B. </option>
</select><br><br>
<label>If M.D./M.S./D.N.B., specify field of specialization? </label>
<input type="text" name="spec" placeholder="Enter Specialization"/><br><br>
<label>Upload copy of Degree: </label>
<input type="file" name="file" placeholder="Upload files"><br><br>
<label>Languages you are proficient in: </label><br>
<input type="checkbox" name="lang[]" value="Hindi">
<label>Hindi</label><br>
<input type="checkbox" name="lang[]" value="English">
<label>English</label><br>
<input type="checkbox" name="lang[]" value="Marathi">
<label>Marathi</label><br>
<input type="checkbox" name="lang[]" value="Punjabi">
<label>Punjabi</label><br>
<input type="checkbox" name="lang[]" value="Tamil">
<label>Tamil</label><br>
<input type="checkbox" name="lang[]" value="Telugu">
<label>Telugu</label><br>
<input type="checkbox" name="lang[]" value="Bengali">
<label>Bengali</label><br>
<input type="text" name="lang_other" placeholder="other"><br><br>
<label>Education History: </label><br>
<input type="text" name="edhistory" required placeholder="Enter your Education History">
<br><br>
<label>Work Experience: </label><br>
<input type="text" name="work" required placeholder="Enter your Work Experience"><br><br>

<input type="submit" value=" Submit Details " name="submit"/><br />
</form>
</div>
<?php
if(isset($_POST["submit"])){
include 'dbconfig.php';
$all = $_POST["lang"];
$languages="";
for($i=0;$i<sizeof($all);$i++)
{
 $languages.=$all[$i];
 $languages.=",";
}

$sql = "INSERT INTO therapist (name, email, mobile, dob, gender, qualification, spec, file, lang, lang_other, edhistory, work)
VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["mobile"]."','".$_POST["dob"]."','".$_POST["gender"]."','".$_POST["qualification"]."','".$_POST["spec"]."','".$_POST["file"]."','$languages','".$_POST["lang_other"]."','".$_POST["edhistory"]."','".$_POST["work"]."')";
// echo $languages;
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
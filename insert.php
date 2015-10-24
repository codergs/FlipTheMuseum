<?php
//require("verify.php");
define('DB_NAME', 'FlipDatabase');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
	die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
}

$value1 = $_POST['questionType'];
$value2 = $_POST['questionTitle'];
$value3 = $_POST['choice1'];
$value4 = $_POST['choice2'];
$value5 = $_POST['choice3'];
$value6 = $_POST['answer'];
$value7 = $_POST['major'];
$value8 = $_POST['minor'];
//$value7 = $_SESSION['username'];


$sql = "INSERT INTO FlipForm (questionType, questionTitle,choice1,choice2,choice3,answer,major,minor) VALUES ('$value1', '$value2','$value3',
	'$value4','$value5','$value6','$value7','$value8')";


if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}
else{
$message = "Form submitted";
echo '
        <script type="text/javascript">
            alert("Form Submitted"); 
            window.location.href = "forms.html";</script>'; 
}

//mysql_close();


?>
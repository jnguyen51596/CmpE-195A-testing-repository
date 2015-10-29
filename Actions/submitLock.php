<?php
session_start();
require 'sql/pdo.php';
//$classID = $_POST["classid"];
//$i = 0;
//$data = array();
//$rows = getQuizTotal($classID);
//foreach ($rows as $values) {
//    $aValues=$values["quizID"];
//    $aQuizid="quizid-".$aValues;
//    $aToggle="toggle-".$aValues;
//    $quizid = $_POST[$aQuizid];
//    $toggle = $_POST[$aToggle];
//    $value = 0;
//    if ($toggle == "on") {
//        $value = 1;
//    }
//    $data[$i]["quizid"] = $quizid;
//    $data[$i]["toggle"] = $value;
//    $i++;
//}
$data = $_POST['jsondata'];
$classID=$data[0];
updateQuizTotal($data, $classID);
echo true;
?>



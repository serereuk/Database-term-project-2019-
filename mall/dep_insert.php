<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

//echo $_POST['type'];
if($_POST["type"] == '1'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$prof_name = $_POST['prof_name'];
$dep_name = $_POST['dep_name'];
$univ_name = $_POST['univ_name'];
$dep_phone = $_POST['dep_phone'];

$ret = mysqli_query($conn, "insert into department (prof_name, dep_name, univ_name, dep_phone) values('$prof_name','$dep_name', '$univ_name', '$dep_phone')");
 if(!$ret)
 {
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=dept.php'>";
 }
}

if($_POST["type"] == '2'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$ad_name = $_POST['ad_name'];
$dep_id = $_POST['dep_id'];
$ad_phone = $_POST['ad_phone'];
$ad_email = $_POST['ad_email'];
$ad_position = $_POST['ad_position'];

$ret = mysqli_query($conn, "insert into advisor (ad_name, dep_id, ad_phone, ad_email, ad_position) values('$ad_name', '$dep_id', '$ad_phone', '$ad_email', '$ad_position')");
 if(!$ret)
 {
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=advisor.php'>";
 }
}

if($_POST["type"] == '3'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$experiment_name = $_POST['experiment_name'];
$ad_id = $_POST['ad_id'];
$dep_id = $_POST['dep_id'];
$date = $_POST['date'];
$experiment_description = $_POST['experiment_description'];

$ret = mysqli_query($conn, "insert into experiment (experiment_name, ad_id, dep_id, date, experiment_description) values('$experiment_name', '$ad_id', '$dep_id', '$date', '$experiment_description')");
 if(!$ret)
 {
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=experiment.php'>";
 }
}
	
if($_POST["type"] == '4'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$part_name = $_POST['part_name'];
$experiment_id = $_POST['experiment_id'];
$part_height = $_POST['part_height'];
$part_weight = $_POST['part_weight'];
$part_age = $_POST['part_age'];
$part_phone = $_POST['part_phone'];

$ret = mysqli_query($conn, "insert into participants (part_name, experiment_id, part_height, part_weight, part_age, part_phone) values('$part_name', '$experiment_id', '$part_height', '$part_weight', '$part_age', '$part_phone')");
 if(!$ret)
 {
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=participants.php'>";
 }
}


if($_POST["type"] == '5'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$vol_name = $_POST['vol_name'];
$experiment_id = $_POST['experiment_id'];
$vol_height = $_POST['vol_height'];
$vol_weight = $_POST['vol_weight'];
$vol_age = $_POST['vol_age'];
$vol_phone = $_POST['vol_phone'];

$ret = mysqli_query($conn, "insert into volunteer (vol_name, experiment_id, vol_height, vol_weight, vol_age, vol_phone) values('$vol_name', '$experiment_id', '$vol_height', '$vol_weight', '$vol_age', '$vol_phone')");
 if(!$ret)
 {
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=volunteer.php'>";
 }
}


?>


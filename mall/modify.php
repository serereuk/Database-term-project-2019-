<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

//echo $_POST['type'];
if($_POST["type"] == '1'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$dep_id = $_POST['dep_id'];
$prof_name = $_POST['prof_name'];
$dep_name = $_POST['dep_name'];
$univ_name = $_POST['univ_name'];
$dep_phone = $_POST['dep_phone'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "update department set prof_name='$prof_name', dep_name='$dep_name', univ_name='$univ_name', dep_phone='$dep_phone' where dep_id ='$dep_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}

if($_POST["type"] == '2'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$ad_id = $_POST['ad_id'];
$ad_name = $_POST['ad_name'];
$dep_id = $_POST['dep_id'];
$ad_phone = $_POST['ad_phone'];
$ad_email = $_POST['ad_email'];
$ad_position = $_POST['ad_position'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "update advisor set ad_name='$ad_name', dep_id='$dep_id', ad_phone='$ad_phone', ad_email='$ad_email', ad_position='$ad_position' where ad_id = '$ad_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}

if($_POST["type"] == '3'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$experiment_id = $_POST['experiment_id'];
$experiment_name = $_POST['experiment_name'];
$ad_id = $_POST['ad_id'];
$dep_id = $_POST['dep_id'];
$date = $_POST['date'];
$experiment_description = $_POST['experiment_description'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "update experiment set experiment_name='$experiment_name', ad_id='$ad_id', dep_id='$dep_id', date='$date', experiment_description='$experiment_description' where experiment_id = '$experiment_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}
	
if($_POST["type"] == '4'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$part_id = $_POST['part_id'];
$part_name = $_POST['part_name'];
$experiment_id = $_POST['experiment_id'];
$part_height = $_POST['part_height'];
$part_weight = $_POST['part_weight'];
$part_age = $_POST['part_age'];
$part_phone = $_POST['part_phone'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "update participants set part_name='$part_name', experiment_id='$experiment_id', part_height='$part_height', part_weight='$part_weight', part_age='$part_age', part_phone='$part_phone' where part_id = '$part_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}


if($_POST["type"] == '5'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$vol_id = $_POST['vol_id'];
$vol_name = $_POST['vol_name'];
$experiment_id = $_POST['experiment_id'];
$part_id = $_POST['part_id'];
$vol_height = $_POST['vol_height'];
$vol_weight = $_POST['vol_weight'];
$vol_age = $_POST['vol_age'];
$vol_phone = $_POST['vol_phone'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "update volunteer set vol_name='$vol_name', experiment_id='$experiment_id', vol_height='$vol_height', vol_weight='$vol_weight', vol_age='$vol_age', vol_phone='$vol_phone' where vol_id = '$vol_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}


?>


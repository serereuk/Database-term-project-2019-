<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

print_r($_GET);
//echo $_POST['type'];
if($_GET["type"] == '1'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$dep_id = $_GET['dep_id'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "delete from department where dep_id = '$dep_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}

if($_GET["type"] == '2'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$ad_id = $_GET['ad_id'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "delete from advisor where ad_id = '$ad_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}

if($_GET["type"] == '3'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$experiment_id = $_GET['experiment_id'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "delete from experiment where experiment_id = '$experiment_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}
	
if($_GET["type"] == '4'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$part_id = $_GET['part_id'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "delete from participants where part_id = '$part_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}


if($_GET["type"] == '5'){

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$vol_id = $_GET['vol_id'];
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');


$ret = mysqli_query($conn, "delete from volunteer where vol_id = '$vol_id'");
 if(!$ret)
 {
	echo mysqli_error($conn);
	mysqli_query($conn, 'rollback');
    msg('Query Error : '.mysqli_error($conn));
 }
 else
 {
 	mysqli_query($conn, 'commit');
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=exp_view.php'>";
 }
}


?>


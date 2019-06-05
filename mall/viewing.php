<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>

<? if ($_POST['ch1'] == '1') { ?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from department";
    if (array_key_exists("search_keyword1", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword1"];
        $query =  $query . " where dep_name like '%$search_keyword%'"; //or experiment_description like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 담당부서 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>담당부서 고유번호</th>
            <th>담당교수 성함</th>
            <th>담당부서 이름</th>
            <th>담당대학 이름</th>
            <th>담당부서 전화번호</th>
            <th>기능</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['dep_id']}</td>";
            echo "<td>{$row['prof_name']}</td>";
            echo "<td>{$row['dep_name']}</td>";
            echo "<td>{$row['univ_name']}</td>";
            echo "<td>{$row['dep_phone']}</td>";
            echo "<td width='17%'>
            	  <a href='dept.php?dep_id={$row['dep_id']}'><button class='button primary small'>수정</button></a>
            	  <button onclick='javascript:deleteConfirm({$row['dep_id']}, {$_POST['ch1']})' class='button danger small'>제거</button></a> </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id,type) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete.php?dep_id=" + product_id + '&type=' + type;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? } ?>
<? if ($_POST["ch2"] == "2") { ?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select ad_id, ad_name, dep_name,ad_phone, ad_email, ad_position from advisor natural join department";
    if (array_key_exists("search_keyword2", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword2"];
        $query =  $query . " where ad_name like '%$search_keyword%' or dep_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 담당자 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>담당자 고유번호</th>
            <th>담당자 이름</th>
            <th>담당자 부서</th>
            <th>담당자 전화번호</th>
            <th>담당자 이메일</th>
            <th>담당자 직책</th>
            <th>기능</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['ad_id']}</td>";
            echo "<td>{$row['ad_name']}</td>";
            echo "<td>{$row['dep_name']}</td>";
            echo "<td>{$row['ad_phone']}</td>";
            echo "<td>{$row['ad_email']}</td>";
            echo "<td>{$row['ad_position']}</td>";
            echo "<td width='17%'>
            	  <a href='advisor.php?ad_id={$row['ad_id']}'><button class='button primary small'>수정</button></a>
            	  <button onclick='javascript:deleteConfirm({$row['ad_id']}, {$_POST['ch2']})' class='button danger small'>제거</button></a> </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id, type) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete.php?ad_id=" + product_id + '&type=' + type;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? } ?>
<? if ($_POST["ch3"] == '3') { ?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select experiment_id, experiment_name, ad_name, dep_name, date from experiment natural join advisor natural join department";
    if (array_key_exists("search_keyword3", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword3"];
        $query =  $query . " where experiment_name like '%$search_keyword%' or experiment_description like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>실험 고유번호</th>
            <th>실험 이름</th>
            <th>담당자 이름</th>
            <th>담당부서 이름</th>
            <th>날짜</th>
            <th>기능</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['experiment_id']}</td>";
            echo "<td>{$row['experiment_name']}</td>";
            echo "<td>{$row['ad_name']}</td>";
            echo "<td>{$row['dep_name']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "<td width='17%'>
            	  <a href='experiment.php?experiment_id={$row['experiment_id']}'><button class='button primary small'>수정</button></a>
            	  <button onclick='javascript:deleteConfirm({$row['experiment_id']}, {$_POST['ch3']})' class='button danger small'>제거</button></a> </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id, type) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete.php?experiment_id=" + product_id + '&type=' + type;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? } ?>

<? if ($_POST["ch4"] == "4") { ?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select part_id, part_name, experiment_name, part_phone from participants natural join experiment";
    if (array_key_exists("search_keyword4", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword4"];
        $query =  $query . " where part_name like '%$search_keyword%' or experiment_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 참가자 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>참가자 고유번호</th>
            <th>참가자 이름</th>
            <th>실험 이름</th>
            <th>참가자 전화번호</th>
            <th>기능</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['part_id']}</td>";
            echo "<td>{$row['part_name']}</td>";
            echo "<td>{$row['experiment_name']}</td>";
            echo "<td>{$row['part_phone']}</td>";
            echo "<td width='17%'>
            	  <a href='participants.php?part_id={$row['part_id']}'><button class='button primary small'>수정</button></a>
            	  <button onclick='javascript:deleteConfirm({$row['part_id']}, {$_POST['ch4']})' class='button danger small'>제거</button></a> </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id, type) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete.php?part_id=" + product_id + '&type=' + type;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? } ?>

<? if ($_POST["ch5"] == "5") { ?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select vol_id, vol_name ,experiment_name, vol_phone from volunteer natural join experiment";
    if (array_key_exists("search_keyword5", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword5"];
        $query =  $query . " where vol_name like '%$search_keyword%' or experiment_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 희망자 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>희망자 고유번호</th>
            <th>희망자 이름</th>
            <th>희망하는 실험 이름</th>
            <th>희망자 전화번호</th>
            <th>기능</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['vol_id']}</td>";
            echo "<td>{$row['vol_name']}</td>";
            echo "<td>{$row['experiment_name']}</td>";
            echo "<td>{$row['vol_phone']}</td>";
            echo "<td width='17%'>
            	  <a href='volunteer.php?vol_id={$row['vol_id']}'><button class='button primary small'>수정</button></a>
            	  <button onclick='javascript:deleteConfirm({$row['vol_id']}, {$_POST['ch5']})' class='button danger small'>제거</button></a> </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id, type) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete.php?vol_id=" + product_id + '&type=' + type;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? } ?>


<? include("footer.php") ?>
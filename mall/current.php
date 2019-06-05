<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select experiment_id, experiment_name, ad_name, dep_name, date, count(part_id) as ct from experiment natural left join participants natural join advisor natural join department group by experiment_id";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where experiment_name like '%$search_keyword%' or experiment_description like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
	<h3>실험 현황 조회</h3>  
	
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>실험 이름</th>
            <th>담당자</th>
            <th>담당부서</th>
            <th>일자</th>
            <th>참가자 수</th>
            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['experiment_name']}</td>";
            echo "<td>{$row['ad_name']}</td>";
            echo "<td>{$row['dep_name']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "<td>{$row['ct']}</td>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
    
    <script>
        function deleteConfirm(product_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "product_delete.php?experiment_id=" + experiment_id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>

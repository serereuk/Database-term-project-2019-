<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "dep_insert.php";

if (array_key_exists("experiment_id", $_GET)) {
    $experiment_id = $_GET["experiment_id"];
    $query =  "select * from experiment where experiment_id = $experiment_id";
    $res = mysqli_query($conn, $query);
    $exp = mysqli_fetch_array($res);
    if(!$exp) {
        msg("실험이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "modify.php";
}

$department = array();

$query = "select * from department";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $department[$row['dep_id']] = $row['dep_name'];
}

$advisor = array();
$query = "select * from advisor";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $advisor[$row['ad_id']] = $row['ad_name'];
}


?>
    <div class="container">
        <form name="dept_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="experiment_id" value="<?=$exp['experiment_id']?>"/>
            <input type="hidden" name="type" value='3'>
            <h3>담당부서 정보 <?=$mode?></h3>
            <p>
            	<label for="experiment_name">실험 이름</label>
            	<input type='text' placeholder='실험 이름 입력' id='experiment_name' name ='experiment_name' value = "<?=$exp['experiment_name']?>"/>
            </p>
            
            <p>
                <label for="ad_id">담당자</label>
                <select name="ad_id" id="ad_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($advisor as $id => $name) {
                            if($id == $exp['experiment_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="dep_id">담당부서</label>
                <select name="dep_id" id="dep_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($department as $id => $name) {
                            if($id == $exp['experiment_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="date">실험 일자</label>
                <input type="text" placeholder="실험일자 - 없이 입력 ex) 20190505" id="date" name="date" value="<?=$exp['date']?>"/>
            </p>
            <p>
                <label for="product_desc">실험설명</label>
                <textarea placeholder="실험설명 입력" id="experiment_description" name="experiment_description" rows="10"><?=$exp['experiment_description']?></textarea>
            </p>
            
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("experiment_name").value == "") {
                        alert ("실험 이름을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("dep_id").value == -1) {
                        alert ("담당부서 고유번호 입력해주세요"); return false;
                    }
                    else if(document.getElementById("ad_id").value == -1) {
                        alert ("담당자 고유번호 입력해주세요"); return false;
                    }
                    else if(document.getElementById("date").value == "") {
                        alert ("날짜 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("experiment_description").value == "") {
                        alert ("실험 설명을 입력해 주십시오"); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
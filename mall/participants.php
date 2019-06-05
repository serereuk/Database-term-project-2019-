<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "dep_insert.php";

if (array_key_exists("part_id", $_GET)) {
    $part_id = $_GET["part_id"];
    $query =  "select * from participants where part_id = '$part_id'";
    $res = mysqli_query($conn, $query);
    $part = mysqli_fetch_array($res);
    if(!$part) {
        msg("참가자가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "modify.php";
}

$experiment = array();

$query = "select * from experiment";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $experiment[$row['experiment_id']] = $row['experiment_name'];
}

?>
    <div class="container">
        <form name="dept_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="part_id" value="<?=$part['part_id']?>"/>
            <input type="hidden" name="type" value='4'>
            <h3>담당부서 정보 <?=$mode?></h3>
            <p>
            	<label for="part_name">실험 참가자 이름</label>
            	<input type='text' placeholder='실험 이름 입력' id='part_name' name ='part_name' value = "<?=$part['part_name']?>"/>
            </p>
            
            <p>
                <label for="experiment_id">실험</label>
                <select name="experiment_id" id="experiment_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($experiment as $id => $name) {
                            if($id == $part['part_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="part_height">실험 참가자 키 입력</label>
                <input type="text" placeholder="키 입력 178.02" id="part_height" name="part_height" value="<?=$part['part_height']?>"/>
            </p>
            <p>
                <label for="part_weight">실험 참가자 몸무게 입력</label>
                <input type="text" placeholder="몸무게 입력 78.02" id="part_weight" name="part_weight" value="<?=$part['part_weight']?>"/>
            </p>
            <p>
                <label for="part_age">실험 참가자 나이 입력</label>
                <input type="text" placeholder="나이 입력 25" id="part_age" name="part_age" value="<?=$part['part_age']?>"/>
            </p>
            <p>
                <label for="part_phone">실험 참가자 전화번호</label>
                <input type="text" placeholder="전화번호 입력 - 없이 입력 ex) 0111111111" id="part_phone" name="part_phone" value="<?=$part['part_phone']?>"/>
            </p>
            
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("part_name").value == "") {
                        alert ("참가자 이름을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("experiment_id").value == -1) {
                        alert ("실험 입력해주세요"); return false;
                    }
                    else if(document.getElementById("part_phone").value == -1) {
                        alert ("연락처 입력해주세요"); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
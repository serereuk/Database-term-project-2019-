<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "dep_insert.php";

if (array_key_exists("vol_id", $_GET)) {
    $vol_id = $_GET["vol_id"];
    $query =  "select * from volunteer where vol_id = $vol_id";
    $res = mysqli_query($conn, $query);
    $vol = mysqli_fetch_array($res);
    if(!$vol) {
        msg("희망자가 존재하지 않습니다.");
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
            <input type="hidden" name="vol_id" value="<?=$vol['vol_id']?>"/>
            <input type="hidden" name="type" value='5'>
            <h3>담당부서 정보 <?=$mode?></h3>
            <p>
            	<label for="vol_name">실험 희망자 이름</label>
            	<input type='text' placeholder='희망자 이름 입력' id='vol_name' name ='vol_name' value = "<?=$vol['vol_name']?>"/>
            </p>
            
            <p>
                <label for="experiment_id">희망하는 실험</label>
                <select name="experiment_id" id="experiment_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($experiment as $id => $name) {
                            if($id == $vol['vol_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="vol_height">실험 희망자 키 입력</label>
                <input type="text" placeholder="키 입력 178.02" id="vol_height" name="vol_height" value="<?=$vol['vol_height']?>"/>
            </p>
            <p>
                <label for="vol_weight">실험 희망자 몸무게 입력</label>
                <input type="text" placeholder="몸무게 입력 78.02" id="vol_weight" name="vol_weight" value="<?=$vol['vol_weight']?>"/>
            </p>
            <p>
                <label for="vol_age">실험 희망자 나이 입력</label>
                <input type="text" placeholder="나이 입력 25" id="vol_age" name="vol_age" value="<?=$vol['vol_age']?>"/>
            </p>
            <p>
                <label for="vol_phone">실험 희망자 전화번호</label>
                <input type="text" placeholder="전화번호 입력 - 없이 입력 ex) 0111111111" id="vol_phone" name="vol_phone" value="<?=$vol['vol_phone']?>"/>
            </p>
            
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("vol_name").value == "") {
                        alert ("희망자 이름을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("experiment_id").value == -1) {
                        alert ("실험 입력해주세요"); return false;
                    }
                    else if(document.getElementById("vol_phone").value == -1) {
                        alert ("연락처 입력해주세요"); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
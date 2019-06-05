<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "dep_insert.php";

if (array_key_exists("ad_id", $_GET)) {
    $ad_id = $_GET["ad_id"];
    $query =  "select * from department where dept_id = $ad_id";
    $res = mysqli_query($conn, $query);
    $ad = mysqli_fetch_array($res);
    if(!$ad) {
        msg("담당자가 존재하지 않습니다.");
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


?>
    <div class="container">
        <form name="dept_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="ad_id" value="<?=$ad['ad_id']?>"/>
            <input type="hidden" name="type" value='2'>
            <h3>담당부서 정보 <?=$mode?></h3>
            <p>
            	<label for="ad_name">담당자 이름</label>
            	<input type='text' placeholder='담당자 이름 입력' id='ad_name' name ='ad_name' value = "<?=$ad['ad_name']?>"/>
            </p>
            
            <p>
                <label for="dep_id">담당부서</label>
                <select name="dep_id" id="dep_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($department as $id => $name) {
                            if($id == $ad['ad_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="ad_phone">담당자 전화번호</label>
                <input type="text" placeholder="담당자 전화번호 입력 - 없이 입력 ex) 0111111111" id="ad_phone" name="ad_phone" value="<?=$ad['ad_phone']?>"/>
            </p>
            <p>
                <label for="ad_email">담당자 이메일</label>
                <input type='text' placeholder="담당자 이메일" id="ad_email" name="ad_email" value="<?=$ad['ad_email']?>"/>
            </p>
            <p>
                <label for="ad_position">담당자 직책</label>
                <input type="text" placeholder="담당자 직책" id="ad_position" name="ad_position" value="<?=$ad['ad_position']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("ad_name").value == "") {
                        alert ("담당자 이름을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("dep_id").value == -1) {
                        alert ("담당부서명을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("ad_phone").value == "") {
                        alert ("전화번호를 입력해주세요"); return false;
                    }
                    else if(document.getElementById("ad_email").value == "") {
                        alert ("담당자 이메일 입력해 주십시오"); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
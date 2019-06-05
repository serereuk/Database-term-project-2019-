<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "dep_insert.php";


if (array_key_exists("dep_id", $_GET)) {
    $dep_id = $_GET["dep_id"];
    $query =  "select * from department where dep_id = $dep_id";
    $res = mysqli_query($conn, $query);
    $dep = mysqli_fetch_array($res);
    if(!$dep) {
        msg("담당부서가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "modify.php";
}

?>

    <div class="container">
        <form name="dept_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="dep_id" value="<?=$dep['dep_id']?>"/>
            <input type="hidden" name="type" value='1'>
            <h3>담당부서 정보 <?=$mode?></h3>
            <p>
            	<label for="prof_name">담당교수 성함</label>
            	<input type='text' placeholder='교수님 성함 입력' id='prof_name' name = 'prof_name' value = "<?=$dep['prof_name']?>"/>
            </p>
            <p>
                <label for="dep_name">담당부서명</label>
                <input type="text" placeholder="담당부서명 입력" id="dep_name" name="dep_name" value="<?=$dep['dep_name']?>"/>
            </p>
            <p>
                <label for="univ_name">대학명</label>
                <input type='text' placeholder="대학명 입력" id="univ_name" name="univ_name" value="<?=$dep['univ_name']?>"/>
            </p>
            <p>
                <label for="dep_phone">부서 전화번호</label>
                <input type="text" placeholder="- 없이 입력 ex) 0211111111" id="dep_phone" name="dep_phone" value="<?=$dep['dep_phone']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("prof_name").value == "") {
                        alert ("담당 교수님 성함을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("dep_name").value == "") {
                        alert ("담당부서명을 입력해주세요"); return false;
                    }
                    else if(document.getElementById("univ_name").value == "") {
                        alert ("대학명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("dep_phone").value == "") {
                        alert ("담당부서 전화번호를 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
<!DOCTYPE HTML>
<?
include 'header.php';
?>
<head>
	<link rel="stylesheet" href="button.css">
</head>
<body>
	
	<p align=center>무엇을 관리하고 싶은가용?</p>
	
	<form id= 'tofinds' name = 'tofinds' action='javascript:typ()'>
		<div style="text-align:center">
		<input type='text' id= 'findings' name='findings' placeholder = '엔터키를 입력해야 검색가능합니당' />
		</div>
	</form>
	
	<div id="container">
		
		<form id="check1" name="check1" action="viewing.php" method="post" >
			<input type='hidden' id ='ch1' name = 'ch1' value = '1' />
			<input type='hidden' id = 'search_keyword1' name = 'search_keyword1'  />
			<div  class='button-1'>
    			<div class='eff-1'></div>
    			<a onclick="document.check1.submit();" >담당부서 관리</a>
    		</div>
		</form>
		<form id="check2" name="check2" action="viewing.php" method="post">
    		<input type='hidden' name = 'ch2' value = 2 />
    		<input type='hidden' id = 'search_keyword2' name = 'search_keyword2' />
    		<div  class='button-2'>
    			<div class='eff-2'></div>
    			<a onclick="document.check2.submit();">담당자 관리</a>
    		</div>
		</form>
		<form id="check3", name="check3" action="viewing.php" method="post">
    		<div  class='button-3'>
    			<div class='eff-3'></div>
    			<input type='hidden' name = 'ch3' value = 3 />
    			<input type='hidden' id = 'search_keyword3' name = 'search_keyword3' />
    			<a onclick="document.check3.submit();">실험 관리</a>
    		</div>
		</form>
		<form id="check4", name="check4" action="viewing.php" method="post">
    		<div  class='button-4'>
    			<div class='eff-4'></div>
    			<input type='hidden' name = 'ch4' value = 4 />
    			<input type='hidden' id = 'search_keyword4' name = 'search_keyword4' />
    			<a onclick="document.check4.submit();">실험 참가자 관리</a>
    		</div>
		</form>
		<form id="check5", name="check5" action="viewing.php" method="post">
    		<div  class='button-5'>
    			<div class='eff-5'></div>
    			<input type='hidden' name = 'ch5' value = 5 />
    			<input type='hidden' id = 'search_keyword5' name = 'search_keyword5'  />
    			<a onclick="document.check5.submit();">실험 희망자 관리</a>
    		</div>
		</form>
	</div>
	

</body>

<script type="text/javascript"> 
function typ(){
	var test = document.tofinds.findings.value;
    document.getElementById("search_keyword1").setAttribute('value',test);
    document.getElementById("search_keyword2").setAttribute('value',test);
    document.getElementById("search_keyword3").setAttribute('value',test);
    document.getElementById("search_keyword4").setAttribute('value',test);
    document.getElementById("search_keyword5").setAttribute('value',test);
    return;
}
</script>


<?
include 'footer.php';
?>

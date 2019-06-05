<?
include 'header.php';
?>
<head>
	<link rel="stylesheet" href="button.css">
</head>
<body>
	
	<p align=center>무엇을 등록하고 싶은가용?</p>
	<div id="container">
		<form action="dept.php" method="post">
    		<div  class='button-1'>
    			<div class='eff-1'></div>
    			<a href="dept.php">담당부서 등록</a>
    		</div>
    		
		</form>
		<form action="advisor.php" method="post">
    		<div  class='button-2'>
    			<div class='eff-2'></div>
    			<a href="advisor.php">담당자 등록</a>
    		</div>
		</form>
		<form action="experiment.php" method="post">
    		<div  class='button-3'>
    			<div class='eff-3'></div>
    			<a href="experiment.php">실험 등록</a>
    		</div>
		</form>
		<form action="participants.php" method="post">
    		<div  class='button-4'>
    			<div class='eff-4'></div>
    			<a href="participants.php">실험 참가자 등록</a>
    		</div>
		</form>
		<form action="volunteer.php" method="post">
    		<div  class='button-5'>
    			<div class='eff-5'></div>
    			<a href="volunteer.php">실험 희망자 등록</a>
    		</div>
		</form>
	</div>
	

</body>


<?
include 'footer.php';
?>

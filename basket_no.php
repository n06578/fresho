

<?php include "db.php"; ?>

<?php	
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>장바구니</title>
<link rel="stylesheet" type="text/css" href="css/basket.css" />
</head>
<body>
	<script type="text/javascript">
		<!-- alert('어서오세요. 우측 상단의 회원가입 버튼을 눌러주세요.');  -->
		var result = confirm('로그인이 필요합니다.');
		if(result) {
			window.location.href ="http://fresho.dothome.co.kr/index.html";		
		}
		else {
		<!-- alert("취소"); -->
			window.location.href ="http://fresho.dothome.co.kr/login.html";
		}
		<!-- alert(returnValue); -->
		
	</script>

		<footer></footer>
</body>
</html>


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
<body><?php
		
		
		$username = $_SESSION['phone'];

		$bno = $_GET['no']; /* bno함수에 no 받아와 넣음*/
		$sql = mq("select * from Cafe where no='".$bno."'"); /* 받아온 no값을 선택 */
		$shopinfo = $sql->fetch_array();
		$count = $_GET['var'];

		$ba_pic = $shopinfo['img'];
		$ba_name = $shopinfo['name'];
		$ba_price = $shopinfo['price'];


		$sql2 = mq("insert into basket(img,name,price,phone,count,f_id) values('".$ba_pic."','".$ba_name."','".$ba_price."','".$username."','".$count."','0')");

		?>
	<script type="text/javascript">
		<!-- alert('어서오세요. 우측 상단의 회원가입 버튼을 눌러주세요.');  -->
		var result = confirm('장바구니에 추가되었습니다.');
		if(result) {
			window.location.href ="http://fresho.dothome.co.kr/basket.php";		
		}
		else {
		<!-- alert("취소"); -->
			window.location.href ="http://fresho.dothome.co.kr/basket.php";		
		}
		<!-- alert(returnValue); -->
		
	</script>

		<footer></footer>
</body>
</html>
<?php include "db.php"; ?>

<?php	
	session_start();
	
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8" />
<title>fresho 음료상세페이지</title>
<link rel="stylesheet" type="text/css" href="css/prodot2.css" />
</head>
						
		<header class="header">

				
	
					
	
					
			<div class="header-box">
				<div class="header-left">
					<div class="logo">
						<a href="http://fresho.dothome.co.kr">
							<img class="logo-static" src="main(image)/logo(finish).png" alt="freshO"/>
						</a>
						
					</div>
				</div>
				
				
				
				
					<div class="nav-box">
						<ul class="menu-box">
							<li><a href="http://fresho.dothome.co.kr/list.html"/>
								<img class="menu" id="check" src="main(image)/fresh.png" alt="fresh"/></a></li>
							<li><a href="http://fresho.dothome.co.kr/cook.html"/>
								<img class="menu" src="main(image)/cook.png" alt="cook"/></a></li>
							<li><a href="http://fresho.dothome.co.kr/cafe.html"/>
								<img class="menu" src="main(image)/cafe.png" alt="cafe"/></a></li>
							<li><a href="http://fresho.dothome.co.kr/mypage.html"/>
								<img class="menu" src="main(image)/mypage.png" alt="mypage"/></a></li>
							<li><a href="http://fresho.dothome.co.kr/QnA.html"/> 
							<!-- 예시 -->
								<img class="menu" src="main(image)/QnA.png" alt="QnA"/></a></li>
							<li><a class="btn" href="http://fresho.dothome.co.kr/login.html" target="self"> 
								<img class="login-btn" src="main(image)/login.png" alt="login"/></a></li></a> 
						</ul>
					</div>
				
					
			</div>
			
			
			

	</header>
<body>
	
	


	
	
	
		<?php
		$bno = $_GET['no']; /* bno함수에 no값을 받아와 넣음*/
		$sql = mq("select * from Cafe where no='".$bno."'"); /* 받아온 idx값을 선택 */
		$shopinfo = $sql->fetch_array();
		
	?>
	

	
	
	
	<div id="bg1"></div>
	<div id="main_in">
		<div id="menu">
			
				<div id="content">

					<div id="shop_p_img">
								
					           <img src="<?php echo $shopinfo['img'];?>" alt="propic" title="propic" />
									
					</div>
					<div id="shop_p_info">
						<ul>
							<li>상품 제목 : <?php echo $shopinfo['name']; ?></li>
							
							<li>가격 : <?php echo $shopinfo['price']; ?>원</li>
						</ul>
						<div id="shop_icon">
							<ul>
								<li><a href="buy_no.php?no=<?php echo $shopinfo['no'];?>"><img src="list(image)/buy.png" alt="buy_icon" title="buy_icon" /></a></li>
								<li><a href="basket_no.php?no=<?php echo $shopinfo['no'];?>"><img src="list(image)/basket.png" alt="" title="" /></a></li>
							</ul>
						</div>
							
						<div id="count_icon">

						 <table border="none"><td>수량</td><td id="test" width=100px; height=30px; >0</td></table>
						
						
						
							<div id = "count_icon2">
								<script type="text/javascript">
								function plus() {
								var td = document.getElementById("test");
								var n = Number(td.innerHTML);
								td.innerHTML = n + 1;
								}
								
								function minus() {
								var td = document.getElementById("test");
								var n = Number(td.innerHTML);
								
								
						
									if (n > 0) {
										td.innerHTML = n - 1;
										
									}
									else { 
									window.alert('1개 이상 선택해주세요.')
										n.getElementById('test').value='';
									}
								}
								
								</script>
								
								<ul>
									<li><img src="list(image)/up.png" type="button" value="push"  onclick="plus()"  /></li>
									<li><img src="list(image)/down.png" type="button" value="push"  onclick="minus()"  /></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	<footer></footer>
</body>
</html>
<?php include "db.php"; ?>

<?php	
	session_start();
	
?>

<!DOCTYPE html>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
  <!-- iamport.payment.js -->
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
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
									<a href="http://fresho.dothome.co.kr/aaindex.html">
										<img class="logo-static" src="main(image)/logo(finish).png" alt="freshO"/>
									</a>
								</div>
							</div>
						</div>


						<div class="nav-box">
							<ul class="menu-box">
								<li>
									<a href="http://fresho.dothome.co.kr/aalist.html">
										<img class="menu" id="check"  src="main(image)/fresh.png" alt="fresh"/>
									</a>
								</li>
								<li>
									<a href="http://fresho.dothome.co.kr/aacook.html">
										<img class="menu"  src="main(image)/cook.png" alt="cook"/>
									</a>
								</li>
								<li>
									<a href="http://fresho.dothome.co.kr/aatest.html">
										<img class="menu" src="main(image)/cafe.png" alt="cafe"/>
									</a>
								</li>
								<li>
									<a href="http://fresho.dothome.co.kr/aamypage.html">
										<img class="menu" src="main(image)/mypage.png" alt="mypage"/>
									</a>
								</li>
								<li>
									<a href="http://fresho.dothome.co.kr/aaQNA.php">
										<img class="menu" src="main(image)/QnA.png" alt="QnA"/>
									</a>
								</li>
								<li><a class="btn" href="http://fresho.dothome.co.kr/basket.php" target="self"> 
								<img class="login-btn" src="main(image)/cart_ok.png" alt="cart"/></a></li></a> 
							</ul>
						</div>

					</header>
<body>
	
	
	<?php
		$bno = $_GET['no']; /* bno함수에 no값을 받아와 넣음*/
		$sql = mq("select * from List where no='".$bno."'"); /* 받아온 idx값을 선택 */
		$shopinfo = $sql->fetch_array();
		
		$username = $_SESSION['phone'];
		echo "<p>고객명: <strong><font size=4>$username</strong> 님<br>"; 
	?>
	

	
	
	
	<div id="bg1"></div>
	<div id="main_in">
		<div id="menu">
		
		
				<script type="text/javascript">
								function plus() {
								var td = document.getElementById("test");
								var n = Number(td.innerHTML);
								td.innerHTML = n + 1;
								}
								
								function minus() {
								var td = document.getElementById("test");
								var n = Number(td.innerHTML);
								
								
						
									if (n > 1) {
										td.innerHTML = n - 1;
										
									}
									else { 
									window.alert('1개 이상 선택해주세요.')
										n.getElementById('test').value='';
									}
								}
								
								
							function count(){
									var td = document.getElementById("test");
									var n = Number(td.innerHTML);
									if(n>0){
                                        window.location.href = "basket_ok2.php?no=<?php echo $shopinfo['no'];?> & var="+n;
								}
									else{
										window.alert('1개 이상 선택해주세요.');
										n.getElementById('test').value='';
									}
							}
								
								
								function buy(){
									var td = document.getElementById("test");
									var n = Number(td.innerHTML);
									if(n>0){
                                        window.location.href = "abuy.php?no=<?php echo $shopinfo['no'];?> & var="+n;

								}
									else{
										window.alert('1개 이상 선택해주세요.');
										n.getElementById('test').value='';
									}
							}
								</script>
			
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
								<li><a onclick="buy()"><img src="list(image)/buy.png" alt="buy_icon" title="buy_icon" /> </a></li>
								<li><a onclick="count()"><img src="list(image)/basket.png" alt="bag_icon" title="bag_icon" /></a></li>
							</ul>
						</div>
						<?php
								$var = '<script>var td = document.getElementById("test");</script>';
								$var2='<script>	var n = Number(td.innerHTML);</script>';
							?>
							
						<div id="count_icon">

						 <table border="none"><td>수량</td><td id="test" width=100px; height=30px; >0</td></table>
							
						
							<div id = "count_icon2">
						
								
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
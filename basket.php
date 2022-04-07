<?php include "db.php"; ?>

<?php	
	session_start();
?>

<!DOCTYPE html>
<html>
<head>


 
 
 
    <script>
	// 아이템 선택시 전체선택 풀림
	function checkSelectAll()  {
  // 전체 체크박스
  const checkboxes 
    = document.querySelectorAll('input[name="animal"]');
  // 선택된 체크박스
  const checked 
    = document.querySelectorAll('input[name="animal"]:checked');
  // select all 체크박스
  const selectAll 
    = document.querySelector('input[name="selectall"]');
  
  if(checkboxes.length === checked.length)  {
    selectAll.checked = true;
  }else {
    selectAll.checked = false;
  }

}
		// 전체선택
       function selectAll(selectAll)  {
		const checkboxes 
			= document.getElementsByName('animal');
  
		checkboxes.forEach((checkbox) => {
		checkbox.checked = selectAll.checked;
		})
	}



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

//------------------------------------------------------------
function getCheckboxValue()  {
  // 선택된 목록 가져오기
  const query = 'input[name="animal"]:checked';
    const selectedEls = 
        document.querySelectorAll(query);
    
    // 선택된 목록에서 value 찾기
    let result = '';
    selectedEls.forEach((el) => {
        result += el.value + ' ';
    })
    
    // 출력
    document.getElementById('result').innerText
        = result;

    
}



	
	
    </script>

<meta charset="utf-8" />
<title>장바구니</title>
<link rel="stylesheet" type="text/css" href="css/basket.css" />

  

</head>

<body>
	
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
										<img class="menu"   src="main(image)/fresh.png" alt="fresh"/>
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
								<li><a href="http://fresho.dothome.co.kr/aaQNA.php"> 
										<img class="menu" src="main(image)/QnA.png" alt="QnA"/>
									</a>
								</li>
								<li><a class="btn" href="http://fresho.dothome.co.kr/basket.php" target="self"> 
								<img class="login-btn" id="check" src="main(image)/cart_ok.png" alt="cart"/></a></li></a> 
							</ul>
						</div>



					</header>

	<?php
		
		
		$username = $_SESSION['phone'];
	
		$bno = $_GET['no']; /* bno함수에 no 받아와 넣음*/
		$sql = mq("select * from Cafe where no='".$bno."'"); /* 받아온 no값을 선택 */
		$shopinfo = $sql->fetch_array();

		$ba_no = $shopinfo['no'];
		$ba_pic = $shopinfo['img'];
		$ba_name = $shopinfo['name'];
		$ba_price = $shopinfo['price'];

		$sql2 = mq("insert into basket(img,name,price,phone,count) values('".$ba_pic."','".$ba_name."','".$ba_price."','".$username."','".$count."')");

		
		
		echo "<p>고객명: <strong><font size=4>$username</strong> 님<br>"; 
		
	?>
	<div id="content">
				
					<h2>장바구니</h2>
					
					 <table class="list-table" name="f">
				      <thead>
				          <tr>
							  <th width="100"><input type="checkbox" name='selectall'  value='selectall' onclick='selectAll(this)'/>ALL</th>
				              <th width="350">상품정보</th>
				              <th width="120">상품금액</th>
							  <th width="80">수량</th>
                              
				           </tr>
				        </thead>

				         <?php 
				        	$sql3 = mq("select * from basket where phone='".$username."' order by no asc");
							while($bask = $sql3->fetch_array()){
						?>

				        <tbody>
				        <tr>
						  <td><input type="checkbox" name='animal' value='<?php echo $bask['name'];?>' onclick='checkSelectAll()'/></td>

				          <td width="300">						  
				          	<div class="bak_item">
                                  <a href="aalistinfo.php?no=<?php echo $bask['f_id'];?>">
							<div class="proimg"><img src="<?php echo $bask['img'];?>" alt="propic" title="propic" /></div>
							<div class="proname"><?php echo $bask['name'];?></div>
							</div>
				          </td>

				          <td width="150"><?php echo $bask['price'];?></td>
				          <td width="150"><?php echo $bask['count'];?></td>

                         

                          <td><a href="deleteBasket.php?no=<?php echo $bask['no']; ?>" style="color:#F39800; text-decoration:none;" >[삭제]</a></td>                      
				        </tr>
				      </tbody>
				  <?php } ?>
				    </table>
					
					

					<table id='result'>
                        
                        <button onclick='getCheckboxValue()' >구매하기</button>
                        
                        
                    
					
                   
                    </table>
				
	</div>
		<footer></footer>
</body>
</html>
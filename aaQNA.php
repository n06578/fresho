<?php include "db.php"; ?>

<!doctype html>
<head>
	<meta charset="UTF-8">

		<header class="header">


			<div class="header-box">
				<div class="header-left">
					<div class="logo">
						<a href="http://fresho.dothome.co.kr/aaindex.html">
							<img class="logo-static" src="../main(image)/logo(finish).png" alt="freshO"/>
						</a>
					</div>
				</div>
			</div>


			<div class="nav-box">
				<ul class="menu-box">
					<li>
						<a href="http://fresho.dothome.co.kr/aalist.html">
							<img class="menu"  src="../main(image)/fresh.png" alt="fresh"/>
						</a>
					</li>
					<li>
						<a href="http://fresho.dothome.co.kr/aacook.html">
							<img class="menu" src="../main(image)/cook.png" alt="cook"/>
						</a>
					</li>
					<li>
						<a href="http://fresho.dothome.co.kr/aatest.html">
							<img class="menu" src="../main(image)/cafe.png" alt="cafe"/>
						</a>
					</li>
					<li>
						<a href="http://fresho.dothome.co.kr/aamypage.html">
							<img class="menu" src="../main(image)/mypage.png" alt="mypage"/>
						</a>
					</li>
					<li>
						<a href="http://fresho.dothome.co.kr/aaQnA.html">
							<img class="menu" id="check" src="../main(image)/QnA.png" alt="QnA"/>
						</a>
					</li>
					
					<li><a class="btn" href="http://fresho.dothome.co.kr/basket.php" target="self"> 
								<img class="login-btn" src="main(image)/cart_ok.png" alt="cart"/></a></li></a> 
				</ul>
			</div>



		</header>
		<title>fresho Q&A게시판</title>
		<link rel="stylesheet" type="text/css" href="css/qna.css" />
	</head>
	<body>
		<div id="board_area"> 
			<div id="menu">
			</div>
			<h1>
				<span style="color:#F39800">
					< Q&A 자유게시판 >
					</span>
				</h1>
				<br/>
				<h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
				<table class="list-table">
					<thead>
						<tr>
							<th width="70">번호</th>
							<th width="500">제목</th>
							<th width="120">글쓴이</th>
							<th width="100">작성일</th>
							<th width="100">조회수</th>
						</tr>
					</thead>
					<?php
        // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = mq("select * from board order by idx desc limit 0,5"); 
            while($board = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
					<tbody>
						<tr>
							<td width="70">
								<?php echo $board['idx']; ?>
							</td>
							<td width="500">
                                <?php 
                         $lockimg = "<img src='list(image)/up.png' alt='lock' title='lock' with='20' height='20' />";
                        if($board['lock_pw']=="1")
                         { ?><a href='ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
                         }else{  ?>

								<a href="read.php?idx=<?php echo $board["idx"];?>">
                                    <?php echo $title; }?>
								</a>
							</td>

							<td width="120">
								<?php echo $board['name']?>
							</td>
							<td width="100">
								<?php echo $board['date']?>
							</td>
							<td width="100">
								<?php echo $board['hit']; ?>
							</td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
				<div id="write_btn">
					<a href="write.php">
						<button>글쓰기</button>
					</a>
				</div>
			</div>
		</body>
	</html>
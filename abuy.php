
<?php include "db.php"; ?>

<?php	
	session_start();
    $bno = $_GET['no']; /* bno함수에 no 받아와 넣음*/
    $sql = mq("select * from List where no='".$bno."'"); /* 받아온 no값을 선택 */
    $count = $_GET['var'];
    $shopinfo = $sql->fetch_array();
    $name= $shopinfo['name'];
    $price = $shopinfo['price'];
    $ba_pic = $shopinfo['img'];
    $username = $_SESSION['phone'];

    $total= $price*$count;

?>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
  <!-- iamport.payment.js -->
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>


<script>
  
  IMP.init('imp88676360');
IMP.request_pay({
    pg : 'utf-8',
    pay_method : 'card',
    merchant_uid : '<?php echo $name; ?>',
    name : '<?php echo $name; ?>',
    amount : <?php echo $total; ?>,
    buyer_email : 'no',
    buyer_name : '<?php echo $username; ?>',
    buyer_tel : '010-1234-5678'
}, function(rsp) {
    if ( rsp.success ) {
        var msg = '결제가 완료되었습니다.';
        msg += '고유ID : ' + rsp.imp_uid;
        msg += '결제상품 : ' + rsp.merchant_uid;
        msg += '결제 금액 : ' + rsp.paid_amount;
        msg += '카드 승인번호 : ' + rsp.apply_num;
        window.location.href ="http://fresho.dothome.co.kr/aamypage.html";		
        //window.location.href ="http://fresho.dothome.co.kr/aamypage.html?name="+name+"&count="+amount;		
       
    } else {
        var msg = '결제에 실패하였습니다.';
        msg += '에러내용 : ' + rsp.error_msg;

    }

    alert(msg);
});

    </script>
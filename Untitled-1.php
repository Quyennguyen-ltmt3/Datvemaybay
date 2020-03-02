<?php
	session_start();
	include("connection.php");
	
	$loginInfo = "";
	if (isset($_SESSION['User']) && $_SESSION['User'] != "") {
		$sql = "SELECT * FROM datve";
		$q = mysqli_query($conn, $sql);
		
		$loginInfo = mysqli_fetch_array($q);
		$arrNgayDi = explode("/", $loginInfo["NgayDi"]);
		$arrNgayVe = explode("/", $loginInfo["NgayVe"]);
	}
?>

<!doctype html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>Đặt vé máy bay</title>
</head>
<body>
	<div class="container-fluid">
		
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="../may-bay.-jpg.jpg" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Vé máy bay</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Tour du lịch</a>
    </li> 
	  <li class="nav-item">
      <a class="nav-link" href="#">Visa</a>
    </li>
		<li class="nav-item"> 
      <a class="nav-link" href="#">Bảo hiểm</a>
    </li>
	  	<li class="nav-item"> 
      <a class="nav-link" href="#">Khách sạn</a>
    </li>
  </ul>
</nav>
			
		<div class="card" style="width:188s0px">
  <img class="card-img-top" src="../ve-may-bay-vietnam-airlines.png" alt="Card image">
  <div class="card-img-overlay">
    <h4 class="card-title text-center">Đặt mua vé máy bay</h4>
    <div class="card-text">
    <hr>
    
    <form method="post">
    	<table>
        	<tr>
            	<td>Điểm đi<br>
                	<select name="cbbDiemDi">
                    	<?php 
							$sql = "SELECT DiemDi FROM diemdi";
							$q = mysqli_query($conn, $sql);
							
							while ($row = mysqli_fetch_array($q)) {
						?>
                    		<option value="<?php echo $row["DiemDi"];?>"
                                            <?php if ($loginInfo != "" && $row["DiemDi"] == $loginInfo["DiemDi"]) echo 'selected';?>>
												
											<?php echo $row["DiemDi"];?>
                            </option>
                        <?php
							}
						?>
                    </select>
                </td>
                <td>Điểm đến<br>
                	<select name="cbbDiemDen">
                    	<?php 
							$sql = "SELECT DiemDen FROM diemden";
							$q = mysqli_query($conn, $sql);
							
							while ($row = mysqli_fetch_array($q)) {
						?>
                    		<option value="<?php echo $row["DiemDen"];?>"
                                            <?php if ($loginInfo != "" && $row["DiemDen"] == $loginInfo["DiemDen"]) echo 'selected';?>>
												
											<?php echo $row["DiemDen"];?>
                            </option>
                        <?php
							}
						?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Ngày đi<br>
                	<select name="cbbNgayDi">
                    	<?php
							$i = 1;
							while ($i <= 31) {
                        ?>
                    	<option value="<?php echo $i;?>"
                                        <?php if ($loginInfo != "" && $i == $arrNgayDi[0]) echo 'selected';?>>
										<?php echo $i;?></option>
                        <?php
								$i++;
							}
						?>
                    </select>
                    <input type="month" name="cbbThangDi" value="<?php 
										if ($loginInfo != "")
											echo $arrNgayDi[1];?>">
                </td>
                <td>Ngày về<br>
                	<select name="cbbNgayVe">
	                    <?php
							$i = 1;
							while ($i <= 31) {
                        ?>
                    	<option value="<?php echo $i;?>"
                        				<?php if ($loginInfo != "" && $i == $arrNgayVe[0]) echo 'selected';?>>
										<?php echo $i;?></option>
                        <?php
								$i++;
							}
						?>
                    </select>
                    <input type="month" name="cbbThangVe" value="<?php 
										if ($loginInfo != "")
											echo $arrNgayVe[1];?>">
                </td>
            </tr>
        </table>
        
        <hr>
        
        <table>
        	<tr><td>Người lớn </td>
            	<td><select name="cbbNL">
                	<?php
						$i = 1;
						while ($i <= 10) {
                       ?>
                   	<option value="<?php echo $i;?>"
                    				<?php if ($loginInfo != "" && $i == $loginInfo["NguoiLon"]) echo 'selected';?>>
										<?php echo $i;?></option>
                       <?php
							$i++;
						}
					?>
                </select></td> 
                <td>Từ 12 tuổi trở lên)</td></tr>
            <tr><td>Trẻ em </td>
            	<td><select name="cbbTE">
					<?php
						$i = 1;
						while ($i <= 10) {
                       ?>
						<option value="<?php echo $i;?>"
                    				<?php if ($loginInfo != "" && $i == $loginInfo["TreEm"]) echo 'selected';?>>
										<?php echo $i;?></option>
                       <?php
							$i++;
						}
					?>
                </select></td> 
                <td>(Từ 2 đến dưới 12 tuổi)</td></tr>
            <tr><td>Em bé</td>
            	<td><select name="cbbEB">
					<?php
						$i = 1;
						while ($i <= 10) {
                       ?>
                   	<option value="<?php echo $i;?>"
                    				<?php if ($loginInfo != "" && $i == $loginInfo["EmBe"]) echo 'selected';?>>
										<?php echo $i;?></option>
                       <?php
							$i++;
						}
					?>
                </select></td>
                <td>(Dưới 2 tuổi)</td></tr>
        </table>
        
        <hr>
        
        <font size="+2">Xem video hướng dẫn</font>
        <input type="submit" name="btOK" value="<?php if ($loginInfo == "") echo "Mua ngay";
													  else echo "Sửa thông tin";?>">
        <?php
        	if ($loginInfo != "") {
		?>                      
        <br>                        
		<a href="../delete.php?XOA=<?php echo $loginInfo['User']?>" onClick="if(confirm('Muốn xóa không?')) 
										return true;
								    return false;">Xóa</a>
		<?php
			}
		?>
    </form>
    
    <?php
		if (isset($_POST['btOK'])) {
			$ngayDi = $_POST['cbbNgayDi']."/".$_POST['cbbThangDi'];
			$ngayVe = $_POST['cbbNgayVe']."/".$_POST['cbbThangVe'];
			
			$tienNL = $_POST['cbbNL'] * 2000000;
			$tienTE = $_POST['cbbTE'] * 1500000;
			$tienEB = $_POST['cbbEB'] * 400000;
			
			$tongTien = $tienNL + $tienTE + $tienEB;
			
			// INSERT
			if ($loginInfo == "") {
				$sql = "INSERT INTO `datve` (`User`, `Pass`, `DiemDi`, `DiemDen`, `NgayDi`, `NgayVe`, `NguoiLon`, `TreEm`, `EmBe`, `TongTien`) 
					VALUES ('A', 'A', '".$_POST['cbbDiemDi']."', '".$_POST['cbbDiemDen']."', '".$ngayDi."', '".$ngayVe."', '".$_POST['cbbNL']."', '".$_POST['cbbTE']."', '".$_POST['cbbEB']."', '".$tongTien."')";
			} else { // UPDATE
				$sql = "UPDATE `datve` 
						SET `DiemDi` = '".$_POST['cbbDiemDi']."', `DiemDen` = '".$_POST['cbbDiemDen']."', `NgayDi` = '".$ngayDi."', `NgayVe` = '".$ngayVe."', `NguoiLon` = '".$_POST['cbbNL']."', `TreEm` = '".$_POST['cbbTE']."', `EmBe` = '".$_POST['cbbEB']."' 
						WHERE `datve`.`User` = 'A'";
			}
			//echo $sql;
			$q = mysqli_query($conn, $sql);
			if ($q)
				echo "<script>alert('Đặt vé thành công!')</script>";
			else
				echo "<script>alert('Đặt vé thất bại!')</script>";
		}
	?>
	  </div>
    <a href="#" class="btn btn-primary">Đặt vé</a>
  </div>
</div>
		
		
		
		
		<div class="card-deck">
  <div class="card bg-primary">
    <div class="card-body">
      <p class="card-text">HƯỚNG DẪN ĐẶT VÉ<br>
Qua Điện thoại:<br>

Ms. Phượng 0938389757<br>

Ms.Tú 0938395797<br>

Mr Phát 0914389757<br>

Ms.Ly 0941319797<br>

Qua website: https://vietnamairslines.com/<br>

Trực tiếp trên website, nhanh chóng - tiện lợi<br>

Đến trực tiếp văn phòng của chúng tôi:<br>

Công ty TNHH TM-DV-DL Phước Minh 150 Dương Văn Dương, P.Tân Quý, Q.Tân Phú, TP HCMXem bản đồ<br>

Chat hỗ trợ trực tuyến:<br>

Ms. Phượng<br>
Ms.Tú<br>
Mr Phát<br>
Ms.Ly</p>
    </div>
  </div>
  <div class="card bg-warning">
    <div class="card-body">
      <p class="card-text">HƯỚNG DẪN THANH TOÁN<br>
Thanh toán bằng tiền mặt tại văn phòng<br>

Sau khi đặt vé thành công, Quý khách vui lòng qua văn phòng để thanh toán và nhận vé.<br>

Thanh toán trực tuyến bằng thẻ Visa, Master, JCB, Internet-Banking<br>

Quý khách có thể thanh toán trực tuyến bằng thẻ Visa, Master, JCB, thẻ ATM có đăng ký Internet-Banking<br>

Thanh toán tại nhà<br>

Nhân viên Phòng vé sẽ giao vé và thu tiền tại nhà theo địa chỉ Quý khách cung cấp.<br>

Thanh toán qua Chuyển khoản<br>

Quý khách có thể thanh toán cho chúng tôi bằng cách chuyển khoản trực tiếp tại ngân hàng, chuyển khoản qua ATM, hoặc qua Internet banking.<br>



Vé máy bay rất hân hạnh được phục vụ Quý khách. Khi chuyển khoản quý khách vui lòng liên hệ sớm với nhân viên tư vấn để được hỗ trợ tốt nhất.</p>
    </div>
  </div>
</div>

		
		<div class="row p-3 bg-dark text-light">
      <div class="col-sm">
      <a href="#">THÔNG TIN VIETNAM AIRLINE</a><br>
Hệ thống 205  (8:00-21:30)<br>
Giới thiệu VIETNAM AIRLINE<br>
Hệ thống các VIETNAM AIRLINE<br>
Tuyển dụng<br>
Liên hệ và góp ý<br>
Phương thức thanh toán<br>
Thuê mặt bằng<br>
	</div>
      <div class="col-sm">
      <a href="#">HỖ TRỢ KHÁCH HÀNG</a><br>
Hướng dẫn đặt vé Online<br>
Hình thức thanh toán<br>
Chính sách hoàn hủy vé<br>
Chính sách giao hàng<br>
Chính sách bảo mật TT cá nhân<br>
In hóa đơn điện tử<br>
      </div>
      <div class="col-sm">
      <a href="#">TỔNG ĐÀI HỖ TRỢ</a><br>
Bán hàng: 1900 6788<br>
Bảo hành: 1900 6743<br>
Khiếu nại: 1900 6741<br>
</div>
      <div class="col-sm">
      <a href="#">VIETNAM AIRLINES</a><br>
		  ĐC: Công ty TNHH TM-DV-DL Phước Minh</br>
150 Dương Văn Dương, P.Tân Quý, Q.Tân Phú, TP HCM</br>

			Hotline:(028)6265 8997 - 0914389757</br>

Email: vietnamairslines.com@gmail.com</br>

MST: 0312700857</br>

Chủ sở hữu: Vietnamairslines.com</br>

Email: vietnamairslines.com@gmail.com</br>

Website: https://vietnamairslines.com/</br>

2016 coppyright @ https://vietnamairslines.com/</br>

Đăng ký Email khuyến mãi</div>
    </div>


		
		
	</div>
</body>
</html>

<?php
	ob_start();
	session_start();
	echo $_SESSION["idGroup"];
	if(!isset($_SESSION["idUser"]) || $_SESSION["idGroup"] != 1){
		header("location:../index.php");
	}
	
	require "../lib/dbCon.php";
	require "../lib/quantri.php";
	
	
?>
<?php
if (isset($_POST["btnLogOut"]))
{
	echo $_SESSION["idGroup"];
	unset($_SESSION["idUser"]);
	unset($_SESSION["Username"]);
	unset($_SESSION["HoTen"]);
	unset($_SESSION["idGroup"]);
	header("location:../index.php");
}
?>
<?php 
	if(isset($_POST["btnThem"])){
		$TenTL = $_POST["TenTL"];
		$TenTL_KhongDau = changeTitle($TenTL);
		$ThuTu = $_POST["ThuTu"];
		settype($ThuTu, "int");
		$AnHien = $_POST["AnHien"];
		settype($AnHien, "int");	
		
		$conn 	= myConnect();
		$qr 	="
			INSERT INTO theloai
			VALUES(null, '$TenTL','$TenTL_KhongDau','$ThuTu','$AnHien')
		";
		mysqli_query($conn, $qr);
		header("location:listTheLoai.php");
		
	}
?>

	<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>ADMIN</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
					
                    TRANG QUẢN TRỊ
					
                </a>

            </div>

            <div class="right-div">
                <form method="post" action="">
					<input  type="submit" name="btnLogOut" id="btnLogOut" class="btn btn-info pull-right" value = "Log out">
				</form>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="../index.php" >TRANG CHỦ</a></li>
                             
                            <li><a href="./listTheLoai.php" class="menu-top-active">QUẢN LÝ THỂ LOẠI</a></li>
                            <li><a href="./listLoaiTin.php" >QUẢN LÝ LOẠI TIN </a></li>
                            <li><a href="./listTin.php">QUẢN LÝ TIN TỨC</a></li>
                            <li><a href="./listQuangCao.php">QUẢN lÝ QUẢNG CÁO</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
               	<div class ="table-responsive">
				
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
					  <tr>
						<td><form id="form1" name="form1" method="post" action="">
						  <table width="100%" border="1" class="table table-striped table-bordered table-hover">
							<tr>
							  <td colspan="2" style="text-align: center;background-color: #123751;color: white">THÊM THỂ LOẠI</td>
							  </tr>
							<tr>
							  <td>Tên Thể Loại</td>
							  <td><label for="TenTL"></label>
								<input type="text" name="TenTL" id="TenTL" /></td>
							</tr>
							<tr>
							  <td>Thứ Tự</td>
							  <td><label for="ThuTu"></label>
								<input type="text" name="ThuTu" id="ThuTu" /></td>
							</tr>
							<tr>
							  <td>Ẩn hiện</td>
							  <td><p>
								<label>
									<input type="radio" name="AnHien" value="1" id="AnHien_0" />
									Hiện</label>
								  <br />
								  <label>
									<input type="radio" name="AnHien" value="0" id="AnHien_1" />
									Ẩn</label>
								  <br />
							  </p></td>
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td><input type="submit" name="btnThem" id="btnThem" value="Thêm" /></td>
							</tr>
						  </table>
						</form></td>
					  </tr>
					</table>
					
					
				</div>
                
            </div>

        </div>
             <div class="row">
            <div class="col-md-12">
               
                            </div>

        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; Thực tập công nghệ phần mềm | 2019-2020 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

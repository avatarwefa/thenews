<?php


if (isset($_GET["idTin"]))
{
	$idTin = $_GET["idTin"];
	settype($idTin,"int");
}
else
{
	$idTin = 1;
}
CapNhatSoLanXemTin($idTin);
?>



<?php

$tin = ChiTietTin($idTin);
$row_tin = mysqli_fetch_array($tin);
?>
<h3 class="title"><?php echo $row_tin['TieuDe'] ?></h3>
<div class="des">
<?php echo $row_tin['TomTat'] ?></div>
<div class="chitiet" >
<!--noi dung-->
  <table align="center" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr> <!-- src="upload/tintuc/<php echo $row_tin['urlHinh']?>" -->
      <td><img style='height: 100%; width: 100%; object-fit: contain' ; alt="like-that" data-natural-="" src="<?php if (strpos($row_tin['urlHinh'], 'tintuc') == false) 
				{
    				echo 'upload/tintuc/';
				}
					echo $row_tin['urlHinh']
		
					 
						   ?>" data-width="500" data-pwidth="480"></td>
    </tr>
    <tr>
      <td><p><?php echo $row_tin['TieuDe']?></p></td>
    </tr>
  </tbody>
</table>
<div class="chitiettin">
<?php echo $row_tin['Content'] ?>
</div>
<p class="right"><strong><?php $tacgia = mysqli_fetch_array(viewTacGia($row_tin['idUser']));
echo $tacgia['HoTen'] ?></strong></p>
<!--//noi dung-->
</div>
<div class="clear"></div>
<a class="btn_quantam" id="vne-like-anchor-1000000-3023795" href="#" total-like="21"></a>
<div class="number_count"><span id="like-total-1000000-3023795"><?php echo $row_tin['SoLanXem'] ?></span></div>
<!--face-->
<div class="left"><div class="fb-like fb_iframe_widget" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-href="http://vnexpress.net/tin-tuc/the-gioi/ukraine-gianh-kiem-soat-nhieu-khu-vuc-gan-hien-truong-mh17-3023795.html" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;href=http%3A%2F%2Fvnexpress.net%2Ftin-tuc%2Fthe-gioi%2Fukraine-gianh-kiem-soat-nhieu-khu-vuc-gan-hien-truong-mh17-3023795.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=450"></div></div>
<!--twister-->
<div class="left"></div>
<!--google-->
<div class="left"><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"></div></div>


<div class="clear"></div>
<div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">
        
        <p class="taskDescription ">Mời bạn đọc để lại ý kiến ở phần comment dưới đây!</p>
    </div>
    <div class="actionBox">
        <ul class="commentList">
        <?php
		$comment = viewComment($idTin);
		while($row_comment = mysqli_fetch_array($comment))
{
?>
            <li>
                <div class="commenterImage">
                  <img src="https://i7.pngflow.com/pngimage/343/783/png-user-profile-business-graphics-graph-business-people-business-smile-symbol-clipart.png" />
                </div>
                <div class="commentText">
                    <p><?php echo $row_comment['noidung'] ?></p> <span class="date sub-text"><?php echo 'vào lúc '. $row_comment['datetime'] .' đăng bởi ' ?> <a href="#" style="color:#900"> <?php echo $row_comment['hoten'] ?> </a>   </span>

                </div>
            </li>
            
            <?php } ?>
        </ul>
        <form class="form-inline" role="form" method="post">
            <div class="form-group">
                <input class="form-control" name=
               'txtComment' id='txtComment' type="text" placeholder="Viết ở đây ..." />
            </div>
            <div class="form-group">
                <button type="submit" name='btnPost' id = 'btnPost' class="btn btn-outline-secondary" style="margin-left:15px;">Đăng</button>
            </div>
        </form>
    </div>
</div>

<div id="tincungloai">
<div class="clear"></div>
	<ul>
    	
        <?php
		$tincungloai = TinCungLoaiTin($idTin,$row_tin['idLT']);
		while($row_tincungloai = mysqli_fetch_array($tincungloai))
		{
		?>
        
        <li>       
             <a href="index.php?p=chitiettin&idTin=<?php echo $row_tincungloai['idTin'] ?>"><img src="upload/tintuc/<?php echo $row_tincungloai['urlHinh'] ?>" alt="#"></a> <br />
 			 <a class="title" href="index.php?p=chitiettin&idTin=<?php echo $row_tincungloai['idTin'] ?>"><?php echo $row_tincungloai['TieuDe'] ?></a>
             <span class="no_wrap">   
        </li>
        
       <?php 
		}
	   ?>
      
        
        
    </ul>
</div>
<div class="clear"></div> 

<?php
if (isset($_POST["btnPost"]))
{
$id = $_SESSION['idUser'];
$hoten =  $_SESSION['Username'];
$datetime = date("Y-m-d H:i:s");
$comment = $_POST["txtComment"];

  $conn = myConnect();
  $qr = "
    INSERT INTO comment VALUES
    (null,'$hoten','$datetime','$comment','$idTin')
  ";
if(isset($_SESSION["idUser"]))
	{
    mysqli_query($conn, $qr);
	
    echo "<script type='text/javascript'>alert('Comment của bạn đã được đăng');</script>";
   	header('Location: '.$_SERVER['REQUEST_URI']);
  }
   else
  {
    echo "<script type='text/javascript'>alert('Hãy đăng nhập trước khi comment!');</script>";
  }
}
?>





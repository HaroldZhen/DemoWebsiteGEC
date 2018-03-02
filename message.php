<?php
if(isset($_SESSION['message']) ) 
{
	if($_SESSION['message']=='add'){
			  echo '<script type="text/javascript">alert("新增成功!");</script> ';
        unset($_SESSION['message']);
    }
	if($_SESSION['message']=='update'){
			  echo '<script type="text/javascript">alert("修改成功!");</script> ';
        unset($_SESSION['message']);
    }
	if($_SESSION['message']=='del'){
			  echo '<script type="text/javascript">alert("刪除成功!");</script> ';
        unset($_SESSION['message']);
    }
}
?>

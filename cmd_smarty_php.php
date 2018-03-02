<?php
header("content-type:text/html; charset=utf-8");

$dirname = "./templates/";

$dirlist = scandir($dirname);

foreach ( $dirlist as $key => $name ){
 if($key==0){continue;}
 if($key==1){continue;}
  echo $name . '<br />';
//開啟某檔案 txt or html or xml
$smarty = $name;
  $str = "<?php";
  $str .= "\n\n";
  $str .= "include ('main.php'); // autoloading other class or pear class";
  $str .= "\n\n";
  $str .= "\$smarty = new Template(); ";
  $str .= "\n\n";
  $str .= "\$subject='HelloWorld';";
  $str .= "\n\n";
  $str .= "\$smarty->assign('subject',\$subject);";
  $str .= "\n\n";
  $str .= "\$smarty->left_delimiter = \"<{\";";
  $str .= "\n";
  $str .= "\$smarty->right_delimiter = \"}>\";";
  $str .= "\n";
  $str .= "\$smarty->display('$smarty');";
  $str .= "\n\n";
  $str .= "include ('message.php');";
  $str .= "\n\n";
  $str .= "?".">";
  
  //echo htmlspecialchars($str);
  $smarty = str_replace('html','php',$smarty);
  //開啟檔案
  
  if( ! @$fh=fopen($smarty,"w") ){
    //若無法成功開啟檔案, 則中斷程式並顯示錯誤訊息
    die('無法開啟檔案');
  }
  
  //寫入檔案
  if ( @fputs($fh, $str) ) {
    echo '成功寫入檔案';
  }else {
    echo '無法寫入檔案';
  }
  
  fclose($fh);//關閉檔案
//end--開始某檔案---end  
  
}


?>

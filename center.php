<?php
/*
 * @auther haroldzhen s9514143@cyut.edu.tw
 * @version 1.0.0
 */
include_once ('main.php'); // autoloading other class or pear class

$smarty = new Template(); // NewClass Smarty
$geClass = new cyut();    // NewClass cyut only for thie cyut ge website

  //GetData: SubMenu
  $query_str = "select * from b_meun where close=1 order by b_meun_id asc";
  $b_meun_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('bmeun',$b_meun_ary);

  //GetData: m_meun
  $query_str = "select * from m_meun where b_meun_id=2 and close=1 order by m_meun_id,m_sort asc";
  $m_meun_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('m_meun',$m_meun_ary);

  //GetData: Center
  $getNum = isset($_GET['num'])? $_GET['num'] : '1';
  if($getNum )
  {
    $query_str = "select * from center where m_meun_id='".$getNum."'";
  }else{
    $query_str = "select * from center order by center_id asc";
  }
  $text_ary = $geClass->mdb2GetRow($query_str);
  $smarty->assign('text',$text_ary);

  //GetDate: Other
  $query_str = "select * from other order by other_id asc limit 0,2";
  $other_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('other',$other_ary);


//Output Smarty Setting and PageName
$smarty->left_delimiter = $geClass->left_delimiter;
$smarty->right_delimiter = $geClass->right_delimiter;
$smarty->display('center.html');

include_once ('message.php');
?>
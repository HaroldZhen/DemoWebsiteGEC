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

  //GatData: m_meun
  $query_str = "select * from m_meun where b_meun_id=7 and close=1 order by m_meun_id,m_sort asc";
  $m_meun1_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('m_meun1',$m_meun1_ary);

  //GetDate: Other
  $query_str = "select * from other order by other_id asc limit 0,2";
  $other_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('other',$other_ary);

  //GetData: action
  if(isset($_GET['num']) ){
    $getNum = isset($_GET['num'])? $_GET['num'] : '1';
    $query_str = "select * from action where m_meun_id='".$getNum."'";
  }else{
    $query_str = "select * from action order by action_id asc";
  }
  $action_ary = $geClass->mdb2GetRow($query_str);
  $smarty->assign('text',$action_ary);

//Output Smarty Setting and PageName
$smarty->left_delimiter = $geClass->left_delimiter;
$smarty->right_delimiter = $geClass->right_delimiter;
$smarty->display('highlights.html');

include_once ('message.php');
?>
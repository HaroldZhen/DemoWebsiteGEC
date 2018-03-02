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

  //GetData: m_meun1
  $query_str = "select * from m_meun where b_meun_id=3 and t_item_id=1 and close=1 order by m_meun_id,m_sort asc";
  $m_meun1_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('m_meun1',$m_meun1_ary);

  //GetData: m_meun2
  $query_str = "select * from m_meun where b_meun_id=3 and t_item_id=2 and close=1 order by m_meun_id,m_sort asc";
  $m_meun2_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('m_meun2',$m_meun2_ary);

  //GetData: m_meun3
  $query_str = "select * from m_meun where b_meun_id=3 and t_item_id=3 and close=1 order by m_meun_id,m_sort asc";
  $m_meun3_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('m_meun3',$m_meun3_ary);

//GetData: m_meun , tech
$getNum = isset($_GET['num'])? $_GET['num'] : '5';
if($getNum )
{
   $query_str = "select * from m_meun LEFT JOIN t_meun ON m_meun.t_item_id = t_meun.t_meun_id  where m_meun_id='".$getNum."' ";
    $m_title_ary = $geClass->mdb2GetRow($query_str);
  if($getNum==15 ){
    $m_title_str = $m_title_ary['m_item'];
  }else{
    $m_title_str = $m_title_ary['t_item'].'-'.$m_title_ary['m_item'];
  }
  $smarty->assign('m_title',$m_title_str);

  //GetData: tech
  $query_str = "select * from tech where m_meun_id='".$getNum."' and close=1 ";
  $tech_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('text',$tech_ary);
}
  //GetDate: Other
  $query_str = "select * from other order by other_id asc limit 0,2";
  $other_ary = $geClass->mdb2GetAll($query_str);
  $smarty->assign('other',$other_ary);

//Output Smarty Setting and PageName
$smarty->left_delimiter = $geClass->left_delimiter;
$smarty->right_delimiter = $geClass->right_delimiter;
$smarty->display('member.html');

include_once ('message.php');
?>
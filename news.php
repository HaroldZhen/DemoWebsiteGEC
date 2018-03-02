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

  //GetData: News
  $query_str = "select * from news order by news_id desc";
  $news_ary = $geClass->mdb2GetAll($query_str);
  $pager_obj = $geClass->mdb2Pager($news_ary);
  $pageID = isset($_GET['pageID']) ? $_GET['pageID'] : '';
  $datas  = $pager_obj->getPageData($pageID); 
  $news_datas = $datas;

  $smarty->assign('news',$news_datas);
  $smarty->assign('dblink1',$pager_obj->getLinks() );
  $smarty->assign('dbpage1',$pager_obj->numPages() );
  $smarty->assign('dbpage2',$pager_obj->numItems() );

//Output Smarty Setting and PageName
$smarty->left_delimiter = $geClass->left_delimiter;
$smarty->right_delimiter = $geClass->right_delimiter;
$smarty->display('news.html');

include_once ('message.php');

?>
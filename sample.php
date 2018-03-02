<?php
/*
 * @auther haroldzhen s9514143@cyut.edu.tw
 * @version 1.0.0
 */
include_once ('main.php'); // autoloading other class or pear class

$smarty = new Template(); // NewClass Smarty

$subject='Hello World';
$smarty->assign('subject',$subject);

$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
$smarty->display('index.html');

include_once ('message.php');
?>
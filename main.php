<?php
require_once ('./api/smarty/Template.php');
ini_set("include_path", "./pear/PEAR". PATH_SEPARATOR . ini_get("include_path"));
require_once('Pager.php');
require_once('MDB2.php'); 

$dir = getcwd();
define ('APP_REAL_PATH', $dir); // 定義網站實體路徑

class cyut {
		public $left_delimiter = "<{";
		public $right_delimiter = "}>";
		private $mdb2;

		function __construct()
		{
		  $dsn = array('phptype'=> 'mysql',
               'hostspec'=>  'localhost',
               'database'=>  'cyut',
               'username'=>  'admin',
               'password'=>  '1234',
               'charset'=>   'utf8');
		  $mdb2 =& MDB2::connect($dsn);	 
		  if (PEAR::isError($mdb2))
		    die('連線資料庫錯誤:' . $mdb2->getMessage());
		  $this->mdb2 = $mdb2;
		}


		public function mdb2GetAll($query_str)
		{
		  if(isset($query_str) )
		  {
			  $res =& $this->mdb2->QUERY($query_str);
			  if (PEAR::isError($res))
			    die('查詢錯誤:' . $res->getMessage());
			  $this->mdb2 ->setFetchMode(MDB2_FETCHMODE_ASSOC);
			  $rows = $res->fetchAll();    
			  if (PEAR::isError($rows)) 
			    die("存取資料失敗：".$rows->getMessage());
		  	  return $rows;
		  }
		}

		public function mdb2GetRow($query_str)
		{
		  if(isset($query_str) )
		  {
			  $res =& $this->mdb2->QUERY($query_str);
			  if (PEAR::isError($res))
			    die('查詢錯誤:' . $res->getMessage());
			  $this->mdb2 ->setFetchMode(MDB2_FETCHMODE_ASSOC);
			  $rows = $res->fetchRow();    
			  if (PEAR::isError($rows)) 
			    die("存取資料失敗：".$rows->getMessage());
		  	  return $rows;
		  }
		}

		public function mdb2Pager($rows)
		{
			if(isset($rows) )
			{
		      $params = array(     // 分頁參數
		          'mode'       => 'Jumping',      // 使用 Jumping 模式 
		          'perPage'    => 15,              // 每頁四筆
		          'itemData'   => $rows,          // 要分頁的資料存於 $rows 中
		          'delta'      => 5,             // 每次列出 3 頁的連結
		          'linkClass' => 'link01',
		          'curPageLinkClassName'  => 'text09', //設定目前頁面的屬性
		          'separator' => '|',
		          'altPrev'    => '上一頁',      //html 裡面的 alt 屬性
		          'altnext'    => '下一頁',      //html 裡面的 alt 屬性
		          'altPage'    => '頁',         //html 裡面的 alt 屬性
		          //'clearIfVoid'=> false,        //就算沒資料也會出現1
		          'prevImg'    => '<img src=img/icon0302.gif border=0>',     //設定 back 改成中文的 上一頁
		          'nextImg'    => '<img src=img/icon0303.gif border=0>',);   //設定 next 改成中文的 下一頁
		      $pager = & Pager::factory($params); // 建立分頁物件
		  }
	      return $pager;
		}


	}
?>

<?php
function up_file1($DestDIR,$image,$num){
  if(isset($_FILES['UpFile'.$num]['name']) ){
            if( $_FILES['UpFile'.$num]['error']==UPLOAD_ERR_OK ){
            if(copy($_FILES['UpFile'.$num]['tmp_name'],$DestDIR.$_FILES['UpFile'.$num]['name'])){
             $_FILES['UpFile'.$num]['name'] =$DestDIR.$_FILES['UpFile'.$num]['name'];
             $jpgnow =$image.'.jpg';
             $jpgnowa = './show/'.$jpgnow;
             ImageCopyResizedTrue_a($_FILES['UpFile'.$num]['name'],$jpgnowa,'350','350');
             $filename =$_FILES['UpFile'.$num]['name'];
           if( @unlink($filename)){}
          }
        }
  }
}

function upfile03($DestDIR,$image,$num){   
  //取得上傳圖片
  $src = imagecreatefromjpeg($_FILES['UpFile'.$num]['tmp_name']);
  // 取得來源圖片長寬<br />
  $src_w = imagesx($src);
  $src_h = imagesy($src);
  // 假設要長寬不超過90<br />
  if($src_w > $src_h){
     $thumb_w = 500;
     $thumb_h = intval($src_h / $src_w * 500);
   }else{
     $thumb_h = 500;
     $thumb_w = intval($src_w / $src_h * 500);
   }
   // 建立縮圖
   $thumb = imagecreatetruecolor($thumb_w, $thumb_h);
   // 開始縮圖
   imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
   // 儲存縮圖到指定 thumb 目錄
   imagejpeg($thumb, $DestDIR.$image);
   // 複製上傳圖片到指定 images 目錄
   copy($_FILES['UpFile'.$num]['tmp_name'], $DestDIR . $image);
}

function upfile01($DestDIR,$image,$num,$w,$h){   
  //取得上傳圖片
  $src = imagecreatefromjpeg($_FILES['UpFile'.$num]['tmp_name']);
  // 取得來源圖片長寬<br />
  $src_w = imagesx($src);
  $src_h = imagesy($src);
  // 假設要長寬不超過90<br />
  /*
  if($src_w > $src_h){
     $thumb_w = 90;
     $thumb_h = intval($src_h / $src_w * 90);
   }else{
     $thumb_h = 90;
     $thumb_w = intval($src_w / $src_h * 90);
   }
  */
  $thumb_w = $w;
  $thumb_h = $h;
   // 建立縮圖
   $thumb = imagecreatetruecolor($thumb_w, $thumb_h);
   // 開始縮圖
   imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
   // 儲存縮圖到指定 thumb 目錄
   imagejpeg($thumb, $DestDIR.$image);
   // 複製上傳圖片到指定 images 目錄
   copy($_FILES['UpFile'.$num]['tmp_name'], "../temphoto/" . $image);
}

function upfile02($DestDIR,$image,$num){
  //定義存放上傳檔案的目錄
  $upload_dir=$DestDIR;
  $DestDIR = $upload_dir . basename($_FILES['UpFile'.$num]['name']);
  //如果錯誤代碼為 UPLOAD_ERR_OK, 表示上傳成功
    if( $_FILES['UpFile'.$num]['error'] == UPLOAD_ERR_OK ) {
      //將暫存檔搬移到上傳目錄下, 並且改回原始檔名
       copy($_FILES['UpFile'.$num]['tmp_name'], "../temphoto/" . $image);
    }
}
?>

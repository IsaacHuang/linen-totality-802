<?php
    $custom_pic=$_POST['custom_pic'];//取得拍照的照片
    $background=$_POST['background'];//取得背景值
    /*//縮圖程式
    $src=imagecreatefromjpeg($custom_pic);
    $src_w=imagesx($src);
    $src_h=imagesy($src);
    if($src_w>$src_h){
        $thumb_w=100;
        $thumb_h=intval($src_h/$src_w*100);
    }else{
        $thumb_h=100;
        $thumb_w=intval($src_w/$src_h*100);
    }
    $thumb=imagecreatetruecolor($thumb_w, $thumb_h);
    imagecopyresized($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
    imagejpeg($thumb,$custom_pic);
    echo "已完成縮圖！";*/

?>       

       <meta charset="utf-8">
        <!--IE兼容-->
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name='description' content=''>
        <meta name='author' content=''>
        <meta property="og:url" content="http://linen-totality-802.appspot.com" /> 
        <meta property="og:title" content="中原大學六十週年校慶" />
        <meta property="og:description" content="" /> 
        <?php echo "<meta property='og:image' content='".$custom_pic."' />";?> 
        <meta property="og:">

        <title>中原大學六十週年校慶</title>

        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css'>
        <link href='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/css/flexslider.css' rel='stylesheet' >
        <link href='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/css/queries.css' rel='stylesheet'>
        <link href='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/css/animate.css' rel='stylesheet'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/css/styles2.css' rel='stylesheet'>
    </head>
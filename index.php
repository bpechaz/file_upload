<?php
/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 4/27/2017
 * Time: 6:08 PM
 */

include 'ClassUtil.php';


$content = ClassUtil::renderView('view/file_upload.php');
$data = [
    'title' => 'بارگذاری فایل',
    'content' => $content,
];
$fileContent = ClassUtil::renderView('_layout.php', $data);
echo $fileContent;
?>



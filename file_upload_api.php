<?php
/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 4/27/2017
 * Time: 7:40 PM
 */

include_once 'ClassUtilFile.php';

$path = '/file_upload/upload';
if($_FILES){
    ClassUtiFile::uploadFile($path);
}

echo 'done';
die;
?>


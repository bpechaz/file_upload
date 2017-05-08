<?php
/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 4/27/2017
 * Time: 7:40 PM
 */

include_once 'ClassUtilFile.php';
include_once 'ClassUtil.php';

$path = '/file_upload/upload';
$file1Url = isset($_POST['file1']) ? $_POST['file1'] : null;

if ($file1Url) {
    $file1Url = str_replace('https://www.dropbox.com/', 'https://dl.dropboxusercontent.com/', $file1Url);
    $fileName = ClassUtil::generateToken(5);
    $fileExtensionArray = explode('.', $file1Url);
    if (isset($fileExtensionArray[count($fileExtensionArray) - 1])) {
        $fileExtensionArray = explode('?', $fileExtensionArray[count($fileExtensionArray) - 1]);
        $fileName .= '.' . $fileExtensionArray[0];
    }
    $fullPath = $path . '/' . $fileName;
    ClassUtiFile::saveFileFromUrl($file1Url, $fullPath);
}

echo 'done';
die;
?>


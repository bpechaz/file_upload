<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 8/24/2016
 * Time: 4:21 PM
 */


include_once 'ClassUtil.php';

class ClassUtiFile
{

    const SESSION_KEY_UPLOAD = 'upload_file';



    public static function uploadFile($path, $key = 'file', $fileName = null)
    {
        if (!self::isFileValid($_FILES[$key])) {
            return false;
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . $path;

        if (!is_dir($path)) {
            mkdir($path);
        }

        if(!$fileName){
            $randomName = ClassUtil::generateToken(10);
            $fileName = sprintf("%s-%s", $randomName, $_FILES[$key]['name']);
        }

        $uploadFile = sprintf("%s/%s", $path, $fileName);

        if (move_uploaded_file($_FILES[$key]['tmp_name'], $uploadFile)) {
            $fileInfo = self::getFileInfo($key);
            $fileInfo['name'] = $fileName;
            return $fileInfo;
        } else {
            return false;
        }
    }

    public static function getFileInfo($key = 'file')
    {
        $fileInfo = [];
        if (isset($_FILES[$key])) {

            $fileInfo['name'] = $_FILES[$key]['name'];

            $dotPos = strrpos($fileInfo['name'], '.');

            $fileInfo['tempName'] = $_FILES[$key]['tmp_name'];
            $fileInfo['size'] = $_FILES[$key]['size'];
            $fileInfo['type'] = $_FILES[$key]['type'];
            $fileInfo['error'] = $_FILES[$key]['error'];
            $fileInfo['realFileName'] = substr($fileInfo['name'], 0, $dotPos);
            $fileInfo['extension'] = substr($fileInfo['name'], $dotPos + 1);
        }

        return $fileInfo;
    }

    public static function getExtensionTypeFromName($fileName)
    {
        $type = substr($fileName, strpos($fileName, '.') + 1);
        return $type;
    }

    public static function getFileName($fileNameWithExtension)
    {
        $fileName = substr($fileNameWithExtension, 0, strpos($fileNameWithExtension, '.'));
        return $fileName;
    }

    public static function createThumbnailFileName($filenameWithExtension, $thumbMark)
    {
        return sprintf("%s_%s.%s", self::getFileName($filenameWithExtension), $thumbMark, self::getExtensionTypeFromName($filenameWithExtension));
    }

    public static function createThumbnailFilePath($address, $filenameWithExtension, $thumbMark)
    {
        return sprintf("%s/%s_%s.%s", $address, self::getFileName($filenameWithExtension), $thumbMark, self::getExtensionTypeFromName($filenameWithExtension));
    }

    public static function getExtensionType($mimeType)
    {
        switch ($mimeType) {
            case 'image/bmp':
                return 'bmp';
            case 'image/x-windows-bmp':
                return 'bmp';
            case 'image/vnd.dwg':
                return 'dwg';
            case 'image/x-dwg':
                return 'dwg';
            case 'image/fif':
                return 'fif';
            case 'image/florian':
                return 'flo';
            case 'image/vnd.fpx':
                return 'fpx';
            case 'image/vnd.net-fpx':
                return 'fpx';
            case 'image/gif':
                return 'gif';
            case 'image/x-icon':
                return 'ico';
            case 'image/ief':
                return 'ief';
            case 'image/pjpeg':
                return 'jpe';
            case 'image/jpeg':
                return 'jpg';
            case 'image/x-jps':
                return 'jps';
            case 'image/x-portable-graymap':
                return 'pgm';
            case 'image/pict':
                return 'pic';
            case 'image/png':
                return 'png';
            case 'image/x-portable-pixmap':
                return 'ppm';
            case 'image/vnd.dwg':
                return 'svf';
            case 'image/x-dwg':
                return 'svf';
            case 'image/tiff':
                return 'tiff';
            case 'image/x-tiff':
                return 'tiff';
            case 'image/vnd.wap.wbmp':
                return 'wbmp';
            case 'application/x-troff-msvideo':
                return 'avi';
            case 'video/avi':
                return 'avi';
            case 'video/x-msvideo':
                return 'avi';
            case 'video/msvideo':
                return 'avi';
            case 'application/x-javascript':
                return 'js';
            case 'application/javascript':
                return 'js';
            case 'application/ecmascript':
                return 'js';
            case 'text/javascript':
                return 'js';
            case 'text/ecmascript':
                return 'js';
            case 'application/x-midi':
                return 'midi';
            case 'audio/midi':
                return 'midi';
            case 'audio/x-mid':
                return 'midi';
            case 'audio/x-midi':
                return 'midi';
            case 'music/crescendo':
                return 'midi';
            case 'x-music/x-midi':
                return 'midi';
            case 'application/x-midi':
                return 'midi';
            case 'music/crescendo':
                return 'midi';
            case 'x-music/x-midi':
                return 'midi';
            case 'video/quicktime':
                return 'mov';
            case 'video/x-sgi-movie':
                return 'movie';
            case 'audio/mpeg':
                return 'mp2';
            case 'audio/x-mpeg':
                return 'mp2';
            case 'video/mpeg':
                return 'mp2';
            case 'video/x-mpeg':
                return 'mp2';
            case 'video/x-mpeq2a':
                return 'mp2';
            case 'audio/mpeg3':
                return 'mp3';
            case 'audio/x-mpeg-3':
                return 'mp3';
            case 'video/mpeg':
                return 'mp3';
            case 'video/x-mpeg':
                return 'mp3';
            case 'application/mspowerpoint':
                return 'pot';
            case 'application/vnd.ms-powerpoint':
                return 'pot';
            case 'application/vnd.ms-powerpoint':
                return 'ppa';
            case 'application/mspowerpoint':
                return 'pps';
            case 'application/mspowerpoint':
                return 'ppt';
            case 'application/powerpoint':
                return 'ppt';
            case 'application/vnd.ms-powerpoint':
                return 'ppt';
            case 'application/x-mspowerpoint':
                return 'ppt';
            case 'application/rtf':
                return 'rtf';
            case 'application/x-rtf':
                return 'rtf';
            case 'text/richtext':
                return 'rtf';
            case 'application/rtf':
                return 'rtx';
            case 'text/richtext':
                return 'rtx';
            case 'application/x-shockwave-flash':
                return 'swf';
            case 'application/x-tar':
                return 'tar';
            case 'application/plain':
                return 'text';
            case 'text/plain':
                return 'text';
            case 'application/excel':
                return 'xls';
            case 'application/excel':
                return 'xls';
            case 'application/x-excel':
                return 'xls';
            case 'application/x-msexcel':
                return 'xls';
            case 'application/excel':
                return 'xls';
            case 'application/vnd.ms-excel':
                return 'xls';
            case 'application/x-excel':
                return 'xls';
            case 'application/excel':
                return 'xls';
            case 'application/vnd.ms-excel':
                return 'xls';
            case 'application/x-excel':
                return 'xls';
            case 'application/excel':
                return 'xls';
            case 'application/x-excel':
                return 'xls';
            case 'application/excel':
                return 'xls';
            case 'application/x-compressed':
                return 'xls';
            case 'application/x-zip-compressed':
                return 'zip';
            case 'application/zip':
                return 'zip';
            case 'multipart/x-zip':
                return 'zip';
            case 'application/msword':
                return 'doc';
        }

        return '';
    }

    public static function getHeader()
    {
        $finOpen = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finOpen, $_FILES['file']['tmp_name']);
        finfo_close($finOpen);

        return $mime;
    }

    public static function getHeaderFromFileItem($file)
    {
        $finOpen = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finOpen, $file['tmp_name']);
        finfo_close($finOpen);

        return $mime;
    }

    public static function isFileValid($fileItem)
    {
        $mimeType = self::getHeaderFromFileItem($fileItem);
        if (strpos($mimeType, 'php')) {
            return false;
        } else {
            return true;
        }
    }

    public static function saveFileFromUrl($url, $path)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . $path;
        $content = file_get_contents($url);
        file_put_contents($path, $content);
    }
}
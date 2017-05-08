<?php

/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 3/15/2017
 * Time: 7:36 PM
 */

class ClassUtil
{
    public static function log($data){
        echo '<pre>';
        var_dump($data);
        die;
    }

    public static function logNiDie($data){
        echo '<pre>';
        var_dump($data);
    }

    public static function getClientIp()
    {
        $ip = null;
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ip = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'UNKNOWN';
        }
        return $ip;
    }

    /**
     * @param $size
     * @return string
     */
    public static function generateToken($size)
    {
        return bin2hex(openssl_random_pseudo_bytes($size));
    }

    public static function setSession($key, $value)
    {
        self::openSession();
        $_SESSION[$key] = $value;
    }

    public static function getSession($key)
    {
        self::openSession();
        try {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
    }

    public static function openSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function emailValidation($data)
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    public static function renderView($viewPath, $params = [])
    {
        extract($params);
        ob_start();
        include_once $viewPath;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
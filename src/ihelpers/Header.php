<?php
/**
 * Class Header
 *
 * @link https://www.icy2003.com/
 * @author icy2003 <2317216477@qq.com>
 * @copyright Copyright (c) 2017, icy2003
 */

namespace icy2003\php\ihelpers;

/**
 * 对 header 函数的一些封装
 */
class Header
{
    /**
     * 正常访问
     *
     * HTTP 返回 200
     *
     * @return void
     */
    public static function ok()
    {
        header('HTTP/1.1 200 OK');
    }

    /**
     * 页面不存在
     *
     * HTTP 返回 404
     *
     * @return void
     */
    public static function notFound()
    {
        header('HTTP/1.1 404 Not Found');
    }

    /**
     * 跳转到一个新的地址
     *
     * HTTP 返回 302
     *
     * @param string|null $url 新地址，如果不给这个值，表示刷新当前页面
     * @param integer $time 延迟时间，单位秒
     *
     * @return void
     */
    public static function redirect($url = null, $time = 0)
    {
        null === $url && $url = '';
        if ($time < 0) {
            throw new \Exception('time 参数不能小于 0 ');
        } else {
            header('HTTP/1.1 302 Found');
            header('Refresh: ' . $time . '; ' . $url);
        }
        die;
    }

    /**
     * 永久跳转
     *
     * HTTP 返回 301
     *
     * @param string $url 永久跳转的地址
     *
     * @return void
     */
    public static function redirectPermanently($url)
    {
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
        die;
    }

    /**
     * 设置网页编码为 UTF-8
     *
     * @return void
     */
    public static function utf8()
    {
        header('Content-Type: text/html; charset=utf-8');
    }

}
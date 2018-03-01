<?php

namespace controllers;

class SiteController
{
    public static $title = 'Заголовок';
    protected static $renderMain = true;
    
    public static function render($views, $params=[])
    {
        extract($params);
        if (self::$renderMain) {
            include_once(ROOT . '/components/headlink.php');
            include_once(ROOT . '/views/main/head.php');
        }
        include_once(ROOT. '/views/'.$views.'.php');
        if (self::$renderMain) include_once(ROOT. '/components/footerlink.php');
        return true;
    }
    public static function setRenderMain($isRender)
    {
        static::$renderMain = $isRender;
    }
    public static function setTitle($title)
    {
        static::$title = $title;
    }
}
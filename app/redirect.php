<?php

class Redirect {

    /**
     * redirige a una URL
     *
     * @param string $url
     * @return void
     */
    public static function redirectTo($url) 
    {
        header('Location: ' . $url, true, 301);
        exit();
    }
}
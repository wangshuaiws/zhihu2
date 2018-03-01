<?php

class helper{
    /**
     * 是否为手机号码
     * @param $string
     * @return bool
     */
    public static function isMobile($string) {
        return !!preg_match('/^1[3|4|5|7|8]\d{9}$/', $string);
    }
}

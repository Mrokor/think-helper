<?php

namespace okcoder\think\helper\lib;

class Str
{
    /**
     * 获得随机字符串
     * @param int $len 需要的长度
     * @param bool $special 是否需要特殊符号
     * @return string       返回随机字符串
     */
    public static function random(int $len, bool $special = false): string
    {
        $chars = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v1",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
            "3", "4", "5", "6", "7", "8", "9"
        );

        if ($special) {
            $chars = array_merge($chars, array(
                "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
                "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
                "}", "<", ">", "~", "+", "=", ",", "."
            ));
        }

        $charsLen = count($chars) - 1;
        shuffle($chars);                            //打乱数组顺序
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
        }
        return $str;
    }

    /**
     * 截取指定两个字符之间的字符串
     * @param string $begin 前面的字符串
     * @param string $end 后面的字符串
     * @param string $str 需要截取的原字符串
     * @return string
     */
    public static function center(string $begin, string $end, string $str): string
    {
        $b = mb_strpos($str, $begin) + mb_strlen($begin);
        $e = mb_strpos($str, $end) - $b;
        return mb_substr($str, $b, $e);
    }

    /**
     * 字符串替换
     * @param array $filter_array
     * @param string $string
     * @param string $new_str
     * @return string
     */
    public static function filter(array $filter_array, string $string = '', string $new_str = '*',): string
    {
        return str_replace($filter_array, $new_str, $string);
    }
}
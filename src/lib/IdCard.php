<?php

namespace okcoder\think\helper\lib;

class IdCard
{
    /**
     * 身份证获取性别
     * @param string $idNo 身份证号码
     * @return string 1为男 2为女
     */
    public static function idNo2Sex(string $idNo): string
    {
        $position = (strlen($idNo) == 15 ? -1 : -2);

        if (substr($idNo, $position, 1) % 2 == 0) {
            return 2;
        }

        return 1;
    }

    /**
     * 身份证号码获取出生年月日
     * @param string $idNo
     * @return string
     */
    function idNo2Birthday(string $idNo): string
    {
        $str = strlen($idNo) == 15 ? ('19' . substr($idNo, 6, 6)) : substr($idNo, 6, 8);
        return substr($str, 0, 4) . '-' . substr($str, 4, 2) . '-' . substr($str, 6, 2);
    }

    /**
     * 出生日期时间戳获取年龄
     * @param int $time
     * @return false|mixed|string
     */
    function birthday2Age(int $time)
    {
        list($year, $month, $day) = explode("-", date('Y-m-d', $time));
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($day_diff < 0 || $month_diff < 0)
            $year_diff--;
        return $year_diff < 0 ? 0 : $year_diff;
    }
}
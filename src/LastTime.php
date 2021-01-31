<?php


namespace Lobochkin\TaskForce;


class LastTime
{
    public static function getLastTime(int $sec): string
    {
        $sec = strtotime('now') - $sec;
        if ($sec / 60 < 1) {
            return 'now';
        } elseif ($sec / (60 * 60) < 1) {
            return self::getTime(floor($sec / 60),['минута', 'минуты', 'минут']);
        } elseif ($sec / (60 * 60 * 24) < 1) {
            return self::getTime(floor($sec / (60 * 60)), ['час', 'часа', 'часов']);
        } elseif ($sec / (60 * 60 * 24) >= 1) {
            return self::getTime(floor($sec / (60 * 60 * 24)), ['день', 'дня', 'дней']);
        }

    }

    private static function getTime(int $num, array $nameTime): string
    {
        $string = '';
        if ($num % 10 === 1 && $num % 100 !== 11) {
            $string = $num . " {$nameTime[0]}";
        } elseif ($num % 10 >= 2 && $num % 10 <= 4 && ($num % 100 < 12 || $num % 100 > 14)) {
            $string = $num . " {$nameTime[1]}";
        } else {
            $string = $num . " {$nameTime[2]}";
        }
        return $string;

    }


}
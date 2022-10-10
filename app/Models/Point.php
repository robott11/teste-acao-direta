<?php

namespace App\Models;

class Point extends Model
{
    protected static string $table = 'points';

    public static function getPointsByUserId(int $id)
    {
        return self::where('user_id', '=', $id)->orderBy('hour')->get();
    }

    public static function getLastPointFromUser(int $id)
    {
        $points = self::getPointsByUserId($id);

        if (is_null($points)) {
            return null;
        }

        if (!is_array($points)) {
            return $points;
        }

        return $points[0];
    }
}
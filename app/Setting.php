<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function getSetting($key)
    {

        return Self::where('key', $key)->firstOrCreate(['key' => $key]);

    }


    public static function getSettings($array)
    {
        $data = self::whereIn('key', $array)->pluck('value', 'key')->all();
        $output = array_fill_keys($array, "");
        return array_merge($output, $data);
    }

    public static function setSetting($data)
    {

        foreach ($data as $key => $value) {
            self::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return true;
    }

}

<?php 

class Utils
{

    public static function debugArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        die();
    }
}
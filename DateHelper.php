<?php

define("DATE_FORMAT", 'd.m.Y');

class DateHelper {

    public static $date_format = "Y-m-d";
    public static $time_format = "H:i";

    public static function today(){
        return date(DATE_FORMAT);
    }

    public static function today_html_input(){
        return date(self::$date_format);
    }

    public static function time_html_input(){
        return date(self::$time_format);
    }

}

?>
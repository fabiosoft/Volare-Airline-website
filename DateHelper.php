<?php

define("DATE_FORMAT", 'd.m.Y');

class DateHelper {



    public static function today(){
        return date(DATE_FORMAT);
    }

    public static function today_html_input(){
        return date("Y-m-d");
    }

    public static function time_html_input(){
        return date("H:i");
    }

}

?>
<?php
	define("DB_HOST", 'localhost');
	define("DB_USER", 'uAdmin');
	define("DB_PASSWORD", 'SuperPippo!!!');
	define("DB_DATABASE", 'volare');
    define("AUTHOR_NAME", 'Autore');

    // REGEX
    define("IATA_REGEX","/[A-Z]{3}\\/\\w+/");
    define("DATE_REGEX","/([0-9]?[0-9]?[0-9]{2}[- \\.](0?[1-9]|1[012])[- \\.](0?[1-9]|[12][0-9]|3[01]))+/"); //MATCHES > 2009/12/11 | 2009-12-11 | 2009.12.11 | 09.12.11
    define("TIME_REGEX","/^(?:(?:([01]?\\d|2[0-3]):)?([0-5]?\\d):)?([0-5]?\\d)$/"); //MATCHES > 10:22 | 10:22:50
    define("MAX_SEATS", 299);
    define("UNAME_REGEX","/^[a-z0-9_-]{3,6}$/"); //MATCHES > any username from 3 to 6 chars long
    define("UPWD_REGEX","/^(?=.*\\d)(?=.*[a-zA-Z]).{4,16}$/"); //MATCHES > string to have at least one Numeric and one Character and the length of text string to be between 4 to 16 characters
    define("UTYPE_REGEX","/^[A|N]{1}$/"); //MATCHES > single capitol char A or N
?>
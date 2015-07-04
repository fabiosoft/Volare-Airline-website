<?php
	define("DB_HOST", 'localhost');
	define("DB_USER", 'uAdmin');
	define("DB_PASSWORD", 'SuperPippo!!!');
	define("DB_DATABASE", 'volare');
    define("AUTHOR_NAME", 'Autore');

    // REGEX
    define("IATA_REGEX","/[A-Z]{3}\\/\\w+/");
    define("DATE_REGEX","/([0-9]?[0-9]?[0-9]{2}[- \\.](0?[1-9]|1[012])[- \\.](0?[1-9]|[12][0-9]|3[01]))+/"); //MATCHES > 2009/12/11 | 2009-12-11 | 2009.12.11 | 09.12.11
    define("TIME_REGEX","/^([0-1]?[0-9]|2[0-3]).[0-5][0-9]$/");
    define("MAX_SEATS", 299);
?>
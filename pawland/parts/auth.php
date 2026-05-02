<?php
function MYSQLIAuth() {
	return [
		"localhost",       // mysql host
		"zfdypjmy_ixd608",   // mysql user name
		"qianqian608",   // mysql user password
		"zfdypjmy_ixd608"    // mysql database name
	];
}

function PDOAuth() {
    return [
        "mysql:host=localhost;dbname=zfdypjmy_ixd608", // host and database name
        "zfdypjmy_ixd608", // mysql user name
        "qianqian608", // mysql user password
        [PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"]
    ];
}


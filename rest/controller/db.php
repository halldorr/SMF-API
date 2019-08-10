<?php

class DB
{
	private static $writeDBConnection;
	private static $readDBConnection;

	public static function connectWriteDB($dbType, $host, $dbname, $username, $password)
	{
		if (self::$writeDBConnection === null)
		{
			self::$writeDBConnection = new PDO("$dbType:host=$host;dbname=$dbname;charset=utf8", $username, $password);
			self::$writeDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$writeDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		}

		return self::$writeDBConnection;
	}

	public static function connectReadDB($dbType, $host, $dbname, $username, $password)
	{
		if (self::$readDBConnection === null)
		{
			self::$readDBConnection = new PDO("$dbType:host=$host;dbname=$dbname;charset=utf8", $username, $password);
			self::$readDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$readDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		}

		return self::$readDBConnection;
	}

}
<?php
	/* Class to parse hg hook-generated files and return revision information. */
	/* The hook should be invoked post-update and post-commit, and is:
	
		git branch | sed 's/^\* \(.*\)/\1/' | egrep --regexp="^\w" > REVISION
		git log -1 --pretty=format:%h%n%h%n%H%n%ci%n%an%n%ae%n%n%B%n >> REVISION	
	*/
	
	class GitRevision
	{
		public $dec, $hex;
		
		public static $filename = 'REVISION';
	
		private static function parse()
		{		
			$path = realpath(dirname(__FILE__) . '/../') . '/' . self::$filename;
			
			$info = @file($path);
			
			if (!$info)
			{
				return false;
			}

			$info = array_map(function($str)
			{
				return trim($str, "\n");
			}, $info);
			
			$tbr = array();

			$tbr['branches'] = $info[0];
			$tbr['hex'] = $info[2];
			$tbr['hex_long'] = $info[3];
			$tbr['date'] = $info[4];
			$tbr['date_timestamp'] = strtotime($info[4]);
			$tbr['author.name'] = $info[5];
			$tbr['author.email'] = $info[6];			
			$tbr['description'] = trim($info[8]);
	
			return $tbr;
		}
		
		public static function format($format_str, $show_if_fail = "")
		{
			$info = self::parse();
			
			if (!$info)
			{
				return $show_if_fail;
			}
			
			$tokens = array(
				"%r" => 'hex',
				"%R" => 'hex_long',
				"%d" => 'date',
				"%U" => 'date_timestamp',
				"%b" => 'branches',
				"%a" => 'author.name',
				"%e" => 'author.email',
				"%s" => 'description',
			);
			
			$tbr = $format_str;
			
			foreach ($tokens as $token => $key)
			{
				$tbr = str_replace($token, $info[$key], $tbr);
			}
			
			return $tbr;
		}
		
		public static function load()
		{
			return self::parse();
		}
	}
#!/usr/bin/php5
<?php
/**
 * First time database install:
 * This is a self-executing PHP script. You need to set this file's executable 
 * flag before running this script.
 * 
 * Open up a terminal.
 * Change directory (cd) into [your install directory]/data/sqlite/ where 
 * [your install directory] should be the directory path of wherever you have  
 * your ZRECore files.
 * 
 * Type the following and press enter:
 * 
 * ./install.php | sqlite3 data.sql
 * 
 * All tables should now be installed, along with only the basic data.
 * 
 * WARNING: This operation will destroy all data you have in data.sql.
 * You should probably delete this file after using it.
 */
$dir_path = './';
$sql = '';

if ( is_dir($dir_path) )
{
	if ($dir_handle = opendir($dir_path))
	{
		while ( ($file = readdir($dir_handle)) !== false )
		{
			if (filetype($dir_path . $file) == 'file' && substr($file, -4) == '.sql') {
				$sql .= file_get_contents($dir_path . $file);
			}
		}
		closedir( $dir_handle );
	}
	
}

$sql = 'BEGIN TRANSACTION;' . preg_replace("/\n/", '', $sql) . 'COMMIT;';
<?php
// Walnut CMS 
// version: 0.1dev
// Author: Kacper Nyka <kacper.nyka@gmail.com>
// License: Apache License, Version 2.0

/* Copyright 2005 Kacper Nyka
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/
 
class dbMysql
{
	var $dbhost = "localhost";
	var $dbname = "walnut";
	var $dbuser = "root";
	var $dbpasswd = "oberschule";
	var $db_prefix = "walnut_";
	
	function dbMysql()
	{
		@mysql_connect($this->dbhost, $this->dbuser, $this->dbpasswd) || die("database problem: " . mysql_error());
		@mysql_select_db($this->dbname) || die("database problem: " . mysql_error());
		return true;
	}
	
	function fetchDataDB($table, $field, $asc_or_desc = "asc", $where_what = NULL, $where_is = NULL)
	{
		if(isset($this->result))
		{
			unset($this->result);
		}
				
		$this->table = $this->db_prefix . $table;
		
		if($asc_or_desc == "desc")
		{
			$this->sql = "SELECT * FROM $this->table ORDER BY '".$table."_id' DESC";
		}
		
		if(isset($where))
		{
			$this->sql = "SELECT $field FROM $this->table WHERE $where_what = '$where_is'";
		}		
		
		elseif($asc_or_desc == "asc")
		{
			$this->sql = "SELECT $field FROM $this->table";
			
		}
		
		$this->query = mysql_query($this->sql);
		$this->num = mysql_num_rows($this->query);
		while($this->row = mysql_fetch_array($this->query))
		{
			$this->result[] .= $this->row[$field];
		}
		return $this->result;

	}
	
	function insertDataDB($sql_code){}
}

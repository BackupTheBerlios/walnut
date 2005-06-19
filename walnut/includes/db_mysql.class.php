<?php
require('other.class.php');

class dbMysql //extends other
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
	
	function fetchDataDB($table, $field)
	{
		if(isset($this->result))
		{
			unset($this->result);
		}
		$this->table = $this->db_prefix . $table;
		$this->sql = "SELECT $field FROM $this->table";
		$this->query = mysql_query($this->sql);
		$this->num = mysql_num_rows($this->query);
		if($this->num == '1')
		{
			for($i = 0; $i < $this->num; $i++)
			{
				while($this->row = mysql_fetch_assoc($this->query))
				{
					$this->result = $this->row[$field];
					return $this->result;
				}
			}
		}
		else if($this->num > '1')
		{
			while($this->row = mysql_fetch_array($this->query))
			{
				$this->var_result .= $this->row[$field];
				$this->_arr[] = $this->var_result;
				unset($this->var_result);
				//return($this->_arr);
			}
		}
		return($this->_arr); 
	}
	
//	function return
	
}

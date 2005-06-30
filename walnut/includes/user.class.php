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
#require_onec('db_mysql.class.php');
 
class user
{
	
	function login($username, $password1, $password2)
	{
		$is_ok = strcmp($password1, $password2);
		
		if($is_ok == true)
		{
			session_start();
			$HTTP_SESSION_VARS["username"] = $username;
			//$HTTP_SESSION_VARS["userIP"] = $HTTP_SERVER_VARS["REMOTE_ADDR"];
			$go_to = "index.php?logged_in=1&PHPSESSID" . session_id();
			header("Location: " .$go_to);
		}
		if($is_ok == false)
		{
			echo "Your login data is incorrect";
		}
	}
}
 

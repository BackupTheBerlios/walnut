<?
// wte 0.2pre
// author: Kacper Nyka
// email: kacper.nyka@gmail.com
// license: GNU General Public License
// description: an easy-to-use template engine

class wte
{
	var $tpl_dir = 'templates/';
	var $tpl_var = array();
	var $tpl_arr = array();
		
	// creating a new variable
        function CreateVar($var_name,$var_content)
	{
		$this->var_name[] = $var_name;
		$this->var_content[] = $var_content;
		//$this->var_content_arr[$var_name] = $var_content;
	}
	// creating a new array
	function CreateArr($arr_name, $arr_content)
	{
		$this->tpl_arr[$arr_name] = $arr_content;
		$this->arr = $arr_name;
	}
	
	// the template file will be shown 
	function DisplayTpl($file)
	{	
		$path2tpl = $this->tpl_dir . "" . $file;
		$opened_file = fopen($path2tpl, 'r');
		$read_file = fread($opened_file, filesize($path2tpl));
		foreach($this->tpl_arr as $this->_key)
		{
			$this->extracted_arr .= $this->_key;
		}
		$read_file = str_replace("[$this->arr]", $this->extracted_arr, $read_file); 
		$num = count($this->var_content);
		for($i = 0; $i < $num; $i++)
		{
			$read_file = str_replace("[".$this->var_name[$i]."]", $this->var_content[$i], $read_file);
		}
		echo $read_file;
		fclose($opened_file);
	}

}

?>

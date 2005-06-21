<?
// wte 0.2.1pre
// author: Kacper Nyka
// email: kacper.nyka@gmail.com
// license: GNU General Public License (read the file COPYING)
// description: an easy-to-use template engine

class wte
{
	var $tpl_dir = 'templates/';
	var $content = array();
	
	function loadTemplate($tpl_file)
	{
		$this->path2tpl = $this->tpl_dir . "" . $tpl_file;
		$this->opened_file = fopen($this->path2tpl, 'r');
		$this->read_file = fread($this->opened_file, filesize($this->path2tpl));
	}

        function setVar($var_name, $var_content, $from_array)
	{
		$this->placeholder = $var_name;
		
		if($from_array == TRUE)
		{
			echo 'error: arrays aren\'t supported';
			/** $content[] .= $var_content;
			echo '<pre>';
			print_r($content);
			echo '</pre>'; **/
		}

		else
		{
			$this->_content = $var_content;
			$this->read_file = str_replace("[".$this->placeholder."]", $this->_content, $this->read_file);
			unset($this->placeholder);
			unset($this->_content);
		}

	}
	
	function show($tpl_file)
	{
		$this->_path2tpl = $this->tpl_dir . "" . $tpl_file;
		if(!($this->path2tpl == $this->_path2tpl))
		{
			echo 'error: files selected in loadTemplate() and show() aren\'t the same files';
			return 1;
		}

		echo $this->read_file;
		fclose($this->opened_file);
	}
}

?>

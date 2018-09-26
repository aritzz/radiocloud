<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * Template global class
 */

 
 
 class Template {
 
 /* Local public/private vars */
 public $error = 0; // no errors
 private $data = 0; // init data to 0
 private $cache = 0; // cache
 private $file; // file
 private $directory; // template files
 
 
 	/* Constructor */
	public function __construct($templ_name, $templ_dir) {
		if (!file_exists($templ_dir.'/'.$templ_name.'/INFO.tpl')) { // Info file missing
				$this->error = "Config File Missing";		
		}
		$this->directory = $templ_dir.'/'.$templ_name.'/';
		
	}
	
 	/* Read template and store in $data */
 	private function read($tplname) {
		if (!file_exists($tplname))
			return 0;
			
		$this->data = file_get_contents($tplname); 
		return 1;
	}
	
	/* Replace all vars */
	private function replace($vars) {
		if (!$this->data) return 0;
		
		// init cache
		$this->cache = $this->data;
		// clear data info
		$this->data = 0;	
		
		foreach ($vars as $varname => $varcontent) 
			$this->cache = str_replace("{{".$varname."}}", $varcontent, $this->cache);
			
		return $this->cache;
	
	}
	
	/* Returns replaced content as string */
	public function GetFileContent($template_file, $array = array(""=>"")) {
		if (!is_array($array) || empty($template_file) || !$this->read($this->directory.$template_file)) return 0;
		return $this->replace($array);
	}
	
	/* Clear info */
	public function ClearData() {
		// clear all caches
		$this->data = 0;
		$this->cache = 0;
		$this->error = 0;
	}
 
 }
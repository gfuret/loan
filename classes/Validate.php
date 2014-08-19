<?php

	/**
	* 	Handle validation request for inputs
	*/
	class Validate
	{
		private $_passed = false,
				$_errors = array(),
				$_db = null;


		public function __construct()
		{
			$this->_db = DB::getInstance();
		}

		public function check($source, $items = array()){
			foreach ($items as $item => $rules) {
				foreach ($rules as $rule => $rule_value) {
					
					$value = trim($source[$item]);
					$item = escape($item);
					
					if ($rule === 'required' && empty($value) ) {
						$this->addError("{$item} is required");
					} else if(!empty($value)) {
						switch ($rule) {
							case 'min':
								if (strlen($value) < $rule_value) {
									$this->addError("{$item} must has a minimun of {$rule_value} characters");
								}
								break;
							case 'max':
								if (strlen($value) > $rule_value) {
									$this->addError("{$item} must has a maximun of {$rule_value} characters");
								}
								break;	
							case 'unique':
								$check = $this->_db->get($rule_value, array($item,'=',$value));
								if ($check->count()) {
									$this->addError("{$item} alredy exists.");
								}
								break;														
							case 'matches':
								if ($value != $source[$rule_value]) {
									$this->addError("{$rule_value} doens't match {$item}");
								}
								break;																
							case 'max_num':
								if ($value > $rule_value) {
									$this->addError("{$item} must has a maximun of {$rule_value}");
								}
								break;															
							case 'min_num':
								if ($value < $rule_value) {
									$this->addError("{$item} must has a minimun of {$rule_value}");
								}
								break;
							case 'email':
								if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
									$this->addError("This ($value) email address is considered invalid.");
								}
								break;															
							case 'equal_char':
								if(strlen($value) != $rule_value) {
									$this->addError("{$item} has to be a quantity of {$rule_value}");
								}
								break;														
							case 'b_date':
								if (!validateDate($value) ) {
									$this->addError("{$item} need a valid data like yyyy-mm-ddd");
								}
								break;	
							case 'numeric':
								if (!is_numeric($value)) {
									$this->addError("{$item} is not a valid numeric input");
								}
								break;
							case 'dependency':
								//var_dump($source[$rule_value], $value, $rule_value); exit();
								if (!empty($source[$rule_value])) {
									$this->addError("You have to fill {$value}");
								}
								break;	
							case 'negative_dependency':
								//var_dump($source[$rule_value], $value, $rule_value); exit();
								if (empty($source[$rule_value])) {
									$this->addError("You must not fill {$value}");
								}
								break;
							case 'personal_id':
								if (!preg_match('/\d{6}.\d{4}/', $value, $matches, PREG_OFFSET_CAPTURE)) {
									$this->addError("{$value} is not a valid input");
								}
								break;		
							case 'regex':
								if (!preg_match($rule_value, 
									$value, $matches, PREG_OFFSET_CAPTURE)) {
										$this->addError("{$value} is not a valid input");
								}
								break;
							default:
								# code...
								break;
						}
					}
				}
			}
			if(empty($this->_errors)){
				$this->_passed = true;
			}
			return $this;
		}

		private function addError($error){
			$this->_errors[] = $error;
		}

		public function errors(){
			return $this->_errors;
		}

		public function passed(){
			return $this->_passed;
		}
	}
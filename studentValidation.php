<?php


class userValidation
{

	private $data;
	private $errors = [];
	private static $fields = ['name', 'email', 'year'];


	public function __construct($post_data)
	{
		$this->data = $post_data;
	}

	//check values of fields

	public function validateForm()
	{
		foreach (self::$fields as $field) {
			if (!array_key_exists($field, $this->data))
				trigger_error(" $this->data field does not exist");
			return;
		}
		$this->validateName();
		$this->validateEmail();
		$this->validateYear();
		return $this->errors;

//        calling functions and returning errors

	}

	//check year

	public function validateYear(){
		$val = $this->data['year'];

		if(empty($val)) {
			$this->addError('year', 'year cannot be empty ');
		}else {
			if(!is_int(val)){
				$this->addError('year', 'The year must be an integer');
			}
		}
	}

	//	check year
	public function validateName(){

		$val = trim("$this->data['name']");

		if (empty(val)) {
			$this->addError('name', 'name cannot be empty');
		} else {
			if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
				$this->addError('username', 'username must be 6-12 chars & alphanumeric');
			}
		}
	}

	//	check email

	private function validateEmail(){
		$val = trim("$this->data['email");

		if (empty($val)) {
			$this->addError('email', 'email cannot be empty');
		} else {
			if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
				$this->addError('email', 'must be a valid email');
			}
		}
	}


		private function addError($key, $val){
			$this->errors[$key] = $val;
		}

}
<?php
class Loan{
	private $_db;

	public function __construct($loan = null){
		$this->_db = DB::getInstance();
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('loan', $fields)) {
			throw new Exception("There was a problem creating the account loan");			
		}
	}

	public function all(){
		// if (!) {
		// 	throw new Exception("There was a problem creating the account loan");			
		// }
		$this->_db->query('SELECT 

							customer.first_name,
							customer.last_name,
							customer.birth_date,
							customer.cz_bank_code,
							customer.email,
							customer.house_number,
							customer.lives_at_registred_address,
							customer.personal_id,
							customer.phone,
							customer.postal_index,
							customer.secondary_house_number,
							customer.secondary_postal_index ,
							loan.loan_sum,
							loan.loan_period
			FROM customer JOIN loan ON customer.personal_id = loan.personal_id');
		return $this->_db->results();	
	}
}
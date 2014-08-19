<?php
	require_once 'core/init.php';

	// check if the form has been submited alredy and validate data
	if (Input::exists()) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'first_name' => array(
					'required' => true,   // 'matches' => 'password'	'unique' => 'users'
					'min' => 2, 
					'max' => 255				
				),
				'last_name' => array(
					'required' => true,   
					'min' => 2, 
					'max' => 255					
				),
				'email' => array(
					'required' => true,   
					'min' => 2, 
					'email' => true					
				),
				'phone' => array(
					'required' => true,   
					'equal_char' => 9,
					'numeric' => true				
				),
				'birth_date' => array(
					'required' => true,
					'b_date' => true
				),
				'cz_bank_code' => array(
					'required' => true,   
					'min' => 2, 
					'max' => 20					
				),
				'postal_index' => array(
					'required' => true,   
					'min' => 2, 
					'max' => 20,
					'regex' => '/^[0-9]{3}[\s]*[0-9]{2}$/'					
				),
				'personal_id' => array(
					'required' => true,   
					'equal_char' => 11,
					'personal_id' => true		
				),
				'loan_sum' => array(
					'required' => true,   
					'min_num' => 500, 
					'max_num' => 10000,
					'numeric' => true					
				),
				'loan_period' => array(
					'required' => true,   
					'min_num' => 1, 
					'max_num' => 30,
					'numeric' => true				
				),
				'house_number' => array(
					'min' => 2, 
					'required' => true,   
					'regex' => '/^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/'			
				),
				'secondary_postal_index' => array(
					'min' => 2, 
					'max' => 20,
					'regex' => '/^[0-9]{3}[\s]*[0-9]{2}$/'//,
					//'negative_dependency' => 'last_name'				
				),
				'secondary_house_number' => array(
					//'dependency' => 'last_name',   
					'regex' => '/^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/'			
				),
			));

			if ($validation->passed()) {
				$user = new User();
				try {				
					$user->create(array(
						'first_name' => ucfirst(strtolower(Input::get('first_name'))),
						'last_name' => ucfirst(strtolower(Input::get('last_name'))),
						'email' => Input::get('email'),
						'phone' => Input::get('phone'),
						'birth_date' => Input::get('birth_date'),
						'cz_bank_code' => Input::get('cz_bank_code'),
						'house_number' => Input::get('house_number'),
						'postal_index' => Input::get('postal_index'),
						'lives_at_registred_address' => Input::get('lives_at_registred_address'),
						'secondary_house_number' => Input::get('secondary_house_number'),
						'secondary_postal_index' => Input::get('secondary_postal_index'),
						'personal_id' => Input::get('personal_id')
					));

				} catch (Exception $e) {
					die($e->getMessage());
				}

				$loan = new Loan();
				try {				
					$loan->create(array(
						'loan_sum' => ucfirst(strtolower(Input::get('loan_sum'))),
						'loan_period' => ucfirst(strtolower(Input::get('loan_period'))),
						'personal_id' => Input::get('personal_id')
					));

				} catch (Exception $e) {
					die($e->getMessage());
				}


				Session::flash('home', 'You are in! you can now login');
				Redirect::to('index.php');
			}else{
				foreach ($validation->errors() as $error) {
					echo $error . "<br>";
				}
			}
	}

	include 'includes/template/header.php';
?>

<!-- Pre form style begin -->

<body>
    <div class="container">
        <div class="row">
            <!-- form: -->
            <section>
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <h2>Register</h2>
                    </div>

<!-- Pre from style end -->

<form action="" method="post" id="defaultForm" class="form-horizontal">
	<fieldset>	<legend>Personal data:</legend>

		<div class="field">
		<label for="first_name">First name</label>
		<input type="text" name="first_name" id="first_name" value="<?php echo escape(Input::get('first_name')); ?>" placeholder="Norman">
		</div>
		<div class="field">
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" id="last_name" value="<?php echo escape(Input::get('last_name')); ?>" placeholder="Miller">
		</div>
		<div class="field">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="nmiller@example.com">
		</div>
		<div class="field">
			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone" placeholder="123456678">
		</div>
		<div class="field">
			<label for="birth_date">Birth date</label>
			<input type="text" name="birth_date" id="birth_date" placeholder="1980-01-01">
		</div>
		<div class="field">
			<label for="cz_bank_code">Bank code</label>
			<input type="text" name="cz_bank_code" id="cz_bank_code" placeholder="0800">
		</div>
		<div class="field">
			<label for="house_number">House number</label>
			<input type="text" name="house_number" id="house_number" placeholder="12b">
		</div>
		<div class="field">
			<label for="postal_index">Postal code</label>
			<input 	type="text" name="postal_index" id="postal_index" placeholder="24353">
		</div>
		<div class="field">
			<input type="checkbox" name="lives_at_registred_address" value="1">lives at registred address
		</div>
		<div class="field">
			<label for="secondary_house_number">Secondary house number</label>
			<input type="text" name="secondary_house_number" id="secondary_house_number" placeholder="23s">
		</div>
		<div class="field">
			<label for="secondary_postal_index">Secondary postal code</label>
			<input type="text" name="secondary_postal_index" id="secondary_postal_index" placeholder="24353">
		</div>
		<div class="field">
			<label for="personal_id">Personal ID</label>
			<input type="text" name="personal_id" id="personal_id" placeholder="891103/1238">
		</div>
		<hr>
		<div class="field">
			<label for="loan_sum">Loan sum</label>
			<input type="text" name="loan_sum" id="loan_sum" placeholder="4000">
		</div>
		<div class="field">
			<label for="loan_period">Loan period</label>
			<input type="text" name="loan_period" id="loan_period" placeholder="15">
		</div>
		<hr>
		<input type="submit" value="Register">		
	</fieldset>
	<!-- <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> -->
</form>

<!-- END FROM STYLE BEGIN -->

                </div>
            </section>
            <!-- :form -->
        </div>
    </div>
<!-- END FROM STYLE END -->

<?php
	include 'includes/template/footer.php';
?>
<?php
	require_once 'core/init.php';

	$client_record = new Loan();

	echo json_encode($client_record->all());


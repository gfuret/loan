<?php

	include 'core/init.php';

	if (Session::exists('success')) {
		echo '<p>' . Session::flash('success') . '</p>';
	}

	$user = new User();
	if ($user->isLoggedIn()) {

	include 'includes/template/header.php';
?>
	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Update password</a></li>
	</ul>

<?php
		if ($user->hasPermission('admin')) {
			echo "You are an admin";
		}else{
			echo "You are not an admin";
		}

	} else {
		echo '<a href="register.php">Register</a></p>';
		echo '<a href="client_directory.php">Records</a></p>';
	}

	include 'includes/template/footer.php';
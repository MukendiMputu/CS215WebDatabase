<?php
	require_once('private/initialize.php');

	if(log_out_user()) {
		redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/index.php');
	}
?>
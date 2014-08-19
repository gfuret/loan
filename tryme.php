

<?php
	require_once 'core/init.php';
	include 'includes/template/header.php';
?>




<form>
		<div class="form-group">
			<label>lives at registred address</label><br>
			<input type="radio" name="lives_at_registred_address" value="yes">true
			<input type="radio" name="lives_at_registred_address" value="no">false
		</div>
</form>

<script type="text/javascript">



    $('input[name="lives_at_registred_address"]').change(function() {
    	dependency();       
    	console.log($('input[name="lives_at_registred_address"]:checked').val());
    	console.log('change');
    });

    function dependency(){
        if($('input[name="lives_at_registred_address"]:checked').val() == 'yes') {
        	console.log('yes');
        }else{
        	console.log('no');
        }    	
    }


</script>



<?php
	include 'includes/template/footer.php';
?>
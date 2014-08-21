

<?php
	require_once 'core/init.php';
	include 'includes/template/header.php';
?>


<!-- class="form-horizontal" -->

<form action="" method="post" id="defaultForm" >
		<div class="form-group" >
			<label>lives at registred address</label><br>
			<input type="radio" name="lives_at_registred_address" value="yes">true
			<input type="radio" name="lives_at_registred_address" value="no">false
		</div>
        <div class="form-group">
            <label class="control-label" for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Norman">
            <div class="message"></div>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Miller">
            <div class="message"></div>
        </div>
        <input type="submit" value="Register" class="insert">               
</form>

<script type="text/javascript">



    $('input[name="lives_at_registred_address"]').change(function() {
    	dependency();       
    	console.log($('input[name="lives_at_registred_address"]:checked').val());
    	console.log('change');
    });

    function dependency(){
        if($('input[name="lives_at_registred_address"]:checked').val() == 'yes') {
        	$('.message').html('On');
            on();
        }else{
        	$('.message').html('Off');
        }    	
    }


function on(){
    console.log('on');
}


$(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    message: 'The name is not valid',
                    validators: {
                        callback: {
                            message: 'Wrong answer',
                            callback: function(value, validator) {
                                return ($('input[name="lives_at_registred_address"]:checked').val() != 'no' 
                                    || $('#first_name').val().length > 1);
                                //1 == 1;
                            }
                        }                                        
                    }
                },
                last_name: {
                    message: 'The last name is not valid',
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: 'The last name must be more than 2 and less than 255 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The last name can only consist of alphabetical, number, dot and underscore'
                        }
                    }
                }    
            }
        });
});


</script>
<hr>
<hr>




<?php
	include 'includes/template/footer.php';
?>
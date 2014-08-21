

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
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The name must be more than 2 and less than 255 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            last_name: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The last name must be more than 2 and less than 255 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The last name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The phone is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 9,
                        max: 9,
                        message: 'The phone number is 9 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Just digist please'
                    }
                }
            },
            birth_date: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        separator: '-'
                    }
                }
            },
            cz_bank_code: {
                validators: {
                    notEmpty: {
                        message: 'The bank is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The bank number is 4 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Just digist please'
                    }
                }
            },
            house_number: {
                message: 'The House number is not valid',
                validators: {
                    notEmpty: {
                        message: 'The number is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 255,
                        message: 'The number must be more than 2 and less than 255 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The number can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            postal_index: {
                message: 'The postal code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The postal code is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'The postal code must be 5 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The postal code can only consist of number'
                    }
                }
            },
            personal_id: {
                message: 'The postal code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The postal code is required and can\'t be empty'
                    },
                    regexp: {
                        regexp:  /\d{6}\/\d{4}/ ,
                        message: 'The postal code can only consist of number and slash'
                    }
                }
            },
            loan_sum: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    lessThan: {
                        value: 10000,
                        inclusive: true,
                        message: 'No more than 10000'
                    },
                    greaterThan: {
                        value: 500,
                        inclusive: false,
                        message: 'No less than 500'
                    },
                    regexp: {
                        regexp:  /\d/ ,
                        message: 'The postal code can only consist of numeric characters'
                    }
                }
            },
            loan_period: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    lessThan: {
                        value: 30,
                        inclusive: true,
                        message: 'No more than 30'
                    },
                    greaterThan: {
                        value: 1,
                        inclusive: false,
                        message: 'No less than 1'
                    },
                    regexp: {
                        regexp:  /\d/ ,
                        message: 'The postal code can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            secondary_house_number: {
                message: 'The House number is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 255,
                        message: 'The number must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The number can only consist of num characters'
                    },
                    callback: {
                        message: 'If you mark false in lives at registred address you must fill this input',
                        callback: function(value, validator) {
                            return ($('input[name="lives_at_registred_address"]:checked').val() != 'no' 
                                || $('#secondary_house_number').val().length > 1);
                        }
                    }                    
                }
            },
            secondary_postal_index: {
                message: 'The postal code is not valid',
                validators: {
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'The postal code must be 5 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The postal code can only of numerical characters'
                    },
                    callback: {
                        message: 'If you mark false in lives at registred address you must fill this input',
                        callback: function(value, validator) {
                            return ($('input[name="lives_at_registred_address"]:checked').val() != 'no' 
                                || $('#secondary_postal_index').val().length > 1);
                        }
                    }  
                }
            }     
        }
    });

});
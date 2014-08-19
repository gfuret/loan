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
                        min: 2,
                        max: 255,
                        message: 'The number must be more than 2 and less than 30 characters long'
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
                        message: 'The postal code must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The postal code can only consist of alphabetical, number, dot and underscore'
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
                        message: 'The postal code can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            loan_sum: {
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    lessThan: {
                        value: 10000,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 500,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 10'
                    }
            },
            loan_period: {
                message: 'The postal code is not valid',
                    notEmpty: {
                        message: 'The name is required and can\'t be empty'
                    },
                    lessThan: {
                        value: 30,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 1,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 10'
                    }
            },
            secondary_house_number: {
                message: 'The House number is not valid',
                validators: {
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The number must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The number can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            secondary_postal_index: {
                message: 'The postal code is not valid',
                validators: {
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'The postal code must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp:  /^\d+[a-zA-Z]?((\/\d+[a-zA-Z]?)?|(-\d+[a-zAZ]?)?)$/ ,
                        message: 'The postal code can only consist of alphabetical, number, dot and underscore'
                    }
                }
            }     
        }
    });
});
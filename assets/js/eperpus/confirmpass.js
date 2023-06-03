$('#password-input').on('keyup', function() {
    let passValue = $(this).val()
    $('#confirm-input').on('keyup', function() {
        let confirmPassValue = $(this).val()
        if ((passValue != confirmPassValue) && (passValue != "" && confirmPassValue != "")) {
            $('#register').addClass('disabled')
            $('#confirm-pass-hint').removeClass('d-none')
        } else {
            $('#register').removeClass('disabled')
            $('#confirm-pass-hint').addClass('d-none')
        }
    })
})
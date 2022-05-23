//==================================================
// DATE PICKER CONFIGS
//==================================================
const datePickerConfigs = {
    changeMonth: true,
    changeYear: true,
    yearRange: '-90:-18',
    dateFormat: 'dd/mm/yy',
    maxDate: '-18Y',
}

//==================================================
// HANDLE REGISTER
//==================================================
const handleRegister = () => {
    //==================================================
    // HELPERS
    //==================================================
    const validationsArray = []

    const valid = id => {
        $(id).removeClass('invalid').addClass('valid')
        validationsArray.push(true)
    }

    const invalid = id => {
        $(id).removeClass('valid').addClass('invalid')
        validationsArray.length = 0
    }

    $(document).ready(() => {
        $('#submit').attr('disabled', true)

        //==================================================
        // HANDLE DATE OF BIRTH
        //==================================================
        $('#inputDate').datepicker({ ...datePickerConfigs })

        //==================================================
        // HANDLE PASSWORD INPUT
        //==================================================
        $('input[type=password]')
            .keyup(() => {
                const clientInput = $('input[type=password]').val()

                //==================================================
                // CONTAINS REQUIRED LENGTH
                //==================================================
                clientInput.length < 8 ? invalid('#length') : valid('#length')

                //==================================================
                // CONTAINS LETTER
                //==================================================
                clientInput.match(/[A-z]/) ? valid('#letter') : invalid('#letter')

                //==================================================
                // CONTAINS CAPITAL LETTER
                //==================================================
                clientInput.match(/[A-Z]/) ? valid('#capital') : invalid('#capital')

                //==================================================
                // CONTAINS NUMBER
                //==================================================
                clientInput.match(/\d/) ? valid('#number') : invalid('#number')

                //==================================================
                // CONTAINS ALL VALIDATIONS
                //==================================================
                validationsArray.length >= 7
                    ? $('#submit').attr('disabled', false)
                    : $('#submit').attr('disabled', true)
                console.log(validationsArray.length)
            })
            .focus(() => {
                $('#pswd_info').show()
            })
            .blur(() => {
                $('#pswd_info').hide()
            })
    })
}

export default handleRegister

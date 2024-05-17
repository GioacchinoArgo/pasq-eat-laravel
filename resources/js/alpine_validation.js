export default () => ({

    isValid: false,
    regex: /\d/,
    regexEmail: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    regexVat: /^(IT)?[0-9]{11}$/,

    // Data del Nome del Ristorante
    restaurantName: '',
    restaurantNameMessage: '',
    restaurantNameError: false,
    isRestaruantNameValid: false,

    // Data del Nome dell'utente
    name: '',
    nameMessage: '',
    nameError: false,
    isNameValid: false,

    // Data del Cognome dell'utente
    lastname: '',
    lastnameMessage: '',
    lastnameError: false,
    isLastnameValid: false,

    // Data dell'email
    email: '',
    emailMessage: '',
    emailError: false,
    isEmailValid: false,

    // Data della password
    password: '',
    passwordMessage: '',
    passwordError: false,
    isPasswordValid: false,

    // Data della Conferma Password
    passwordConfirm: '',
    passwordConfirmMessage: '',
    passwordConfirmError: false,
    isPasswordConfirmValid: false,

    // Data dell'indirizzo
    address: '',
    addressMessage: '',
    addressError: false,
    isAddressValid: false,

    // Data del VAT (P.IVA)
    vat: '',
    vatMessage: '',
    vatError: false,
    isVatValid: false,

    // Validazione Nome del ristorante
    restaurantNameValidation() {
        this.isRestaruantNameValid = true;
        if (!this.restaurantName) {
            this.restaurantNameMessage = 'Il campo è obbligatorio';
            this.restaurantNameError = true;
        } else if (this.restaurantName.length < 5 && this.restaurantName.length >= 1) {
            this.restaurantNameMessage = 'Il nome del ristorante deve avere più di 5 caratteri';
            this.restaurantNameError = true;
        } else if (!isNaN(this.restaurantName) && this.restaurantName.length >= 1) {
            this.restaurantNameMessage = 'Il nome del ristorante non può avere solo numeri';
            this.restaurantNameError = true;
        } else {
            this.restaurantNameError = false;
            this.restaurantNameMessage = '';
        }
    },

    // Validazione Nome dell'utente
    nameValidation() {
        this.isNameValid = true;
        if (!this.name) {
            this.nameMessage = 'Il campo è obbligatorio';
            this.nameError = true;
        } else if (this.name.length < 2 && this.name.length >= 1) {
            this.nameMessage = 'Il nome deve avere più di 2 caratteri';
            this.nameError = true;
        } else if (this.regex.test(this.name) && this.name.length >= 1) {
            this.nameMessage = 'Il nome non può contenere numeri';
            this.nameError = true;
        } else {
            this.nameError = false;
            this.nameMessage = '';
        }
    },

    // Validazione Cognome dell'utente
    lastnameValidation() {
        this.isLastnameValid = true;
        if (!this.lastname) {
            this.lastnameMessage = 'Il campo è obbligatorio';
            this.lastnameError = true;
        } else if (this.lastname.length < 2 && this.lastname.length >= 1) {
            this.lastnameMessage = 'Il cognome deve avere più di 2 caratteri';
            this.lastnameError = true;
        } else if (this.regex.test(this.lastname) && this.lastname.length >= 1) {
            this.lastnameMessage = 'Il cognome non può contenere numeri';
            this.lastnameError = true;
        } else {
            this.lastnameError = false;
            this.lastnameMessage = '';
        }
    },

    // Validazione email
    emailValidation() {
        this.isEmailValid = true;
        if (!this.email) {
            this.emailMessage = 'Il campo è obbligatorio';
            this.emailError = true;
        } else if (!this.email.match(this.regexEmail) && this.email.length >= 1) {
            this.emailMessage = 'Email non corretta';
            this.emailError = true;
        } else {
            this.emailError = false;
            this.emailMessage = '';
        }
    },

    // Validazione Password
    passwordValidation() {
        this.isPasswordValid = true;
        if (!this.password.length) {
            this.passwordMessage = 'Il campo è obbligatorio';
            this.passwordError = true;
        } else if (this.password.length < 8 && this.password.length >= 1) {
            this.passwordMessage = 'La password deve contenere almeno 8 caratteri';
            this.passwordError = true;
        } else {
            this.passwordMessage = '';
            this.passwordError = false;
        }
    },

    // Validazione Conferma Password
    passwordConfirmValidation() {
        this.isPasswordConfirmValid = true;
        if (!this.passwordConfirm.length) {
            this.passwordConfirmMessage = 'Il campo è obbligatorio';
            this.passwordConfirmError = true;
        } else if (this.password !== this.passwordConfirm) {
            this.passwordConfirmMessage = 'Le password non coincidono';
            this.passwordConfirmError = true;
        } else {
            this.passwordConfirmMessage = '';
            this.passwordConfirmError = false;
        }
    },

    // Validazione dell'indirizzo
    addressValidation() {
        this.isAddressValid = true;
        if (!this.address.length) {
            this.addressMessage = 'Il campo è obbligatorio';
            this.addressError = true;
        } else if (this.address.length < 5 && this.address.length >= 1) {
            this.addressMessage = 'L\'indirizzo deve avere più di 5 lettere';
            this.addressError = true;
        } else if (!isNaN(this.address) && this.address.length >= 1) {
            this.addressMessage = 'L\'indirizzo non può avere solo numeri';
            this.addressError = true;
        } else {
            this.addressError = false;
            this.addressMessage = '';
        }
    },

    // Validazione VAT (P.IVA)
    vatValidation() {
        this.isVatValid = true;
        if (!this.vat.length) {
            this.vatMessage = 'Il campo è obbligatorio';
            this.vatError = true;
        } else if (this.vat.length < 13 && this.vat.length >= 1) {
            this.vatMessage = 'La P.IVA deve avere almeno 11 caratteri dopo IT';
            this.vatError = true;
        } else if (!this.vat.match(this.regexVat) && this.vat.length >= 1) {
            this.vatMessage = 'Il formato non è valido';
            this.vatError = true;
        } else {
            this.vatMessage = '';
            this.vatError = false;
        }
    }
})
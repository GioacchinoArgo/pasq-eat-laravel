export default () => ({

    isValid: false,

    // Data del Nome del Ristorante
    restaurant: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 5 && this.value.length >= 1) {
                this.message = 'Il nome del ristorante deve avere più di 5 caratteri';
                this.error = true;
            } else if (!isNaN(this.value) && this.value.length >= 1) {
                this.message = 'Il nome del ristorante non può avere solo numeri';
                this.error = true;
            } else {
                this.error = false;
                this.message = '';
                this.isValid = true;
            }
        }
    },

    // Data del Nome dell'utente
    name: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        regex: /\d/,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 2 && this.value.length >= 1) {
                this.message = 'Il nome deve avere più di 2 caratteri';
                this.error = true;
            } else if (this.regex.test(this.value) && this.value.length >= 1) {
                this.message = 'Il nome non può contenere numeri';
                this.error = true;
            } else {
                this.error = false;
                this.message = '';
                this.isValid = true;
            }
        }
    },

    // Data del Cognome dell'utente
    lastname: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        regex: /\d/,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 2 && this.value.length >= 1) {
                this.message = 'Il cognome deve avere più di 2 caratteri';
                this.error = true;
            } else if (this.regex.test(this.value) && this.value.length >= 1) {
                this.message = 'Il cognome non può contenere numeri';
                this.error = true;
            } else {
                this.error = false;
                this.message = '';
                this.isValid = true;
            }
        }
    },

    // Data della email
    email: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        regex: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (!this.value.match(this.regex) && this.value.length >= 1) {
                this.message = 'Email non corretta';
                this.error = true;
            } else {
                this.error = false;
                this.message = '';
                this.isValid = true;
            }
        },
    },

    // Data dell'indirizzo
    address: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        validation() {
            if (!this.value.length) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 5 && this.value.length >= 1) {
                this.message = 'L\'indirizzo deve avere più di 5 lettere';
                this.error = true;
            } else if (!isNaN(this.value) && this.value.length >= 1) {
                this.message = 'L\'indirizzo non può avere solo numeri';
                this.error = true;
            } else {
                this.error = false;
                this.message = '';
                this.isValid = true;
            }
        },
    },

    // Data della P.IVA
    vat: {
        value: '',
        message: '',
        error: false,
        isValid: false,
        regex: /^(IT)?[0-9]{11}$/,
        validation() {
            if (!this.value.length) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 13 && this.value.length >= 1) {
                this.message = 'La P.IVA deve avere almeno 11 caratteri dopo IT';
                this.error = true;
            } else if (!this.value.match(this.regex) && this.value.length >= 1) {
                this.message = 'Il formato non è valido';
                this.error = true;
            } else {
                this.message = '';
                this.error = false;
                this.isValid = true;
            }
        }
    },

    // Data della password
    password: {
        value: '',
        valueConfirm: '',
        message: '',
        messageConfirm: '',
        error: false,
        errorConfirm: false,
        isValid: false,
        isValidConfirm: false,
        validation() {
            if (!this.value.length) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
            } else if (this.value.length < 8 && this.value.length >= 1) {
                this.message = 'La password deve contenere almeno 8 caratteri';
                this.error = true;
            } else {
                this.message = '';
                this.error = false;
                this.isValid = true;
            }
        },
        confirmValidation() {
            if (!this.valueConfirm.length) {
                this.messageConfirm = 'Il campo è obbligatorio';
                this.errorConfirm = true;
            } else if (this.value !== this.valueConfirm) {
                this.messageConfirm = 'Le password non coincidono';
                this.errorConfirm = true;
            } else {
                this.messageConfirm = '';
                this.errorConfirm = false;
                this.isValidConfirm = true;
            }
        },
    },
})

export default () => ({

    isValid: false,
    regex: /\d/,
    regexEmail: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,

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
    }

})
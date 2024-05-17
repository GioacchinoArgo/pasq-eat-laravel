// Recupero gli elementi
const inputs = document.querySelectorAll('.form-inputs');
const inputPassword = document.getElementById('password');
const inputPasswordConfirm = document.getElementById('password-confirm');
const invalidMessage = document.querySelectorAll('.invalid-message');
const form = document.getElementById('registration-form');
const checkBoxes = document.querySelectorAll('[type="checkbox"]');
const textCheckbox = document.getElementById('text-checkbox');

// Regex
const regex = /\d/;
const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regexVat = /^(IT)?[0-9]{11}$/;

// Flag checkbox
let isCheckboxValid = false;

// Flag input
let isValid = false;


inputs.forEach((input, i) => {
    input.addEventListener('blur', () => {

        const inputField = input.value.trim();
        // Se l'input è vuoto
        if (!inputField) {

            // Riassegno la flag a false
            isValid = false;

            // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');

            // Costruisco il messaggio di errore e lo aggiungo all'invalid message
            invalidMessage[i].innerText = 'Il campo è obbligatorio'

        } else {

            // Aggiungo la classe 'is-valid' e rimuovo la classe 'is-invalid'
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');

            // Rimuovo il messaggio di errore
            invalidMessage[i].innerText = '';
        }

        // Input restaurant_name
        if (input.id === 'restaurant_name') {
            if (inputField.length < 5 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome del ristorante deve avere più di 5 caratteri';
            }

            // Se è un numero
            if (!isNaN(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome del ristorante non può avere solo numeri';
            }
        }

        // Input name
        if (input.id === 'name') {
            if (inputField.length < 2 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome deve avere più di 2 caratteri';
            }


            // Se è un numero
            if (regex.test(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome non può contenere numeri';
            }
        }

        // Input lastname
        if (input.id === 'lastname') {
            if (inputField.length < 2 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il cognome deve avere più di 2 caratteri';
            }


            // Se è un numero
            if (regex.test(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il cognome non può contenere numeri';
            }
        }

        // Input email
        if (input.id === 'email') {
            if (!input.value.match(regexEmail) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Email non corretta';
            }

            // Giro su tutte le email
            emails.forEach(({ email }) => {

                // Se l'email nel database è uguale all'email inserita
                if (email === inputField) {

                    // Riassegno la flag a false
                    isValid = false;

                    // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');

                    // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                    invalidMessage[i].innerText = 'Questa email è già stata utilizzata';
                }
            })
        }

        // Input password
        if (input.id === 'password') {
            if (inputField.length < 8 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La password deve contenere almeno 8 caratteri';
            }
        }

        // Input password-confirm
        if (input.id === 'password-confirm') {
            if (inputPassword.value !== inputPasswordConfirm.value) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Le password non coincidono';
            }
        }

        // Input indirizzo
        if (input.id === 'address') {
            if (inputField.length < 5 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'L\'indirizzo deve avere più di 5 lettere';
            }

            // Se è un numero
            if (!isNaN(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La via del ristorante non può avere solo numeri';
            }
        }

        // Input VAT
        if (input.id === 'vat') {
            if (inputField.length < 13 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La P.IVA deve avere almeno 11 caratteri dopo IT';
            }

            if (!input.value.match(regexVat) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il formato non è valido';
            }

            // Giro su tuttle le P.IVA
            vats.forEach(({ vat }) => {

                // Se la P.IVA nel database è uguale alla P.IVA inserita
                if (vat === inputField) {

                    // Riassegno la flag a false
                    isValid = false;

                    // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');

                    // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                    invalidMessage[i].innerText = 'P.IVA già esistente';
                }
            })
        }
    });
});

form.addEventListener('submit', e => {
    // Flag
    isValid = true;

    // Giro su tutti gli input
    inputs.forEach((input, i) => {
        const inputField = input.value.trim();
        // Se l'input è vuoto
        if (!inputField) {

            // Riassegno la flag a false
            isValid = false;

            // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');

            // Costruisco il messaggio di errore e lo aggiungo all'invalid message
            invalidMessage[i].innerText = 'Il campo è obbligatorio'

        } else {

            // Aggiungo la classe 'is-valid' e rimuovo la classe 'is-invalid'
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');

            // Rimuovo il messaggio di errore
            invalidMessage[i].innerText = '';
        }

        // Input restaurant_name
        if (input.id === 'restaurant_name') {
            if (inputField.length < 5 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome del ristorante deve avere più di 5 caratteri';
            }

            // Se è un numero
            if (!isNaN(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome del ristorante non può avere solo numeri';
            }
        }

        // Input name
        if (input.id === 'name') {
            if (inputField.length < 2 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome deve avere più di 2 caratteri';
            }


            // Se è un numero
            if (regex.test(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il nome non può contenere numeri';
            }
        }

        // Input lastname
        if (input.id === 'lastname') {
            if (inputField.length < 2 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il cognome deve avere più di 2 caratteri';
            }


            // Se è un numero
            if (regex.test(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il cognome non può contenere numeri';
            }
        }

        // Input email
        if (input.id === 'email') {
            if (!input.value.match(regexEmail) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Email non corretta';
            }

            // Giro su tutte le email
            emails.forEach(({ email }) => {

                // Se l'email nel database è uguale all'email inserita
                if (email === inputField) {

                    // Riassegno la flag a false
                    isValid = false;

                    // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');

                    // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                    invalidMessage[i].innerText = 'Questa email è già stata utilizzata';
                }
            })
        }

        // Input password
        if (input.id === 'password') {
            if (inputField.length < 8 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La password deve contenere almeno 8 caratteri';
            }
        }

        // Input password-confirm
        if (input.id === 'password-confirm') {
            if (inputPassword.value !== inputPasswordConfirm.value) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Le password non coincidono';
            }
        }

        // Input indirizzo
        if (input.id === 'address') {
            if (inputField.length < 5 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'L\'indirizzo deve avere più di 5 lettere';
            }

            // Se è un numero
            if (!isNaN(inputField) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La via del ristorante non può avere solo numeri';
            }
        }

        // Input VAT
        if (input.id === 'vat') {
            if (inputField.length < 13 && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'La P.IVA deve avere almeno 11 caratteri dopo IT';
            }

            if (!input.value.match(regexVat) && inputField.length >= 1) {

                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il formato non è valido';
            }

            // Giro su tuttle le P.IVA
            vats.forEach(({ vat }) => {

                // Se la P.IVA nel database è uguale alla P.IVA inserita
                if (vat === inputField) {

                    // Riassegno la flag a false
                    isValid = false;

                    // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');

                    // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                    invalidMessage[i].innerText = 'P.IVA già esistente';
                }
            })

        }
    });

    // Creo una flag
    let categories = [];

    // Faccio un foreach sui checkbox
    checkBoxes.forEach(check => {

        // Controllo che i checkbox non siano checked
        if (!check.checked) {

            // Pusho dentro la flag categories il value del checkbox
            categories.push(check.value);
        }
    })

    // Controllo che la length della flag categories sia minore della length dell'array dei checkbox (checkBoxes)
    if (categories.length < checkBoxes.length) {
        isCheckboxValid = true;
        textCheckbox.classList.add('d-none');
    }

    if (categories.length === checkBoxes.length) {
        isCheckboxValid = false;
        textCheckbox.innerText = 'Aggiungi almeno un categoria';
        textCheckbox.classList.remove('d-none');
    }

    // Controllo se la flag è a false
    if (!isValid || !isCheckboxValid) e.preventDefault();
});
// Recupero gli elementi
const formUpdate = document.getElementById('form-update');
const inputs = document.querySelectorAll('.form-inputs');
const invalidMessage = document.querySelectorAll('.invalid-message');
const dietSelect = document.getElementById('diet');
const courseSelect = document.getElementById('course');

// Flag
let isValid = false;

// Regex
const minRegexDecimal = /^\d+(.\d{1})?$/;
const maxRegexDecimal = /^\d+.\d{0,2}$/;

//! Effettiva validazione

// Validazione al blur
inputs.forEach((input, i) => {
    input.addEventListener('blur', () => {
        const inputField = input.value.trim();

        // Se l'input è vuoto
        if (input.value.length === 0) {

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


        // Input name
        if (input.id === 'name') {
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

        if (input.id === 'price') {
            if (input.value <= 0) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = input.value < 0 ? 'Il prezzo non può essere negativo' : 'Il prezzo non può essere 0';

            } else if (inputField.match(minRegexDecimal)) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il prezzo deve avere 2 decimali';
            } else if (!inputField.match(maxRegexDecimal) && inputField.length >= 1) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il prezzo non può avere più di 3 decimali';
            }

        }
    })
})

// Validazione al submit
formUpdate.addEventListener('submit', e => {
    // Setto la Flag a true
    isValid = true;

    // Giro su tutti gli input
    inputs.forEach((input, i) => {

        const inputField = input.value.trim();

        // Se l'input è vuoto
        if (input.value.length === 0) {

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


        // Input name
        if (input.id === 'name') {
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

        if (input.id === 'price') {
            if (input.value <= 0) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = input.value < 0 ? 'Il prezzo non può essere negativo' : 'Il prezzo non può essere 0';

            } else if (inputField.match(minRegexDecimal)) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il prezzo deve avere 2 decimali';
            } else if (!inputField.match(maxRegexDecimal) && inputField.length >= 1) {
                // Riassegno la flag a false
                isValid = false;

                // Aggiungo la classe 'is-invalid' e rimuovo la classe 'is-valid'
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');

                // Costruisco il messaggio di errore e lo aggiungo all'invalid message
                invalidMessage[i].innerText = 'Il prezzo non può avere più di 3 decimali';
            }

        }

    });

    // Validazione diet select
    if (dietOptions.includes(dietSelect.value) || !dietSelect.value) {
        dietSelect.classList.remove('is-invalid');
    } else {
        isValid = false;
        dietSelect.classList.add('is-invalid');
        dietSelect.classList.remove('is-valid');
    }

    // Validazione course select
    if (courseOptions.includes(courseSelect.value)) {
        courseSelect.classList.add('is-valid');
        courseSelect.classList.remove('is-invalid');
    } else {
        isValid = false
        courseSelect.classList.add('is-invalid');
        courseSelect.classList.remove('is-valid');
    }

    if (!isValid) e.preventDefault();
})
export default () => ({

    // Input da validare
    fields: ['name', 'price', 'course', 'diet'],

    // Data del Nome del piatto
    name: {
        value: dish.name ? dish.name : '',
        message: '',
        error: false,
        isValid: false,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
                this.isValid = false;
            } else if (!isNaN(this.value) && this.value.length >= 1) {
                this.message = 'Il nome del piatto non può avere solo numeri';
                this.error = true;
                this.isValid = false;
            } else {
                this.message = '';
                this.error = false;
                this.isValid = true;
            }
        }
    },

    // Data del Prezzo del piatto
    price: {
        value: dish.price ? dish.price : '',
        message: '',
        error: false,
        isValid: false,
        minRegex: /^\d+(.\d{1})?$/,
        maxRegex: /^\d+.\d{0,2}$/,
        validation() {
            if (!this.value) {
                this.message = 'Il campo è obbligatorio';
                this.error = true;
                this.isValid = false;
            } else if (this.value <= 0) {
                this.message = this.value < 0 ? 'Il prezzo non può essere negativo' : 'Il prezzo non può essere 0';
                this.error = true;
                this.isValid = false;
            } else if (this.value.match(this.minRegex)) {
                this.message = 'Il prezzo deve avere 2 decimali';
                this.error = true;
                this.isValid = false;
            } else if (!this.value.match(this.maxRegex) && this.value.length >= 1) {
                this.message = 'Il prezzo non può avere più di 3 decimal';
                this.error = true;
                this.isValid = false;
            } else {
                this.message = '';
                this.error = false;
                this.isValid = true;
            }
        }
    },

    // Data della select course
    course: {
        value: dish.course ? dish.course : '',
        error: false,
        isValid: false,
        validation() {
            if (!this.value) {
                this.error = true;
                this.isValid = false;
            } else if (!courseOptions.includes(this.value)) {
                this.error = true;
                this.isValid = false;
            } else {
                this.error = false;
                this.isValid = true;
            }
        }
    },

    // Data della select diet
    diet: {
        value: dish.diet ? dish.diet : '',
        error: false,
        isValid: false,
        validation() {
            if (!dietOptions.includes(this.value)) {
                this.error = true;
                this.isValid = false;
            } else {
                this.error = false;
                this.isValid = true;
            }
        }
    },

    // Submit
    validateForm(e) {

        // Giro su tutti i fields
        this.fields.forEach(field => {

            // Prendiamo ogni oggetto e usiamo la funzione al suo interno
            this[field].validation();

            // Se la flag (isValid) è a false allora fai il preventDefault()
            if (!this[field].isValid) e.preventDefault();
        });

    }
})
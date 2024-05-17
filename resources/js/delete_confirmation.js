// Recupero gli elementi
const deleteForms = document.querySelectorAll('.delete-form');
const modal = document.querySelector('.modal');
const modalTitle = document.querySelector('.modal-title');
const modalBody = document.querySelector('.modal-body');
const confirmationButton = document.getElementById('modal-confirmation-button');

// Flag
let activeForm = null;

deleteForms.forEach((form, i) => {
    form.addEventListener('submit', e => {

        // Blocco temporaneamente l'invio
        e.preventDefault();

        activeForm = form;

        // Inserisco i contenuti
        confirmationButton.innerText = 'Elimina';
        confirmationButton.className = 'btn-outline-index text-white fw-semibold red ms-1 px-3 py-2 rounded-pill';
        modalTitle.innerText = `Elimina ${dishes[i].name}`;
        modalBody.innerHTML = `
            <div class="d-none d-lg-block col-3 text-center">
                <img src="http://localhost:8000/storage/${dishes[i].image}" alt="${dishes[i].name}" class="img-fluid rounded-circle">
            </div>
            <div class="info col">
                <p class="mb-0 fs-4">Sei sicuro di voler eliminare ${dishes[i].name}?</p>
            </div>
        `;
    })
});

confirmationButton.addEventListener('click', () => {
    if (activeForm) activeForm.submit();
})
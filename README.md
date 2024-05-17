# DeliveBoo

## Introduzione
DeliveBoo è una web app che permette di ordinare cibo a domicilio nella città di Roma.
Permette agli utenti di cercare i loro cibi preferiti, preparati dai loro ristoranti di fiducia. 

Tutto rimanendo comodamente sul divano di casa.

## Tipi di Utenti
Definiamo i seguenti tipi di utente che possono utilizzare DeliveBoo:

● Utente Interessato (UI): un utente non registrato che visita il sito

● Utente Registrato (UR): un utente che ha effettuato la registrazione come ristoratore
Lista delle pagine

● Homepage:
offre la possibilità di cliccare sulle tipologie di ristorante e senza il refresh della
pagina ottenere una lista di ristoranti con le tipologie di appartenenza sotto ogni
nome.

● Pagina Menù Ristoratore Pubblica:
permette di visualizzare il menù di un particolare ristoratore.
È possibile scegliere i cibi desiderati e relativa quantità per inserirli nel carrello.
Il carrello si popola con i cibi selezionati e le relative quantità.

● Pagina carrello/checkout:
permette di modificare le quantità dei cibi e di procedere all’ordine.
È possibile acquistare solo da un ristoratore alla volta.
Tramite questo pannello è possibile pagare inserendo i dettagli della carta di credito.

● Dashboard Utente Registrato:
permette la gestione dei propri dati e l’inserimento dei piatti disponibili

○ Pagina Lista Piatti
Da qui è possibile accedere alla modifica e cancellazione dei propri piatti
I piatti non hanno categoria e si mostrano in ordine alfabetico. (possibilità di
integrare ordinamento e categoria successivamente)

○ Pagina Piatto
pagina per l’inserimento del piatto singolo con descrizione e prezzo

○ Pagina Lista Ordini Ricevuti

○ Pagina Statistiche Ordini
permette di visualizzare le statistiche degli ordini.
Nello specifico i grafici mostrano il numero di ordini per mesi/anni e
l’ammontare delle vendite

## Requisiti Tecnici
### (RT1) Client-side Validation
Tutti gli input inseriti dall’utente sono controllati client-side (oltre che server-side) per un
controllo di veridicità (es. il prezzo di un piatto deve essere positivo).
### (RT2) Sistema di Pagamento
Il sistema di pagamento utilizzato è Braintree: https://www.braintreepayments.com/
Il sistema permette agli sviluppatori di simulare pagamenti senza essere approvati
formalmente e senza utilizzare vere carte di credito.
### (RT3) Il sito è responsive
Il sito è correttamente visibile da desktop e da smartphone.
### (RT4) La ricerca dei ristoranti avviene senza il refresh

## Requisiti Funzionali
La piattaforma soddisfa i seguenti requisiti funzionali (RF) che vengono dettagliati nelle
pagine successive:

● (RF1) Permettere ai ristoratori di registrarsi alla piattaforma

● (RF2) Permettere ai ristoratori di aggiungere un piatto

● (RF3) Permette ai visitatori di ricercare per tipologia di ristorante

● (RF4) Permettere ai visitatori di vedere il menu di un ristorante

● (RF5) Permettere ai UI di pagare l’ordinazione

● (RF6) Permettere ai ristoratori di visualizzare il riepilogo degli ordini ricevuti

● (RF7) Permettere ai ristoratori di visualizzare le statistiche degli ordini

### (RF1) Permettere ai ristoratori di registrarsi alla piattaforma
#### Visibilità: UI
#### Descrizione:
L’applicazione permette ai ristoratori di registrarsi alla piattaforma e creare un profilo.
Le informazioni che l’utente può inserire sono:

● Email *

● Password *

● Nome Attività *

● Indirizzo *

● PIVA *

● Uno o più tipologie*:
italiano, internazionale, cinese, giapponese, messicano, indiano, pesce, carne,
pizza...

Sono contrassegnati con * i dati obbligatori.

Email e password sono utilizzati dall’utente per fare il login alla piattaforma.
Non è previsto un pannello per modificare le informazioni inserite una volta registrato.
I form devono rispettare RT1
#### Risultato: 
Un nuovo utente viene creato nel sistema
#### Eccezioni: 
Esiste già nel sistema un utente con l’email inserita

### (RF2) Permettere ai ristoratori di aggiungere un piatto
#### Visibilità: UR
#### Descrizione: Un ristoratore ha la possibilità di inserire uno o più piatti all’interno del sistema.
Per inserire un nuovo piatto vanno inserite le seguenti informazioni:
● Nome piatto
● Ingredienti/descrizione
● Prezzo
● visibile si/no
È possibile modificare le informazioni inserite
I form devono rispettare RT1.
#### Risultato: 
Un piatto è inserito nel sistema e le sue informazioni sono aggiornate
#### Eccezioni: /

### (RF3) Permette ai visitatori di ricercare per tipologia di ristorante
#### Visibilità: UI / UR
#### Descrizione: Un utente è in grado di ricercare per una o più tipologie di ristorante
La ricerca dei ristoranti deve rispettare RT4
#### Risultato: 
Viene generata una lista di ristoranti che corrispondono alla ricerca
#### Eccezioni: /

### (RF4) Permettere ai visitatori di vedere il menu di un ristorante
#### Visibilità: UI / UR
#### Descrizione: Selezionando un ristoratore appaiono tutti i dettagli disponibili riguardanti il
ristorante e i piatti disponibili.
È possibile aggiungere piatti al carrello cliccando sui singoli prodotti.
Il carrello si visualizza in pagina e si aggiorna senza refresh.
#### Risultato: 
Viene visualizzata la pagina del menu
#### Eccezioni: /

### (RF5) Permettere ai UI di pagare l’ordinazione
#### Visibilità: UI / UR
#### Descrizione: in questa pagina è possibile aggiornare il carrello e inserire i dati per la
consegna e della carta di credito con cui processare il pagamento
#### Risultato: 
L’ordine viene effettuato e si viene inviati ad una pagina di avvenuto ordine e
viene inviata una mail all’utente e al ristoratore
#### Eccezioni:
 Il sistema di pagamento non ha processato correttamente il pagamento / i dati
della carta di credito non sono validi

### (RF6) Permettere ai ristoratori di visualizzare il riepilogo degli ordini
ricevuti
#### Visibilità: UR
#### Descrizione: Un ristoratore ha la possibilità di vedere il riepilogo degli ordini ricevuti, con i
dati dell’utente che ha effettuato l’ordine.
#### Risultato: 
L'utente visualizza il riepilogo degli ordini ricevuti, ordinati in modo decrescente
per data
#### Eccezioni: /

### (RF7) Permettere ai ristoratori di visualizzare le statistiche degli ordini
#### Visibilità: UR
#### Descrizione: 
Un ristoratore ha la possibilità di vedere le statistiche degli ordini ricevuti
#### Risultato: 
L'utente visualizza le statistiche degli ordini ricevuti per mese/anno e l’ammontare
delle vendite
#### Eccezioni: /

# Collaboratori
- ## [Giordano Guidi](https://github.com/GiordanoGuidi)
- ## [Gioacchino Argo](https://github.com/GioacchinoArgo)
- ## [Francesco Pasquinoni](https://github.com/PasquiFra)
- ## [Santiago Galvan Colorado](https://github.com/SantiGalvan)
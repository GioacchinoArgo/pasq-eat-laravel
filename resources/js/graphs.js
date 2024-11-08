import getOrdersByDate from './utils.js';

const dishLabels = dishes.map(dish => dish.name);

const dates = [
    "01/2024",
    "02/2024",
    "03/2024",
    "04/2024",
    "05/2024",
    "06/2024",
    "07/2024",
    "08/2024"
]

const result = getOrdersByDate(orders, dates);

// Oggetto per raccogliere i totali
const totals = {};

// Somma i prezzi per le date uguali
result.forEach(item => {
    const date = item.date;
    const price = parseFloat(item.price);

    if (!totals[date]) {
        totals[date] = 0;
    }
    totals[date] += price;
});

// Trasforma l'oggetto in un array
const dataTest = Object.keys(totals).map(date => {
    return { date: date, total: totals[date].toFixed(2) };
});

// Funzione che genera i charts
const printCharts = () => {

    // Funzione che crea il primo grafico, ordini-date
    renderOrdersChart();

    // Funzione che crea il secondo grafico con i piatti
    renderDishesChart();

}

// Funzione che crea il primo grafico, ordini-date
const renderOrdersChart = () => {

    const data = {
        labels: dataTest.map(item => item.date),
        datasets: [{
            data: dataTest.map(item => item.total),
            tension: .5,
            borderColor: '#2885ac',
            backgroundColor: '#2885acae',
            fill: true,
            pointBorderWidth: 5,
        }]
    }

    const options = {
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

    new Chart('ordersChart', { type: 'line', data, options })
}

// Funzione che crea il secondo grafico con i piatti
const renderDishesChart = () => {

    const data = {
        labels: dishLabels,
        datasets: [{
            data: dishLabels.map((dish, i) => dishCounts[dishLabels[i]]),
            tension: .5,
            borderColor: ['#2885ac', '#023047', '#f7e1d7', '#ffb703', '#f4a261', '#adc178', '#6c584c', '#9d0208'],
            backgroundColor: ['#2885acae', '#023047ae', '#f7e1d7ae', '#ffb703ae', '#f4a261ae', '#adc178ae', '#6c584cae', '#9d0208ae'],
            fill: true,
            pointBorderWidth: 5,
            hoverOffset: 4,
        }]
    }

    const options = {
        plugins: {
            legend: { position: 'left' }
        }
    }

    new Chart('dishesChart', { type: 'doughnut', data, options })
}

printCharts();
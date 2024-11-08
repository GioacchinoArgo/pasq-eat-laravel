const formattedDate = (dateToFormatted) => {
    const date = new Date(dateToFormatted);

    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();

    const italianDate = `${month}/${year}`;

    return italianDate;
}

const getOrdersByDate = (items, dates) => {
    const ordiniDatati = [];
    for (let i = 0; i < items.length; i++) {
        const dataFormattata = formattedDate(items[i].created_at);
        if (dates.includes(dataFormattata)) {
            const data = {
                date: dataFormattata,
                price: items[i].total
            }
            ordiniDatati.push(data);
        }
    }
    return ordiniDatati;
}

export default getOrdersByDate
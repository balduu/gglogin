const date = new Date();

const RenderCal = () => {

    date.setDate(1);
    const monthDays = document.querySelector(".days")
    const lastDay = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();

    //console.log(lastDay);
    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
    const firstDayIndex = date.getDay();
    const lastDayIndex = new Date(date.getFullYear(), date.getMonth()+1, 0).getDay();
    const nextDays = 7 - lastDayIndex -1;
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    console.log(month);
    console.log(year);
    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    //document.getElementsByClassName('date').innerHTML = date;
    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    document.querySelector(".date p").innerHTML = "Today " + new Date().toDateString();

    let days = "";
    for(let x = firstDayIndex; x > 0; x--) {
        days += `<div class = "prev-date" onclick="when(${prevLastDay - x +1}, ${month - 1}, ${year})">${prevLastDay - x +1}</div>`;
    }
    for(let i = 1; i <= lastDay; i++) {
        if(i === new Date().getDate() && date.getMonth() === new Date().getMonth()
            && date.getFullYear === new Date().getFullYear) {
            days += `<div class = "today" onclick="when(${i}, ${month}, ${year})">${i}</div>`;
        }
        else {
            days += `<div onclick="when(${i}, ${month}, ${year})">${i}</div>`;
        }
    }
    for(let y = 1; y <= nextDays; y++) {
        days += `<div class = "next-date" onclick="when(${y}, ${month + 1}, ${year})">${y}</div>`;
        monthDays.innerHTML = days;
    }
}


document.querySelector('.prev').addEventListener('click', () => {
    date.setMonth(date.getMonth() - 1);
    RenderCal();
})

document.querySelector('.next').addEventListener('click', () => {
    date.setMonth(date.getMonth() + 1);
    RenderCal();
})

RenderCal();

const when = (d, m, y) => {
    //const pickedDays = d + my.getMonth + my.getFullYear;
    alert(m);
}

function showMenu() {
    var menu = document.querySelector("div.menu-profile");
    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "flex";
    } else {
        menu.style.display = "none";
    }
}

let label = monthlyPurchaseData.map((item) => {
    return `${item["year"]}-${item["month"]}`;
});

let purchase = monthlyPurchaseData.map((item) => {
    return item["total_price"];
});

const chart = new Chart(document.getElementById("chart").getContext("2d"), {
    type: "line",
    data: {
        labels: label,
        datasets: [
            {
                label: "Monthly Sales Course",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 2,
                pointBackgroundColor: "rgba(75, 192, 192, 1)",
                pointRadius: 4,
                data: purchase,
            },
        ],
    },
});

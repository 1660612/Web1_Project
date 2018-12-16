<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/10/2018
 * Time: 12:09 AM
 */
?>
<canvas id="bar-chart" width="800" height="450"></canvas>
<script>
    var startDate = new Date("2017-10-01"), endDate = new Date("2017-10-30");
    var arr = new Array(), dt = new Date(startDate);

    while (dt <= endDate) {
        arr.push(new Date(dt).toLocaleDateString());
        dt.setDate(dt.getDate() + 1);
    }
    console.log(arr);
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: arr,
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [3,32,32,11,33]
                }
            ]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Thống kê doanh thu (VND) trong từ ngày đền ngày'
            }
        }
    });
</script>
<script>
    document.getElementById("dashboard_link").setAttribute("style", "background-color: #b3c734;");

</script>

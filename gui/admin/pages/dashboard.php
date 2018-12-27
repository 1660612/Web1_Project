<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/10/2018
 * Time: 12:09 AM
 */
?>

<?php
$arr = array('11-01-2012', '01-01-2014', '01-01-2015', '09-02-2013', '01-01-2013');
function date_sort($a, $b) {
    return strtotime($a) - strtotime($b);
}
usort($arr, "date_sort");
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
            labels: [new Date('2018/12/18').toLocaleDateString(), new Date('2018/12/21').toLocaleDateString(), new Date('2018/12/22').toLocaleDateString(), new Date('2018/12/24').toLocaleDateString(), new Date('2018/12/25').toLocaleDateString()],
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: "#3e95cd",
                    data: [3,32,32,11,33]
                }
            ]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Thống kê doanh thu (VND) trong từ ngày đền ngày'
            },
            scales: {
                xAxes: [{
                    barPercentage: 1,
                    categoryPercentage: 1,

                }]
            }
        }
    });
</script>
<script>
    $(".active").removeClass("active");
    $("#dashboard_link").addClass("active");
</script>

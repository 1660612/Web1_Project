<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/10/2018
 * Time: 12:09 AM
 */
?>

<?php
    $arr = array();
    $data = array();
    $invoices = (new InvoiceBUS())->GetAll();
    foreach ($invoices as $invoice)
    {
        $arr[] = $invoice->created_date;
        $data[] = $invoice->total_price;
    }
?>
<canvas id="bar-chart" width="800" height="450"></canvas>
<script>
    var arr = new Array();
    arr = <?php echo json_encode($arr); ?>;
    var data1 = new Array();
    data1 = <?php echo json_encode($data); ?>;
    var date_sort_asc = function (date1, date2) {
        if (date1 > date2) return 1;
        if (date1 < date2) return -1;
        return 0;
    };
    arr = arr.sort(date_sort_asc);

    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: arr,
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: "#3e95cd",
                    data: data1,
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
    $(".active").removeClass("active");
    $("#dashboard_link").addClass("active");
</script>

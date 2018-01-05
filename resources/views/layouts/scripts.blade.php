@if (Auth::user() && Request::segment(2) === 'statistics')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // Bar chart
    var barData = {
        labels: [@foreach ($beers as $beer)"{{ $beer['title'] }}",@endforeach],
        datasets: [
            {
                label: "Pints Sold",
                fillColor: "#C6C1BB",
                data: [@foreach ($beers as $beer)"{{ $beer['pints_sold'] }}",@endforeach]
            }
        ],
        multiTooltipTemplate: "<%=datasetLabel%> : <%= value %>"

    };
    var bar = document.getElementById("bar").getContext("2d");
    new Chart(bar, {
        type: 'bar',
        data: barData,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            multiTooltipTemplate: "<%=datasetLabel%> : <%=value%>"
        }
    });
</script>
@endif

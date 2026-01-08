"use strict";
$(document).ready(function () {

function monthWiseChart(startDate, endDate) {
    $.ajax({
        url: siteUrl+'/get-month-wise-data',
        method: 'GET',
        data: {startDate:startDate, endDate:endDate},
        success: function(response) {
            if(response.success == true) {
                var columnCtx = document.getElementById("sales_chart"),
                columnConfig = {
                    colors: ["#6a6ac1", "#5CB85C"],
                    series: [
                    {
                        name: "Total Leads",
                        type: "column",
                        data: response.leads,
                    },
                    {
                        name: "Converted Leads",
                        type: "column",
                        data: response.converted,
                    },
                    ],
                    chart: {
                    type: "bar",
                    fontFamily: "Poppins, sans-serif",
                    height: 350,
                    toolbar: { show: false },
                    },
                    plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "60%",
                        endingShape: "rounded",
                        dataLabels: {
                        position: 'top', // top, center, bottom
                        },
                    },
                    },
                    dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val ;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                    },
                    stroke: { show: true, width: 2, colors: ["transparent"] },
                    xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    },
                    yaxis: { title: { text: "" } },
                    fill: { opacity: 1 },
                    tooltip: {
                    y: {
                        formatter: function (val) {
                        return  + val;
                        },
                    },
                    },
                };
                var columnChart = new ApexCharts(columnCtx, columnConfig);
                columnChart.render();
            }
        }
    });
}
if ($("#sales_chart").length > 0) {
    // Date is in M/D/YYYY format
    var dateRange = $('.dashboardDateRange').val();
    var dates = dateRange.split(' - ');

    // Get the start and end dates
    var startDate = dates[0];
    var endDate = dates[1];
    monthWiseChart(startDate, endDate);
}

function bookingChart(startDate, endDate) {
    $.ajax({
        url:siteUrl+'/get-booking-chart-data',
        method:'GET',
        data: {startDate:startDate, endDate:endDate},
        success: function(response) {
            if(response.success == true) {
                var columnCtx = document.getElementById("booking_chart"),
                columnConfig = {
                  colors: ["#6a6ac1"],
                  series: [
                    {
                      name: "Bookings",
                      type: "column",
                      data: response.data,
                    }
                  ],
                  chart: {
                    type: "bar",
                    fontFamily: "Poppins, sans-serif",
                    height: 300,
                    toolbar: { show: false },
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: "50%",
                      endingShape: "rounded",
                      dataLabels: {
                        position: 'top', // top, center, bottom
                      },
                    },
                  },
                  dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                      return val ;
                    },
                    offsetY: -20,
                    style: {
                      fontSize: '12px',
                      colors: ["#304758"]
                    }
                  },
                  stroke: { show: true, width: 2, colors: ["transparent"] },
                  xaxis: {
                    categories: [
                      "Jan",
                      "Feb",
                      "Mar",
                      "Apr",
                      "May",
                      "Jun",
                      "Jul",
                      "Aug",
                      "Sep",
                      "Oct",
                      "Nov",
                      "Dec",
                    ],
                  },
                  yaxis: { title: { text: "" } },
                  fill: { opacity: 1 },
                  tooltip: {
                    y: {
                      formatter: function (val) {
                        return  + val;
                      },
                    },
                  },
                };
                var columnChart = new ApexCharts(columnCtx, columnConfig);
                columnChart.render();
            }
        }
    });
}
if ($("#booking_chart").length > 0) {
    // Date is in M/D/YYYY format
    var dateRange = $('.dashboardDateRange').val();
    var dates = dateRange.split(' - ');

    // Get the start and end dates
    var startDate = dates[0];
    var endDate = dates[1];
    bookingChart(startDate, endDate);
}

function revenueChart(startDate, endDate)
{
    $.ajax({
        url: siteUrl+"/get-revenue-profit-data",
        method: 'GET',
        data: {startDate:startDate, endDate:endDate},
        success: function(response) {
            if(response.success == true) {
                var columnCtx = document.getElementById("revenue_chart"),
                columnConfig = {
                  colors: ["#6a6ac1", "#5CB85C"],
                  series: [
                    {
                      name: "Total Revnue",
                      type: "column",
                      data: response.revenue,
                    },
                    {
                      name: "Total Profit",
                      type: "column",
                      data: response.profit,
                    },
                  ],
                  chart: {
                    type: "bar",
                    fontFamily: "Poppins, sans-serif",
                    height: 350,
                    toolbar: { show: false },
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: "50%",
                      endingShape: "rounded",
                      dataLabels: {
                        position: 'top', // top, center, bottom
                      },
                    },
                  },
                  dataLabels: {
                    enabled: true,
                        formatter: function (val) {
                            return formatNumber(val);
                        },
                    offsetY: -20,
                    style: {
                      fontSize: '12px',
                      colors: ["#304758"]
                    }
                  },
                  stroke: { show: true, width: 2, colors: ["transparent"] },
                  xaxis: {
                    categories: [
                      "Jan",
                      "Feb",
                      "Mar",
                      "Apr",
                      "May",
                      "Jun",
                      "Jul",
                      "Aug",
                      "Sep",
                      "Oct",
                      "Nov",
                      "Dec",
                    ],
                  },
                  yaxis: { title: { text: "" } },
                  fill: { opacity: 1 },
                  tooltip: {
                    y: {
                        formatter: function (val) {
                            return formatNumber(val) + " Lakh";
                        },
                    },
                  },
                };

                function formatNumber(value) {
                    if (value >= 10000000) {
                        return (value / 10000000).toFixed(1) + " C";
                    } else if (value >= 100000) {
                        return (value / 100000).toFixed(1) + " L";
                    } else if (value >= 1000) {
                        return (value / 1000).toFixed(1) + " K";
                    } else {
                        return value.toFixed(1);
                    }
                }

              var columnChart = new ApexCharts(columnCtx, columnConfig);
              columnChart.render();
            }
        }
    })
}
if ($("#revenue_chart").length > 0) {
    // Date is in M/D/YYYY format
    var dateRange = $('.dashboardDateRange').val();
    var dates = dateRange.split(' - ');

    // Get the start and end dates
    var startDate = dates[0];
    var endDate = dates[1];
    revenueChart(startDate, endDate);
}

function leadSourcesPie(startDate, endDate) {
    $.ajax({
        url: siteUrl+"/get-sources-chart-data",
        method: "GET",
        data: {startDate:startDate, endDate:endDate},
        success: function (response) {
            $("#leadpiechart").html('');
            if(response.success == true) {
                if(response.series.length > 0) {
                    var options = {
                        series: response.series,
                        chart: { width: 400, type: "pie" },
                        legend: { position: "bottom" },
                        labels: response.labels,
                        responsive: [
                        {
                            breakpoint: 480,
                            options: {
                            chart: { width: 275 },
                            legend: { position: "bottom" },
                            },
                        },
                        ],
                    };

                    // Create a new chart
                    var chart = new ApexCharts(
                        document.querySelector("#leadpiechart"),
                        options
                    );

                    // Render the chart
                    chart.render();
                } else {
                    $("#leadpiechart").html('No Data Found');
                }
            }
            },
        error: function (error) {
        console.error("Error fetching chart data:", error);
        },
    });
}
if ($("#leadpiechart").length > 0) {
    // Date is in M/D/YYYY format
    var dateRange = $('.dashboardDateRange').val();
    var dates = dateRange.split(' - ');

    // Get the start and end dates
    var startDate = dates[0];
    var endDate = dates[1];
    leadSourcesPie(startDate, endDate);
}

//On DateRange Filtering
$('.dashboardDateRange').on('change', function() {
    // Date is in M/D/YYYY format
    var dateRange = $(this).val();
    var dates = dateRange.split(' - ');

    // Get the start and end dates
    var startDate = dates[0];
    var endDate = dates[1];

    if(startDate && endDate) {
        $.ajax({
            url: siteUrl+'/dashboard',
            method: 'GET',
            data: {startDate:startDate, endDate:endDate},
            success: function(response) {
                $('.dashboard_data').html('');
                if(response.success == true) {
                    revenueChart(startDate, endDate);
                    bookingChart(startDate, endDate);
                    monthWiseChart(startDate, endDate);
                    leadSourcesPie(startDate, endDate);
                    $('.dashboard_data').html(response.html);
                } else {
                    $('.dashboard_data').html('No Data Found');
                }
            }
        })
    }
});
});

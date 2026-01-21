/**
* Theme: Adminox - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Component: Logistics app
*/

//
// Most Leads Chart
//
var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];

var options = {
    chart: {
        height: 257,
        type: 'donut',
    },
    legend: {
        show: false
    },
    stroke: {
        width: 0
    },
    plotOptions: {
        pie: {
            donut: {
                size: '75%',
                labels: {
                    show: true,
                    total: {
                        showAlways: true,
                        show: true
                    }
                }
            }
        }
    },
    series: [159, 148, 45],
    labels: ["Male", "Female", "Child"],
    colors: colors,
    dataLabels: {
        enabled: false
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            }
        }
    }]
}

var chart = new ApexCharts(
    document.querySelector("#prjects-status"),
    options
);

chart.render();

// 
var linechartcustomerColors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];

var options = {
    series: [{
        name: 'Number of Deliver',
        type: 'bar',
        data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67]
    }, {
        name: 'Revenue',
        type: 'area',
        data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57]
    }],
    chart: {
        height: 374,
        type: 'line',
        toolbar: {
            show: false,
        }
    },
    stroke: {
        curve: 'smooth',
        dashArray: [0, 3, 0],
        width: [0, 1, 0],
    },
    fill: {
        opacity: [1, 0.1, 1]
    },
    markers: {
        size: [0, 4, 0],
        strokeWidth: 2,
        hover: {
            size: 4,
        }
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        axisTicks: {
            show: false
        },
        axisBorder: {
            show: false
        }
    },
    grid: {
        show: true,
        xaxis: {
            lines: {
                show: true,
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: -2,
            bottom: 15,
            left: 10
        },
    },
    legend: {
        show: true,
        horizontalAlign: 'center',
        offsetX: 0,
        offsetY: -5,
        markers: {
            width: 9,
            height: 9,
            radius: 6,
        },
        itemMargin: {
            horizontal: 10,
            vertical: 0
        },
    },
    plotOptions: {
        bar: {
            columnWidth: '30%',
            barHeight: '70%'
        }
    },
    colors: linechartcustomerColors,
    tooltip: {
        shared: true,
        y: [{
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0);
                }
                return y;

            }
        }, {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return "$" + y.toFixed(2) + "k";
                }
                return y;

            }
        }, {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0);
                }
                return y;

            }
        }]
    }
};
var chart = new ApexCharts(document.querySelector("#projects-overview-chart"), options);
chart.render();

// 


// map


document.getElementById("sales-by-locations").innerHTML = "";
worldemapmarkers = "";
worldemapmarkers = new jsVectorMap({
    map: "world_merc",
    selector: "#sales-by-locations",
    zoomOnScroll: true,
    zoomButtons: true,
    selectedMarkers: [0, 5],
    regionStyle: {
        // initial: {
        //     stroke: "#9ca3af",
        // 	strokeWidth: 0.25,
        // 	fill: '#9ca3af69',
        // 	fillOpacity: 1,
        // },
    },
    markersSelectable: true,
    markers: [{
        name: "Palestine",
        coords: [31.9474, 35.2272],
    },
    {
        name: "Russia",
        coords: [61.524, 105.3188],
    },
    {
        name: "Canada",
        coords: [56.1304, -106.3468],
    },
    {
        name: "Greenland",
        coords: [71.7069, -42.6043],
    },
    ],
    // markerStyle: {
    // 	initial: { fill: "#9ca3af" },
    // 	selected: { fill: "#9ca3af" }
    // },
    labels: {
        markers: {
            render: function (marker) {
                return marker.name;
            },
        },
    },
});

// Fleet chart
var colors = ["#727cf5", "#6c757d", "#0acf97", "#fa5c7c", "#e3eaef"];

var options = {
    chart: {
        height: 320,
        type: 'donut',
    },
    plotOptions: {
        pie: {
            startAngle: -135,
            endAngle: 135
        }
    },

    series: [44, 55, 41, 17, 15],
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        verticalAlign: 'middle',
        floating: false,
        fontSize: '14px',
        offsetX: 0,
        offsetY: 7
    },
    labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
    colors: colors,
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                height: 240
            },
            legend: {
                show: false
            },
        }
    }],
    fill: {
        type: 'gradient'
    }
}

var chart = new ApexCharts(
    document.querySelector("#fleet-status"),
    options
);

chart.render();
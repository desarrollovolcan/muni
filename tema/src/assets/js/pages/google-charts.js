
/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Google chart init js
*/

! function($) {
    "use strict";

    var GoogleChart = function() {
        this.$body = $("body")
    };

    //creates line graph
    GoogleChart.prototype.createLineChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 340,
            curveType: 'function',
            fontSize: 12,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 300
            },
            backgroundColor: {
                fill: "transparent"
            },

            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                }
            },
            pointSize: 4,
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 13
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 14,
                    italic: false,
                    color: '#98a6ad'
                },
                gridlines: {
                    color: "transparent", count: 10
                },
                baselineColor: '#98a6ad',
                textStyle: {
                    color: "#98a6ad"
                },
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            lineWidth: 3,
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var line_chart = new google.visualization.LineChart(selector);
        line_chart.draw(google_chart_data, options);
        return line_chart;
    },
    //creates area graph
    GoogleChart.prototype.createAreaChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 340,
            curveType: 'function',
            fontSize: 14,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 300
            },
            backgroundColor: {
                fill: "transparent"
            },

            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                }
            },
            pointSize: 4,
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 14
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 14,
                    italic: false,
                    color: '#98a6ad'
                },
                gridarea: {
                    color: '#f5f5f5',
                    count: 10
                },
                gridlines: {
                    color: 'transparent'
                },
                baselineColor: '#98a6ad',
                textStyle: {
                    color: "#98a6ad"
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'end',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            lineWidth: 2,
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var area_chart = new google.visualization.AreaChart(selector);
        area_chart.draw(google_chart_data, options);
        return area_chart;
    },
    //creates Column graph
    GoogleChart.prototype.createColumnChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 400,
            backgroundColor: {
                fill: "transparent"
            },
            fontSize: 13,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 14
                }
            },
            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 14,
                    italic: false,
                    color: '#98a6ad'
                },
                gridlines:{
                    color: 'transparent',
                    count: 10
                },
                baselineColor: '#98a6ad',
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var column_chart = new google.visualization.ColumnChart(selector);
        column_chart.draw(google_chart_data, options);
        return column_chart;
    },
    //creates bar graph
    GoogleChart.prototype.createBarChart = function(selector, data, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 400,
            backgroundColor: {
                fill: "transparent"
            },
            fontSize: 14,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 14
                }
            },
            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                },
                baselineColor: '#98a6ad',
                gridlines:{
                    color: 'transparent',
                    count: 10
                },
            },
            vAxis: {
                textStyle: {
                    color: "#98a6ad"
                },
                
                
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var bar_chart = new google.visualization.BarChart(selector);
        bar_chart.draw(google_chart_data, options);
        return bar_chart;
    },
    //creates Column Stacked
    GoogleChart.prototype.createColumnStackChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 400,
            backgroundColor: {
                fill: "transparent"
            },
            fontSize: 13,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            isStacked: true,
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 14
                }
            },
            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                }
            },
            vAxis: {
                title: axislabel,
                textStyle: {
                    color: "#98a6ad"
                },
                titleTextStyle: {
                    fontSize: 14,
                    italic: false,
                    color: '#98a6ad',
                },
                gridlines:{
                    color: 'transparent',
                    count: 10
                },
                baselineColor: '#98a6ad',
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var stackedcolumn_chart = new google.visualization.ColumnChart(selector);
        stackedcolumn_chart.draw(google_chart_data, options);
        return stackedcolumn_chart;
    },
    //creates Bar Stacked
    GoogleChart.prototype.createBarStackChart = function(selector, data, colors) {
        var options = {
            fontName: 'Montserrat',
            height: 400,
            backgroundColor: {
                fill: "transparent"
            },
            fontSize: 13,
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            isStacked: true,
            tooltip: {
                textStyle: {
                    fontName: 'Montserrat',
                    fontSize: 14
                }
            },
            hAxis: {
                textStyle: {
                    color: "#98a6ad"
                },
                baselineColor: '#98a6ad',
                gridlines:{
                    color: 'transparent',
                    count: 10
                },
            },
            vAxis: {
                textStyle: {
                    color: "#98a6ad"
                },
            },
            
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };


        var google_chart_data = google.visualization.arrayToDataTable(data);
        var stackedbar_chart = new google.visualization.BarChart(selector);
        stackedbar_chart.draw(google_chart_data, options);
        return stackedbar_chart;
    },
    //creates pie chart
    GoogleChart.prototype.createPieChart = function(selector, data, colors, is3D, issliced) {
        var options = {
            fontName: 'Montserrat',
            fontSize: 13,
            height: 300,
            backgroundColor: {
                fill: "transparent"
            },
            chartArea: {
                left: 50,
                width: '90%',
                height: '90%'
            },
            legend: {
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };

        if(is3D) {
            options['is3D'] = true;
        }

        if(issliced) {
            options['is3D'] = true;
            options['pieSliceText'] = 'label';
            options['slices'] = {
                2: {offset: 0.15},
                5: {offset: 0.1}
            };
        }

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var pie_chart = new google.visualization.PieChart(selector);
        pie_chart.draw(google_chart_data, options);
        return pie_chart;
    },

    //creates donut chart
    GoogleChart.prototype.createDonutChart = function(selector, data, colors) {
        var options = {
            fontName: 'Montserrat',
            fontSize: 13,
            height: 300,
            backgroundColor: {
                fill: "transparent"
            },
            pieHole: 0.55,
            chartArea: {
                left: 50,
                width: '90%',
                height: '90%'
            },
            legend: {
                textStyle: {
                    fontSize: 13,
                    color: "#98a6ad"
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var pie_chart = new google.visualization.PieChart(selector);
        pie_chart.draw(google_chart_data, options);
        return pie_chart;
    },
    //init
    GoogleChart.prototype.init = function () {
        var $this = this;

        //creating line chart
        var common_data = [
            ['Year', 'Sales', 'Expenses'],
            ['2010',  850,      120],
            ['2011',  745,      200],
            ['2012',  852,      180],
            ['2013',  1000,      400],
            ['2014',  1170,      460],
            ['2015',  660,       1120],
            ['2016',  1030,      540]
        ];
        $this.createLineChart($('#line-chart')[0], common_data, 'Sales and Expenses', ['#297ef6', '#e52b4c']);


        //creating area chart using same data
        $this.createAreaChart($('#area-chart')[0], common_data, 'Sales and Expenses', ['#297ef6', '#e52b4c']);


        //creating column chart
        var column_data = [
            ['Year', 'Desktop', 'Tablets', 'Mobiles'],
            ['2010',  850,      120, 200],
            ['2011',  745,      200, 562],
            ['2012',  852,      180, 521],
            ['2013',  1000,      400, 652],
            ['2014',  1170,      460, 200],
            ['2015',  660,       1120, 562],
            ['2016',  1030,      540, 852]
        ];
        $this.createColumnChart($('#column-chart')[0], column_data, 'Sales and Expenses', ['#297ef6', '#e52b4c', '#32c861']);


        //creating bar chart
        var bar_data = [
            ['Year', 'Sales', 'Expenses'],
            ['2004',  1000,      400],
            ['2005',  1170,      460],
            ['2006',  660,       1120],
            ['2007',  1030,      540]
        ];
        $this.createBarChart($('#bar-chart')[0], bar_data, ['#297ef6', '#32c861']);


        //creating columns tacked chart
        var column_stacked_data = [
            ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General', { role: 'annotation' } ],
            ['2000', 20, 30, 35, 40, ''],
            ['2005', 14, 20, 25, 30, ''],
            ['2010', 10, 24, 20, 32, ''],
            ['2015', 15, 25, 30, 35, ''],
            ['2020', 16, 22, 23, 30, ''],
            ['2025', 12, 26, 20, 40, ''],
            ['2030', 28, 19, 29, 30, '']
        ];
        $this.createColumnStackChart($('#column-stacked-chart')[0], column_stacked_data, 'Sales and Expenses', [ '#32c861','#297ef6', '#e52b4c', '#ffa91c']);


        //creating bar tacked chart
        var bar_stacked_data = [
            ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General', { role: 'annotation' } ],
            ['2000', 20, 30, 35, 40, ''],
            ['2005', 14, 20, 25, 30, ''],
            ['2010', 10, 24, 20, 32, ''],
            ['2015', 15, 25, 30, 35, ''],
            ['2020', 16, 22, 23, 30, ''],
            ['2025', 12, 26, 20, 40, ''],
            ['2030', 28, 19, 29, 30, '']
        ];
        $this.createBarStackChart($('#bar-stacked-chart')[0], bar_stacked_data, ['#5553ce','#297ef6', '#e52b4c', '#ffa91c']);


        //creating pie chart
        var pie_data = [
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ];
        $this.createPieChart($('#pie-chart')[0], pie_data, ['#5553ce','#297ef6', '#e52b4c', '#ffa91c', '#32c861'], false, false);


        //creating donut chart
        $this.createDonutChart($('#donut-chart')[0], pie_data, ['#5553ce','#297ef6', '#e52b4c', '#ffa91c', '#32c861']);

        //creating 3d pie chart
        $this.createPieChart($('#pie-3d-chart')[0], pie_data, ['#5553ce','#297ef6', '#e52b4c', '#ffa91c', '#32c861'], true, false);

        //creating Sliced pie chart
        var sliced_Data = [
            ['Language', 'Speakers (in millions)'],
            ['Assamese', 13],
            ['Bengali', 83],
            ['Gujarati', 46],
            ['Hindi', 90],
            ['Kannada', 38],
            ['Malayalam', 33]
        ];
        $this.createPieChart($('#3d-exploded-chart')[0], sliced_Data, ['#5553ce','#297ef6', '#e52b4c', '#ffa91c', '#32c861',"#353d4a"], true, true);

        //on window resize - redrawing all charts
        $(window).on('resize', function() {
            $this.createLineChart($('#line-chart')[0], common_data, 'Sales and Expenses', ['#4bd396', '#f5707a']);
            $this.createAreaChart($('#area-chart')[0], common_data, 'Sales and Expenses', ['#4bd396', '#f5707a']);
            $this.createColumnChart($('#column-chart')[0], column_data, 'Sales and Expenses', ['#4bd396', '#f5707a', '#3ac9d6']);
            $this.createBarChart($('#bar-chart')[0], bar_data, ['#4bd396', '#f5707a']);
            $this.createColumnStackChart($('#column-stacked-chart')[0], column_stacked_data, 'Sales and Expenses', ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5', '#3ac9d6']);
            $this.createBarStackChart($('#bar-stacked-chart')[0], bar_stacked_data, ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5', '#3ac9d6']);
            $this.createPieChart($('#pie-chart')[0], pie_data, ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5'], false, false);
            $this.createDonutChart($('#donut-chart')[0], pie_data, ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5']);
            $this.createPieChart($('#pie-3d-chart')[0], pie_data, ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5'], true, false);
            $this.createPieChart($('#3d-exploded-chart')[0], sliced_Data, ['#188ae2', '#4bd396', '#f9c851', '#f5707a', '#6b5fb5'], true, true);
        });
    },
    //init GoogleChart
    $.GoogleChart = new GoogleChart, $.GoogleChart.Constructor = GoogleChart
}(window.jQuery),

//initializing GoogleChart
function($) {
    "use strict";
    //loading visualization lib - don't forget to include this
    google.load("visualization", "1", {packages:["corechart"]});
    //after finished load, calling init method
    google.setOnLoadCallback(function() {$.GoogleChart.init();});
}(window.jQuery);

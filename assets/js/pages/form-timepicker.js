/**
 * Theme: Adminox - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Time Picker
 */

$('#timepicker').timepicker({
    "showSeconds": true,
    icons: {
        up: 'ti ti-chevron-up',
        down: 'ti ti-chevron-down'
    },
    appendWidgetTo: "#timepicker-input-group1"
});

$('#timepicker2').timepicker({
    "showSeconds": true,
    showMeridian: false,
    icons: {
        up: 'ti ti-chevron-up',
        down: 'ti ti-chevron-down'
    },
    appendWidgetTo: "#timepicker-input-group2"
});

$('#timepicker3').timepicker({
    "showSeconds": true,
    minuteStep: 15,
    icons: {
        up: 'ti ti-chevron-up',
        down: 'ti ti-chevron-down'
    },
    appendWidgetTo: "#timepicker-input-group3"
});
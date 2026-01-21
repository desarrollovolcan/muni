
/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Taskboard init js
*/

$(document).ready(function () {

    $("#upcoming, #inprogress, #completed").sortable({
        connectWith: ".taskList",
        placeholder: 'task-placeholder',
        forcePlaceholderSize: true,
        update: function (event, ui) {
  
            var todo = $("#todo").sortable("toArray");
            var inprogress = $("#inprogress").sortable("toArray");
            var completed = $("#completed").sortable("toArray");
        }
    }).disableSelection();
  
  });
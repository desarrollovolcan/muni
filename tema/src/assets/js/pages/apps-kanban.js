/**
* Theme: Adminox - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Component: Kanban App
*/


var tasks_list = [
    document.getElementById("kanbanboard"),
    document.getElementById("task-list-one"),
    document.getElementById("task-list-two"),
    document.getElementById("task-list-three"),
    document.getElementById("task-list-four"),
];
function noTaskImage() {
    Array.from(document.querySelectorAll("#kanbanboard .tasks-list")).forEach(function (item) {
        var taskBox = item.querySelectorAll(".tasks-box")
        if (taskBox.length > 0) {
            item.querySelector('.tasks').classList.remove("noTask");
        } else {
            item.querySelector('.tasks').classList.add("noTask");
        }
    });
}

drake = dragula(tasks_list).on('drag', function (el) {
    el.className = el.className.replace('ex-moved', '');
}).on('drop', function (el) {
    el.className += ' ex-moved';
}).on('over', function (el, container) {
    container.className += ' ex-over';
}).on('out', function (el, container) {
    container.className = container.className.replace('ex-over', '');

    noTaskImage();
});

var scroll = autoScroll([
    document.querySelector("#kanbanboard"),
], {
    margin: 20,
    maxSpeed: 100,
    scrollWhenOutside: true,
    autoScroll: function () {
        return this.down && drake.dragging;
    }
});
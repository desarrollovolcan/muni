/*
Template Name: Adminox - Responsive Bootstrap 5 Admin Dashboard
Author: Coderthemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Quilljs init js
*/


// Bubble theme
var quill = new Quill('#bubble-editor', {
    theme: 'bubble'
});



// Dragula (Draggable Components)
class Dragula {

    initDragula() {

        document.querySelectorAll("[data-plugin=dragula]")

            .forEach(function (element) {

                const containersIds = JSON.parse(element.getAttribute('data-containers'));
                let containers = [];
                if (containersIds) {
                    for (let i = 0; i < containersIds.length; i++) {
                        containers.push(document.querySelectorAll("#" + containersIds[i])[0]);
                    }
                } else {
                    containers = [element];
                }

                // if handle provided
                const handleClass = element.getAttribute('data-handleclass');

                // init dragula
                if (handleClass) {
                    dragula(containers, {
                        moves: function (el, container, handle) {
                            return handle.classList.contains('handle');
                        }
                    });
                } else {
                    dragula(containers);
                }

            });

    }

    init() {
        this.initDragula();
    }
}

document.addEventListener('DOMContentLoaded', function (e) {
    new Dragula().init();
});


const buttons = ['addClassA', 'addClassB', 'addClassC'].map(id => document.getElementById(id));
const exampleElement = document.getElementById("exampleElement");

buttons.forEach((button, index) => {
    button.addEventListener("click", function () {
        exampleElement.classList.remove('tasks-condesed', 'tasks-nospace');
        exampleElement.classList.add(index === 0 ? 'active' : index === 1 ? 'tasks-condesed' : 'tasks-nospace');

        buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
    });
});

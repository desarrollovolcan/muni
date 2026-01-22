/**
 * Template Name: UBold - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Apps Calendar
 */

class CalendarSchedule {

    constructor() {
        this.body = document.body;
        this.modal = new bootstrap.Modal(document.getElementById('event-modal'), {backdrop: 'static'});
        this.calendar = document.getElementById('calendar');
        this.formEvent = document.getElementById('forms-event');
        this.btnNewEvent = document.querySelectorAll('.btn-new-event');
        this.btnDeleteEvent = document.getElementById('btn-delete-event');
        this.btnSaveEvent = document.getElementById('btn-save-event');
        this.modalTitle = document.getElementById('modal-title');
        this.calendarObj = null;
        this.selectedEvent = null;
        this.newEventData = null;
    }

    onEventClick(info) {
        this.formEvent?.reset();
        this.formEvent.classList.remove('was-validated');
        this.newEventData = null;
        this.btnDeleteEvent.style.display = "block";
        this.modalTitle.text = ('Edit Event');
        this.modal.show();
        this.selectedEvent = info.event;
        const titleInput = document.getElementById('event-title');
        if (titleInput) {
            titleInput.value = this.selectedEvent.title;
        }
        const categoryInput = document.getElementById('event-category');
        if (categoryInput) {
            if (this.formEvent?.dataset.submit === 'server') {
                categoryInput.value = this.selectedEvent.extendedProps?.tipo || categoryInput.value;
            } else {
                const {classNames} = this.selectedEvent;
                categoryInput.value = Array.isArray(classNames) ? classNames.join(' ') : classNames || '';
            }
        }
        const startInput = document.getElementById('event-start');
        if (startInput && this.selectedEvent.start) {
            startInput.value = this.formatDateTime(this.selectedEvent.start);
        }
        const endInput = document.getElementById('event-end');
        if (endInput && this.selectedEvent.end) {
            endInput.value = this.formatDateTime(this.selectedEvent.end);
        }
    }

    onSelect(info) {
        this.formEvent?.reset();
        this.formEvent?.classList.remove('was-validated');
        this.selectedEvent = null;
        this.newEventData = info;
        this.btnDeleteEvent.style.display = "none";
        this.modalTitle.text = ('Add New Event');
        this.modal.show();
        this.calendarObj.unselect();
        const startInput = document.getElementById('event-start');
        if (startInput && info?.date) {
            startInput.value = this.formatDateTime(info.date);
        }
        const endInput = document.getElementById('event-end');
        if (endInput && info?.date) {
            endInput.value = this.formatDateTime(info.date);
        }
    }

    formatDateTime(date) {
        const localDate = new Date(date);
        const year = localDate.getFullYear();
        const month = String(localDate.getMonth() + 1).padStart(2, '0');
        const day = String(localDate.getDate()).padStart(2, '0');
        const hours = String(localDate.getHours()).padStart(2, '0');
        const minutes = String(localDate.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    init() {
        /*  Initialize the calendar  */
        const today = new Date();
        const self = this;
        const externalEventContainerEl = document.getElementById('external-events');

        new FullCalendar.Draggable(externalEventContainerEl, {
            itemSelector: '.external-event',
            eventData: function (eventEl) {
                return {
                    title: eventEl.innerText,
                    classNames: eventEl.getAttribute('data-class'),
                    extendedProps: {
                        tipo: eventEl.getAttribute('data-tipo')
                    }
                };
            }
        });

        const defaultEvents = [
            {
                title: 'Design Review',
                start: today,
                end: today,
                className: 'bg-primary-subtle text-primary',
                extendedProps: {
                    tipo: 'Reunión'
                }
            },
            {
                title: 'Marketing Strategy',
                start: new Date(Date.now() + 16000000),
                end: new Date(Date.now() + 20000000),
                className: 'bg-secondary-subtle text-secondary',
                extendedProps: {
                    tipo: 'Operativo'
                }
            },
            {
                title: 'Sales Demo',
                start: new Date(Date.now() + 40000000),
                end: new Date(Date.now() + 80000000),
                className: 'bg-success-subtle text-success',
                extendedProps: {
                    tipo: 'Ceremonia'
                }
            },
            {
                title: 'Deadline Submission',
                start: new Date(Date.now() + 120000000),
                end: new Date(Date.now() + 180000000),
                className: 'bg-danger-subtle text-danger',
                extendedProps: {
                    tipo: 'Operativo'
                }
            },
            {
                title: 'Training Session',
                start: new Date(Date.now() + 250000000),
                end: new Date(Date.now() + 290000000),
                className: 'bg-info-subtle text-info',
                extendedProps: {
                    tipo: 'Reunión'
                }
            },
            {
                title: 'Budget Review',
                start: new Date(Date.now() + 400000000),
                end: new Date(Date.now() + 450000000),
                className: 'bg-warning-subtle text-warning',
                extendedProps: {
                    tipo: 'Actividad cultural'
                }
            },
            {
                title: 'Board Meeting',
                start: new Date(Date.now() + 600000000),
                end: new Date(Date.now() + 620000000),
                className: 'bg-dark-subtle text-dark',
                extendedProps: {
                    tipo: 'Reunión'
                }
            }
        ];

        // cal - init
        self.calendarObj = new FullCalendar.Calendar(self.calendar, {

            plugins: [],
            slotDuration: '00:30:00', /* If we want to split day time each 15minutes */
            slotMinTime: '07:00:00',
            slotMaxTime: '19:00:00',
            themeSystem: 'bootstrap',
            bootstrapFontAwesome: false,
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day',
                list: 'List',
                prev: 'Prev',
                next: 'Next'
            },
            initialView: 'dayGridMonth',
            handleWindowResize: true,
            height: window.innerHeight - 240,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialEvents: defaultEvents,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            // dayMaxEventRows: false, // allow "more" link when too many events
            selectable: true,
            dateClick: function (info) {
                self.onSelect(info);
            },
            eventClick: function (info) {
                self.onEventClick(info);
            }
        });

        self.calendarObj.render();

        // on new event button click
        self.btnNewEvent.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                self.onSelect({
                    date: new Date(),
                    allDay: true
                });
            });
        });

        // save event
        self.formEvent?.addEventListener('submit', function (e) {
            if (self.formEvent?.dataset.submit === 'server') {
                return;
            }
            e.preventDefault();
            const form = self.formEvent;

            // validation
            if (form.checkValidity()) {
                if (self.selectedEvent) {
                    self.selectedEvent.setProp('title', document.getElementById('event-title').value);
                    self.selectedEvent.setProp('classNames', document.getElementById('event-category').value)

                } else {
                    const eventData = {
                        title: document.getElementById('event-title').value,
                        start: self.newEventData.date,
                        allDay: self.newEventData.allDay,
                        className: document.getElementById('event-category').value
                    };
                    self.calendarObj.addEvent(eventData);
                }
                self.modal.hide();
            } else {
                e.stopPropagation();
                form.classList.add('was-validated');
            }
        });

        // delete event
        self.btnDeleteEvent.addEventListener('click', function (e) {
            if (self.selectedEvent) {
                self.selectedEvent.remove();
                self.selectedEvent = null;
                self.modal.hide();
            }
        });
    }

}

document.addEventListener('DOMContentLoaded', function (e) {
    new CalendarSchedule().init();
});

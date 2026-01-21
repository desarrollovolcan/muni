
/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Toastr init js
*/

$(function () {
    var i = -1;
    var toastCount = 0;
    var $toastlast;

    var getMessage = function () {
        var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
            'Are you the six fingered man?',
            'Inconceivable!',
            'I do not think that means what you think it means.',
            'Have fun storming the castle!'
        ];
        i++;
        if (i === msgs.length) {
            i = 0;
        }

        return msgs[i];
    };

    var getMessageWithClearButton = function (msg) {
        msg = msg ? msg : 'Clear itself?';
        msg += '<br /><br /><button type="button" class="btn btn-secondary clear">Yes</button>';
        return msg;
    };

    $('#showtoast').click(function () {
        var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
        var msg = $('#message').val();
        var title = $('#title').val() || '';
        var $showDuration = $('#showDuration');
        var $hideDuration = $('#hideDuration');
        var $timeOut = $('#timeOut');
        var $extendedTimeOut = $('#extendedTimeOut');
        var $showEasing = $('#showEasing');
        var $hideEasing = $('#hideEasing');
        var $showMethod = $('#showMethod');
        var $hideMethod = $('#hideMethod');
        var toastIndex = toastCount++;
        var addClear = $('#addClear').prop('checked');

        toastr.options = {
            closeButton: $('#closeButton').prop('checked'),
            debug: $('#debugInfo').prop('checked'),
            newestOnTop: $('#newestOnTop').prop('checked'),
            progressBar: $('#progressBar').prop('checked'),
            positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
            preventDuplicates: $('#preventDuplicates').prop('checked'),
            onclick: null
        };

        if ($('#addBehaviorOnToastClick').prop('checked')) {
            toastr.options.onclick = function () {
                alert('You can perform some custom action after a toast goes away');
            };
        }

        if ($showDuration.val().length) {
            toastr.options.showDuration = $showDuration.val();
        }

        if ($hideDuration.val().length) {
            toastr.options.hideDuration = $hideDuration.val();
        }

        if ($timeOut.val().length) {
            toastr.options.timeOut = addClear ? 0 : $timeOut.val();
        }

        if ($extendedTimeOut.val().length) {
            toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();
        }

        if ($showEasing.val().length) {
            toastr.options.showEasing = $showEasing.val();
        }

        if ($hideEasing.val().length) {
            toastr.options.hideEasing = $hideEasing.val();
        }

        if ($showMethod.val().length) {
            toastr.options.showMethod = $showMethod.val();
        }

        if ($hideMethod.val().length) {
            toastr.options.hideMethod = $hideMethod.val();
        }

        if (addClear) {
            msg = getMessageWithClearButton(msg);
            toastr.options.tapToDismiss = false;
        }
        if (!msg) {
            msg = getMessage();
        }

        $('#toastrOptions').text('Command: toastr["'
                + shortCutFunction
                + '"]("'
                + msg
                + (title ? '", "' + title : '')
                + '")\n\ntoastr.options = '
                + JSON.stringify(toastr.options, null, 2)
        );

        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;

        if (typeof $toast === 'undefined') {
            return;
        }

        if ($toast.find('#okBtn').length) {
            $toast.delegate('#okBtn', 'click', function () {
                alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                $toast.remove();
            });
        }
        if ($toast.find('#surpriseBtn').length) {
            $toast.delegate('#surpriseBtn', 'click', function () {
                alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
            });
        }
        if ($toast.find('.clear').length) {
            $toast.delegate('.clear', 'click', function () {
                toastr.clear($toast, {force: true});
            });
        }
    });

    function getLastToast() {
        return $toastlast;
    }

    $('#clearlasttoast').click(function () {
        toastr.clear(getLastToast());
    });
    $('#cleartoasts').click(function () {
        toastr.clear();
    });
})



/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Toaster init js
*/

$("#toastr-one").click(function () {
    $.toast({
        heading: 'Heads up!',
        text: 'This alert needs your attention, but it is not super important.',
        position: 'top-right',
        loaderBg: '#3b98b5',
        icon: 'info',
        hideAfter: 3000,
        stack: 1
    });
});
$("#toastr-two").click(function () {
    $.toast({
        heading: 'Holy guacamole!',
        text: 'You should check in on some of those fields below.',
        position: 'top-right',
        loaderBg: '#da8609',
        icon: 'warning',
        hideAfter: 3000,
        stack: 1
    });
});
$("#toastr-three").click(function () {
    $.toast({
        heading: 'Well done!',
        text: 'You successfully read this important alert message.',
        position: 'top-right',
        loaderBg: '#5ba035',
        icon: 'success',
        hideAfter: 3000,
        stack: 1
    });
});
$("#toastr-four").click(function () {
    $.toast({
        heading: 'Oh snap!',
        text: 'Change a few things up and try submitting again.',
        position: 'top-right',
        loaderBg: '#bf441d',
        icon: 'error',
        hideAfter: 3000,
        stack: 1
    });
});

$("#toastr-five").click(function () {
    $.toast({
        heading: 'How to contribute?!',
        text: [
            'Fork the repository',
            'Improve/extend the functionality',
            'Create a pull request'
        ],
        position: 'top-right',
        loaderBg: '#1ea69a',
        hideAfter: 3000,
        stack: 1
    })
});

$("#toastr-six").click(function () {
    $.toast({
        heading: 'Can I add <em>icons</em>?',
        text: 'Yes! check this <a href="https://github.com/kamranahmedse/jquery-toast-plugin/commits/master">update</a>.',
        hideAfter: false,
        position: 'top-right',
        loaderBg: '#1ea69a',
        stack: 1
    })
});

$("#toastr-seven").click(function () {
    $.toast({
        text: 'Set the `hideAfter` property to false and the toast will become sticky.',
        hideAfter: false,
        position: 'top-right',
        loaderBg: '#1ea69a',
        stack: 1
    })
});

$("#toastr-eight").click(function () {
    $.toast({
        text: 'Set the `showHideTransition` property to fade|plain|slide to achieve different transitions',
        heading: 'Fade transition',
        showHideTransition: 'fade',
        position: 'top-right',
        loaderBg: '#1ea69a',
        hideAfter: 3000,
        stack: 1
    })
});

$("#toastr-nine").click(function () {
    $.toast({
        text: 'Set the `showHideTransition` property to fade|plain|slide to achieve different transitions',
        heading: 'Slide transition',
        showHideTransition: 'slide',
        position: 'top-right',
        loaderBg: '#1ea69a',
        hideAfter: 3000,
        stack: 1
    })
});

$("#toastr-ten").click(function () {
    $.toast({
        text: 'Set the `showHideTransition` property to fade|plain|slide to achieve different transitions',
        heading: 'Plain transition',
        showHideTransition: 'plain',
        position: 'top-right',
        loaderBg: '#1ea69a',
        hideAfter: 3000,
        stack: 1
    })
});

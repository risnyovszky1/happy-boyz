import flatpickr from "flatpickr";

flatpickr(document.querySelectorAll('input.date-time-picker'), {
    enableTime: true,
    time_24hr: true,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "d. m. Y H:i",
})
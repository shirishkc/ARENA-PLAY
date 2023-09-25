mobiscroll.setOptions({
    locale: mobiscroll.localeEn,             // Specify language like: locale: mobiscroll.localePl or omit setting to use default
    theme: 'ios',                            // Specify theme like: theme: 'ios' or omit setting to use default
    themeVariant: 'light'                    // More info about themeVariant: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-themeVariant
});
var min = '2023-09-23T00:00';
var max = '2025-03-23T00:00';
mobiscroll.datepicker('#demo-booking-datetime', {
    display: 'inline',                       // Specify display mode like: display: 'bottom' or omit setting to use default
    controls: ['calendar', 'timegrid'],      // More info about controls: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-controls
    min: min,                                // More info about min: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-min
    max: max,                                // More info about max: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-max
    minTime: '06:00',
    maxTime: '19:59',
    stepMinute: 60,
    width: null,                             // More info about width: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-width
    // onPageLoading: function (event, inst) {  // More info about onPageLoading: https://docs.mobiscroll.com/5-27-0/javascript/calendar#event-onPageLoading
    //     getDatetimes(event.firstDay, function callback(bookings) {
    //         inst.setOptions({
    //             labels: bookings.labels,     // More info about labels: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-labels
    //             invalid: bookings.invalid    // More info about invalid: https://docs.mobiscroll.com/5-27-0/javascript/calendar#opt-invalid
    //         });
    //     });
    // }
});
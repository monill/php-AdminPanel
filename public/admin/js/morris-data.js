// Dashboard 3 Morris-donuts
$.getJSON('api/os_usage', function (os_usage) {
    Morris.Donut({
        element: 'morris-os',
        data: os_usage,
        resize: true,
        colors: ['#99d683', '#13dafe', '#6164c1', '#ce2e0a', '#c90ab6']
    });
});

$.getJSON('api/browser', function (browser) {
    Morris.Donut({
        element: 'morris-browsers',
        data: browser,
        resize: true,
        colors: ['#99d683', '#13dafe', '#6164c1', '#ce2e0a', '#c90ab6']
    });
});

$.getJSON('api/countries', function (countries) {
    Morris.Donut({
        element: 'morris-countries',
        data: countries,
        resize: true,
        colors: ['#99d683', '#13dafe', '#6164c1', '#ce2e0a', '#c90ab6']
    });
});
// End of morris dunuts



// Morris bar chart
Morris.Bar({
    element: 'morris-bar-chart',
    data: [{
        y: 'Jan',
        a: 100,
        b: 90,
        c: 60
    }, {
        y: 'Fev',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Mar',
        a: 50,
        b: 40,
        c: 30
    }, {
        y: 'Abr',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Mai',
        a: 50,
        b: 40,
        c: 30
    }, {
        y: 'Jun',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Jul',
        a: 100,
        b: 90,
        c: 40
    }, {
        y: 'Ago',
        a: 100,
        b: 90,
        c: 40
    }, {
        y: 'Set',
        a: 100,
        b: 90,
        c: 40
    }, {
        y: 'Out',
        a: 100,
        b: 90,
        c: 40
    }, {
        y: 'Nov',
        a: 100,
        b: 90,
        c: 40
    }, {
        y: 'Dez',
        a: 100,
        b: 90,
        c: 40
    }],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['A', 'B', 'C'],
    barColors:['#b8edf0', '#b4c1d7', '#fcc9ba'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
});

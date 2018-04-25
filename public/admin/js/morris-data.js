// Dashboard 3 Morris-donuts
$.getJSON('api/os_usage', function (os_usage) {
    Morris.Donut({
        element: 'morris-os',
        data: os_usage,
        resize: true,
        colors: ['#CCFF00', '#FFCC00', '#FF6699', '#CC3300', '#6600FF', '#6600CC', '#66CCCC', '#66FF66', '#00CCFF', '#333333', '#993366', '#663300'],
	formatter: function (os_usage, data) { return os_usage + '%' }
    });
});

$.getJSON('api/browser', function (browser) {
    Morris.Donut({
        element: 'morris-browsers',
        data: browser,
        resize: true,
        colors: ['#CCFF00', '#FFCC00', '#FF6699', '#CC3300', '#6600FF', '#6600CC', '#66CCCC', '#66FF66', '#00CCFF', '#333333', '#993366', '#663300'],
	formatter: function (os_usage, data) { return os_usage + '%' }
    });
});

$.getJSON('api/countries', function (countries) {
    Morris.Donut({
        element: 'morris-countries',
        data: countries,
        resize: true,
        colors: ['#CCFF00', '#FFCC00', '#FF6699', '#CC3300', '#6600FF', '#6600CC', '#66CCCC', '#66FF66', '#00CCFF', '#333333', '#993366', '#663300'],
	formatter: function (countries, data) { return countries + '%' }
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

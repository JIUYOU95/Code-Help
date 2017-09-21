define(['bootstrap'], function () {
    util =  {
        show: function () {
            alert('JIUYOU')
        },
    }
    if (typeof define === "function" && define.amd) {
        define(['bootstrap'], function () {
            return util;
        });
    } else {
        window.util = util;
    }
});
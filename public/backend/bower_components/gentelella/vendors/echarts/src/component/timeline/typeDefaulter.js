define(function (require) {

    require('../../model/Component').registerSubTypeDefaulter('timeline', function () {
        // Only sliders now.
        return 'slider';
    });

});
define(function (require) {

    require('../../model/Component').registerSubTypeDefaulter('dataZoom', function (option) {
        // Default 'sliders' when no type specified.
        return 'slider';
    });

});
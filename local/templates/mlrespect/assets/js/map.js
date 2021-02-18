    if($('#map1').length > 0){
        ymaps.ready(function () {
        var myMap = new ymaps.Map('map1', {
                center: [$('#map1').data('coordx'), $('#map1').data('coordy')],
                zoom: 16,
                controls: []
            }, {
                searchControlProvider: 'yandex#search'
            }),
    
            myPlacemark = new ymaps.Placemark([$('#map1').data('coordx'), $('#map1').data('coordy')], {
                hintContent: 'Россия, ' + $('#map1').data('addr'),
                balloonContent: 'Россия, ' + $('#map1').data('addr')
            }, {
                iconLayout: 'default#image',
                balloonclose: true
            });
    
            myMap.geoObjects
            .add(myPlacemark)
    
        });
    }
    
    if($('#yandexmap').length > 0){
        ymaps.ready(init);

        function init() {
            
            var myGeoObjects = [];
            var last_x = '';
            var last_y = '';
            var center_x = '';
            var center_y = '';
            
            $('.yandexmaphelper').each(function (index, el){
                myGeoObjects[index] = new ymaps.GeoObject({
                    geometry: {
                        type: "Point",
                        iconColor: 'yellow',
                        coordinates: [$(el).data('coordx'), $(el).data('coordy')] },
                        properties: {
                            balloonContent: '<div class="cluster_title">'+$(el).data('name')+'</div><div class="cluster_address">'+$(el).data('addr')+'</div><div class="cluster_phone">'+$(el).data('phone')+'</div>'
                        }
                });
                last_x = $(el).data('coordx');
                last_y = $(el).data('coordy');
                center_x = $(el).data('coordcenterx');
                center_y = $(el).data('coordcentery');
            });
            
            
            
            var myMap = new ymaps.Map("yandexmap", {
                    center: [center_x, center_y],
                    zoom: 11
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                myGeoObject = new ymaps.GeoObject({}, {
                });
    
            
            
            var clusterer = new ymaps.Clusterer;
            clusterer.add(myGeoObjects);
    		myMap.geoObjects.options.set('preset', 'islands#redDotIcon');
    		clusterer.options.set('preset', 'islands#redClusterIcons');
            myMap.geoObjects.add(clusterer);
        }
    }
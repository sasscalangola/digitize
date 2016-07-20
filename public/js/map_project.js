/*
 * Created by David on 18/03/2016.
 * Updated: 03/07/2016
 */

var p_styles = [
    new ol.style.Style({
        stroke: new ol.style.Stroke({
            color: 'black',
            width: 5,
            lineDash:[7]
        })
    })
];
var p_geojsonObject =0;



var p_poligon=new ol.layer.Vector({

    source: new ol.source.Vector({

        url: '/geometry/get_project_json',
        format: new ol.format.GeoJSON({

            defaultDataProjection :'EPSG:3857',
            projection: 'EPSG:3857'

        })

    }),
    name: 'Project',
    style: p_styles
});


var p_mousePositionControl = new ol.control.MousePosition({
    coordinateFormat: ol.coordinate.toStringXY,  //toStringHDMS
    projection: 'EPSG:3857',  //4326
    // comment the following two lines to have the mouse position
    // be placed within the map.
    className: 'custom-mouse-position',
    target: document.getElementById('mouse-position-project'),
    undefinedHTML: '&nbsp;'
});

var p_view = new ol.View({
    zoom: 6,
    maxZoom:19,
    minZoom: 4,
    //extent: p_poligon.getSource().getExtent()   //Nao funciona porque o source nao esta ainda carregado por causa do ajax
    center: [15, -2]  //Valor aleatorio...sem valor nao funciona, depois actualiza com o source.on(change....)
});

var p_map = new ol.Map({
    layers: [
        new ol.layer.Tile({
            preload: Infinity,
            source: new ol.source.BingMaps({
                key: 'At4LG_GUfiXz_wezlE0vG6ZcrOZhoxPa2xK8nlLBlX1e4KbJGx5biSGRuph2RYmS',
                imagerySet: 'AerialWithLabels'
            })
        })
        ,p_poligon],
    target: 'map-project',
    controls:[p_mousePositionControl],
    view: p_view
});

p_poligon.getSource().on('change',function(e){
    if(p_poligon.getSource().getState() === 'ready') {
        p_map.getView().fit(p_poligon.getSource().getExtent(), p_map.getSize());

    }
});



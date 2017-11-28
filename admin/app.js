
var pwa_waterv = L.control({
    position: 'bottomright'
});

pwa_waterv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:pwa_water&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};
var pwa_water = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:pwa_water",
  styles:'pwa_water', 
  transparent: true, 
  format: 'image/png' 
});

$("#pwa_water").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(pwa_water)) {
      document.getElementById("pwa_water").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(pwa_water);
        map.removeControl(pwa_waterv);
    } else {
      document.getElementById("pwa_water").style.color = "green";
        map.addLayer(pwa_water);        
        $(this).addClass('selected');
        pwa_waterv.addTo(map);
   }

});



var pl_reservoir_pointv = L.control({
    position: 'bottomright'
});

pl_reservoir_pointv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:pl_reservoir_point&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var pl_reservoir_point = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:pl_reservoir_point",
  styles:'pl_reservoir_point', 
  transparent: true, 
  format: 'image/png' 
});
$("#pl_reservoir_point").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(pl_reservoir_point)) {
      document.getElementById("pl_reservoir_point").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(pl_reservoir_point);
        map.removeControl(pl_reservoir_pointv);
    } else {
      document.getElementById("pl_reservoir_point").style.color = "green";
        map.addLayer(pl_reservoir_point);        
        $(this).addClass('selected');
        pl_reservoir_pointv.addTo(map);
   }
});











var streamv = L.control({
    position: 'bottomright'
});

streamv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:stream&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};
var stream = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:stream",
  styles:'stream', 
  transparent: true, 
  format: 'image/png' 
});
$("#stream").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(stream)) {
      document.getElementById("stream").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(stream);
        map.removeControl(streamv);

    } else {
      document.getElementById("stream").style.color = "green";
        map.addLayer(stream);        
        $(this).addClass('selected');
        streamv.addTo(map);
   }
});




var pl_wshdclsv = L.control({
    position: 'bottomright'
});
pl_wshdclsv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:pl_wshdcls&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};


var pl_wshdcls = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:pl_wshdcls",
  styles:'pl_wshdcls', 
  transparent: true, 
  format: 'image/png' 
});
$("#pl_wshdcls").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(pl_wshdcls)) {
      document.getElementById("pl_wshdcls").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(pl_wshdcls);
map.removeControl(pl_wshdclsv);
    } else {
      document.getElementById("pl_wshdcls").style.color = "green";
        map.addLayer(pl_wshdcls);        
        $(this).addClass('selected');
pl_wshdclsv.addTo(map);
   }
});




var waterbodyv = L.control({
    position: 'bottomright'
});
waterbodyv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:waterbody&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var waterbody = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:waterbody",
  styles:'waterbody', 
  transparent: true, 
  format: 'image/png' 
});
$("#waterbody").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(waterbody)) {
      document.getElementById("waterbody").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(waterbody);
map.removeControl(waterbodyv);
    } else {
      document.getElementById("waterbody").style.color = "green";
        map.addLayer(waterbody);        
        $(this).addClass('selected');
waterbodyv.addTo(map);
   }
});




var irr_areav = L.control({
    position: 'bottomright'
});
irr_areav.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:irr_area&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var irr_area = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:irr_area",
  styles:'irr_area', 
  transparent: true, 
  format: 'image/png' 
});
$("#irr_area").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(irr_area)) {
      document.getElementById("irr_area").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(irr_area);
map.removeControl(irr_areav);
    } else {
      document.getElementById("irr_area").style.color = "green";
        map.addLayer(irr_area);        
        $(this).addClass('selected');
irr_areav.addTo(map);
   }
});




var buildingv = L.control({
    position: 'bottomright'
});
buildingv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:building&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var building = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:building",
  styles:'building', 
  transparent: true, 
  format: 'image/png' 
});
$("#building").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(building)) {
      document.getElementById("building").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(building);
map.removeControl(buildingv);
    } else {
      document.getElementById("building").style.color = "green";
        map.addLayer(building);        
        $(this).addClass('selected');
buildingv.addTo(map);
   }
});




var treasury_boundv = L.control({
    position: 'bottomright'
});
treasury_boundv.onAdd = function(map) {
    var src = "hhttp://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:treasury_bound&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var treasury_bound = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:treasury_bound",
  styles:'treasury_bound', 
  transparent: true, 
  format: 'image/png' 
});
$("#treasury_bound").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(treasury_bound)) {
      document.getElementById("treasury_bound").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(treasury_bound);
map.removeControl(treasury_boundv);
    } else {
      document.getElementById("treasury_bound").style.color = "green";
        map.addLayer(treasury_bound);        
        $(this).addClass('selected');
treasury_boundv.addTo(map);
   }
});




var treasury_buildv = L.control({
    position: 'bottomright'
});
treasury_buildv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:reasury_build&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var treasury_build = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:reasury_build",
  styles:'reasury_build', 
  transparent: true, 
  format: 'image/png' 
});
$("#treasury_build").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(treasury_build)) {
      document.getElementById("treasury_build").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(treasury_build);
map.removeControl(treasury_buildv);
    } else {
      document.getElementById("treasury_build").style.color = "green";
        map.addLayer(treasury_build);        
        $(this).addClass('selected');
treasury_buildv.addTo(map);
   }
});




var alro_parcelv = L.control({
    position: 'bottomright'
});
alro_parcelv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:alro_parcel&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var alro_parcel = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:alro_parcel",
  styles:'alro_parcel', 
  transparent: true, 
  format: 'image/png' 
});
$("#alro_parcel").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(alro_parcel)) {
      document.getElementById("alro_parcel").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(alro_parcel);
map.removeControl(alro_parcelv);
    } else {
      document.getElementById("alro_parcel").style.color = "green";
        map.addLayer(alro_parcel);        
        $(this).addClass('selected');
alro_parcelv.addTo(map);
   }
});




var nsl_parcelv = L.control({
    position: 'bottomright'
});
nsl_parcelv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:nsl_parcel&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var nsl_parcel = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:nsl_parcel",
  styles:'nsl_parcel', 
  transparent: true, 
  format: 'image/png' 
});
$("#nsl_parcel").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(nsl_parcel)) {
      document.getElementById("nsl_parcel").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(nsl_parcel);
map.removeControl(nsl_parcelv);
    } else {
      document.getElementById("nsl_parcel").style.color = "green";
        map.addLayer(nsl_parcel);        
        $(this).addClass('selected');
nsl_parcelv.addTo(map);
   }
});




var pl_forest202_lddv = L.control({
    position: 'bottomright'
});
pl_forest202_lddv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:pl_forest202_ldd&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var pl_forest202_ldd = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:pl_forest202_ldd",
  styles:'pl_forest202_ldd', 
  transparent: true, 
  format: 'image/png' 
});
$("#pl_forest202_ldd").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(pl_forest202_ldd)) {
      document.getElementById("pl_forest202_ldd").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(pl_forest202_ldd);
map.removeControl(pl_forest202_lddv);
    } else {
      document.getElementById("pl_forest202_ldd").style.color = "green";
        map.addLayer(pl_forest202_ldd);        
        $(this).addClass('selected');
pl_forest202_lddv.addTo(map);
   }
});




var conservation_law = L.control({
    position: 'bottomright'
});
conservation_law.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:conservation_law&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var conservation_law = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:conservation_law",
  styles:'conservation_law', 
  transparent: true, 
  format: 'image/png' 
});
$("#conservation_law").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(conservation_law)) {
      document.getElementById("conservation_law").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(conservation_law);
map.removeControl(conservation_law);
    } else {
      document.getElementById("conservation_law").style.color = "green";
        map.addLayer(conservation_law);        
        $(this).addClass('selected');
conservation_law.addTo(map);
   }
});




var nha_forestv = L.control({
    position: 'bottomright'
});
nha_forestv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:nha_forest&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var nha_forest = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:nha_forest",
  styles:'nha_forest', 
  transparent: true, 
  format: 'image/png' 
});
$("#nha_forest").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(nha_forest)) {
      document.getElementById("nha_forest").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(nha_forest);
map.removeControl(nha_forestv);
    } else {
      document.getElementById("nha_forest").style.color = "green";
        map.addLayer(nha_forest);        
        $(this).addClass('selected');
nha_forestv.addTo(map);
   }
});




var nrf_forestv = L.control({
    position: 'bottomright'
});
nrf_forestv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:nrf_forest&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var nrf_forest = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:nrf_forest",
  styles:'nrf_forest', 
  transparent: true, 
  format: 'image/png' 
});
$("#nrf_forest").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(nrf_forest)) {
      document.getElementById("nrf_forest").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(nrf_forest);
map.removeControl(nrf_forestv);
    } else {
      document.getElementById("nrf_forest").style.color = "green";
        map.addLayer(nrf_forest);        
        $(this).addClass('selected');
nrf_forestv.addTo(map);
   }
});




var supermaketv = L.control({
    position: 'bottomright'
});
supermaketv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:supermaket&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var supermaket = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:supermaket",
  styles:'supermaket', 
  transparent: true, 
  format: 'image/png' 
});
$("#supermaket").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(supermaket)) {
      document.getElementById("supermaket").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(supermaket);
map.removeControl(supermaketv);
    } else {
      document.getElementById("supermaket").style.color = "green";
        map.addLayer(supermaket);        
        $(this).addClass('selected');
supermaketv.addTo(map);
   }
});




var templev = L.control({
    position: 'bottomright'
});
templev.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:temple&transparent=TRUE&legend_options=forceLabels:on"
    +"&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var temple = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:temple",
  styles:'temple', 
  transparent: true, 
  format: 'image/png' 
});
$("#temple").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(temple)) {
      document.getElementById("temple").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(temple);
map.removeControl(templev);
    } else {
      document.getElementById("temple").style.color = "green";
        map.addLayer(temple);        
        $(this).addClass('selected');
templev.addTo(map);
   }
});




var factoryv = L.control({
    position: 'bottomright'
});
factoryv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:factory&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var factory = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:factory",
  styles:'factory', 
  transparent: true, 
  format: 'image/png' 
});
$("#factory").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(factory)) {
      document.getElementById("factory").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(factory);
map.removeControl(factoryv);
    } else {
      document.getElementById("factory").style.color = "green";
        map.addLayer(factory);        
        $(this).addClass('selected');
factoryv.addTo(map);
   }
});




var hospitalv = L.control({
    position: 'bottomright'
});
hospitalv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:hospital&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var hospital = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:hospital",
  styles:'hospital', 
  transparent: true, 
  format: 'image/png' 
});
$("#hospital").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(hospital)) {
      document.getElementById("hospital").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(hospital);
map.removeControl(hospitalv);
    } else {
      document.getElementById("hospital").style.color = "green";
        map.addLayer(hospital);        
        $(this).addClass('selected');
hospitalv.addTo(map);

   }
});




var hcenterv = L.control({
    position: 'bottomright'
});
hcenterv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:hcenter&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var hcenter = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:hcenter",
  styles:'hcenter', 
  transparent: true, 
  format: 'image/png' 
});
$("#hcenter").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(hcenter)) {
      document.getElementById("hcenter").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(hcenter);
map.removeControl(hcenterv);
    } else {
      document.getElementById("hcenter").style.color = "green";
        map.addLayer(hcenter);        
        $(this).addClass('selected');
hcenterv.addTo(map);
   }
});




var hospital_subv = L.control({
    position: 'bottomright'
});
hospital_subv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:hospital_sub&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var hospital_sub = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:hospital_sub",
  styles:'hospital_sub', 
  transparent: true, 
  format: 'image/png' 
});
$("#hospital_sub").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(hospital_sub)) {
      document.getElementById("hospital_sub").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(hospital_sub);
map.removeControl(hospital_subv);
    } else {
      document.getElementById("hospital_sub").style.color = "green";
        map.addLayer(hospital_sub);        
        $(this).addClass('selected');
hospital_subv.addTo(map);
   }
});




var public_healthv = L.control({
    position: 'bottomright'
});
public_healthv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:public_health&transparent=TRUE&legend_options=forceLabels:on";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var public_health = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:public_health",
  styles:'public_health', 
  transparent: true, 
  format: 'image/png' 
});
$("#public_health").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(public_health)) {
      document.getElementById("public_health").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(public_health);
map.removeControl(public_healthv);
    } else {
      document.getElementById("public_health").style.color = "green";
        map.addLayer(public_health);        
        $(this).addClass('selected');
public_healthv.addTo(map);
   }
});




var basin50kv = L.control({
    position: 'bottomright'
});
basin50kv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:basin50k&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var basin50k = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:basin50k",
  styles:'basin50k', 
  transparent: true, 
  format: 'image/png' 
});
$("#basin50k").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(basin50k)) {
      document.getElementById("basin50k").style.color = "";
        $(this).removeClass('basin50k');
        map.removeLayer(basin50k);
map.removeControl(basin50kv);
    } else {
      document.getElementById("basin50k").style.color = "green";
        map.addLayer(basin50k);        
        $(this).addClass('selected');
basin50kv.addTo(map);
   }
});




var landuse_57v = L.control({
    position: 'bottomright'
});
landuse_57v.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:landuse_57&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var landuse_57 = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:landuse_57",
  styles:'landuse_57', 
  transparent: true, 
  format: 'image/png' 
});
$("#landuse_57").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(landuse_57)) {
      document.getElementById("landuse_57").style.color = "";
        $(this).removeClass('landuse_57');
        map.removeLayer(landuse_57);
map.removeControl(landuse_57v);
    } else {
      document.getElementById("landuse_57").style.color = "green";
        map.addLayer(landuse_57);        
        $(this).addClass('selected');
landuse_57v.addTo(map);
   }
});




var soilgroupv = L.control({
    position: 'bottomright'
});
soilgroupv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:soilgroup&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var soilgroup = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:soilgroup",
  styles:'soilgroup', 
  transparent: true, 
  format: 'image/png' 
});
$("#soilgroup").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(soilgroup)) {
      document.getElementById("soilgroup").style.color = "";
        $(this).removeClass('soilgroup');
        map.removeLayer(soilgroup);
map.removeControl(soilgroupv);
    } else {
      document.getElementById("soilgroup").style.color = "green";
        map.addLayer(soilgroup);        
        $(this).addClass('selected');
soilgroupv.addTo(map);
   }
});




var pararubberv = L.control({
    position: 'bottomright'
});
pararubberv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:pararubber&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var pararubber = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:pararubber",
  styles:'pararubber', 
  transparent: true, 
  format: 'image/png' 
});
$("#pararubber").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(pararubber)) {
      document.getElementById("pararubber").style.color = "";
        $(this).removeClass('pararubber');
        map.removeLayer(pararubber);
map.removeControl(pararubberv);
    } else {
      document.getElementById("pararubber").style.color = "green";
        map.addLayer(pararubber);        
        $(this).addClass('selected');
pararubberv.addTo(map);
   }
});




var sricev = L.control({
    position: 'bottomright'
});
sricev.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var srice = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'srice', 
  transparent: true, 
  format: 'image/png' 
});
$("#srice").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(srice)) {
      document.getElementById("srice").style.color = "";
        $(this).removeClass('srice');
        map.removeLayer(srice);
map.removeControl(sricev);
    } else {
      document.getElementById("srice").style.color = "green";
        map.addLayer(srice);        
        $(this).addClass('selected');
sricev.addTo(map);
   }
});




var scornv = L.control({
    position: 'bottomright'
});
scornv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var scorn = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'scorn', 
  transparent: true, 
  format: 'image/png' 
});
$("#scorn").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(scorn)) {
      document.getElementById("scorn").style.color = "";
        $(this).removeClass('scorn');
        map.removeLayer(scorn);
map.removeControl(scornv);
    } else {
      document.getElementById("scorn").style.color = "green";
        map.addLayer(scorn);        
        $(this).addClass('selected');
scornv.addTo(map);
   }
});





var scasavav = L.control({
    position: 'bottomright'
});
scasavav.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var scasava = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'scasava', 
  transparent: true, 
  format: 'image/png' 
});
$("#scasava").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(scasava)) {
      document.getElementById("scasava").style.color = "";
        $(this).removeClass('scasava');
        map.removeLayer(scasava);
map.removeControl(scasavav);
    } else {
      document.getElementById("scasava").style.color = "green";
        map.addLayer(scasava);        
        $(this).addClass('selected');
scasavav.addTo(map);
   }
});






var ssugarv = L.control({
    position: 'bottomright'
});
ssugarv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var ssugar = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'ssugar', 
  transparent: true, 
  format: 'image/png' 
});
$("#ssugar").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(ssugar)) {
      document.getElementById("ssugar").style.color = "";
        $(this).removeClass('ssugar');
        map.removeLayer(ssugar);
map.removeControl(ssugarv);
    } else {
      document.getElementById("ssugar").style.color = "green";
        map.addLayer(ssugar);        
        $(this).addClass('selected');
ssugarv.addTo(map);
   }
});






var spineapplev = L.control({
    position: 'bottomright'
});
spineapplev.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&STYLE=svegetable&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var spineapple = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'spineapple', 
  transparent: true, 
  format: 'image/png' 
});
$("#spineapple").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(spineapple)) {
      document.getElementById("spineapple").style.color = "";
        $(this).removeClass('spineapple');
        map.removeLayer(spineapple);
map.removeControl(spineapplev);
    } else {
      document.getElementById("spineapple").style.color = "green";
        map.addLayer(spineapple);        
        $(this).addClass('selected');
spineapplev.addTo(map);
   }
});






var svegetablev = L.control({
    position: 'bottomright'
});
svegetablev.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&STYLE=svegetable&FORMAT=image%2Fpng&WIDTH=20&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var svegetable = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'svegetable', 
  transparent: true, 
  format: 'image/png' 
});
$("#svegetable").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(svegetable)) {
      document.getElementById("svegetable").style.color = "";
        $(this).removeClass('svegetable');
        map.removeLayer(svegetable);
map.removeControl(svegetablev);
    } else {
      document.getElementById("svegetable").style.color = "green";
        map.addLayer(svegetable);        
        $(this).addClass('selected');
svegetablev.addTo(map);
   }
});






var srubberv = L.control({
    position: 'bottomright'
});
srubberv.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&STYLE=svegetable&HEIGHT=20&LAYER=phs:suitsv&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var srubber = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:suitsv",
  styles:'srubber', 
  transparent: true, 
  format: 'image/png' 
});
$("#srubber").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(srubber)) {
      document.getElementById("srubber").style.color = "";
        $(this).removeClass('srubber');
        map.removeLayer(srubber);
map.removeControl(srubberv);
    } else {
      document.getElementById("srubber").style.color = "green";
        map.addLayer(srubber);        
        $(this).addClass('selected');
srubberv.addTo(map);
   }
});







var villagev = L.control({
    position: 'bottomright'
});
villagev.onAdd = function(map) {
    var src = "http://www.gistnu.com/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image%2Fpng&WIDTH=20&STYLE=village&HEIGHT=20&LAYER=phs:village&transparent=TRUE";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src="' + src + '"/>';
    return div;
};

var village = L.tileLayer.wms("http://www.gistnu.com/geoserver/ows?", { 
  layers: "phs:village",
  styles:'village', 
  transparent: true, 
  format: 'image/png' 
});
$("#village").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(village)) {
      document.getElementById("village").style.color = "";
        $(this).removeClass('village');
        map.removeLayer(village);
map.removeControl(villagev);
    } else {
      document.getElementById("village").style.color = "green";
        map.addLayer(village);        
        $(this).addClass('selected');
villagev.addTo(map);
   }
});










<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<script src="https://unpkg.com/leaflet-draw@0.4.13/dist/leaflet.draw.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet-draw@0.4.13/dist/leaflet.draw.css"/>

    <script type="text/javascript">
      window.onload = function () {
        L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';
        var baseLayer = L.mapquest.tileLayer('map');

        var map = L.mapquest.map('map', {
          center: [29.953745, -90.074158],
          layers: baseLayer,
          zoom: 10
        });

        L.control.layers({
          'Map': baseLayer
        }).addTo(map);

        var drawnItems = L.featureGroup().addTo(map);
        /*kanan atas*/
        map.addControl(L.mapquest.control({
            position: 'topright',
            keepOpen: false,
            searchAhead: true,
            compactResults: true,
            closeResultsOnClick: true,
            searchAheadOptions: {
              limit: 6
            }
        }));
        /*end*/
        map.addControl(new L.Control.Draw({
          edit: {
            featureGroup: drawnItems,
            poly: {
              allowIntersection: false,
              draggable: true
            }
          },
          draw: {
            polygon: {
              allowIntersection: false,
              showArea: true,
              draggable: true
            }
          }
        }));

        map.on(L.Draw.Event.CREATED, function (event) {
          var layer = event.layer;

          drawnItems.addLayer(layer);

        });
        /*membuat marker dan text dari lat long*/
        L.mapquest.textMarker([45, -120], {
            text: 'Coffee Shop',
            subtext: 'Iconic coffeehouse chain',
            position: 'right',
            type: 'marker',
            icon: {
              primaryColor: '#333333',
              secondaryColor: '#333333',
              size: 'sm'
            }
          }).addTo(map);

      }
    </script>
  <div class="content-wrapper" style="min-height: 901px;">
      <!-- Main content -->
      <section class="content">
        <div id="map" style="width: 100%; height: 530px;"></div>
      </section>
      <!-- /.content -->
  </div>
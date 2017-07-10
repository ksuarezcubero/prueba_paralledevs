<!doctype html>
<html lang="es">

    <head>
        
        <meta charset=UTF-8>
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
        <?php
            //retorna un array con los datos del json
            function get_array(){
                $datos= file_get_contents("https://data.cityofchicago.org/resource/u77m-8jgp.json");
                $array = json_decode($datos, true);
                return $array;
            }
        ?>
        
        <h2>City of Chicago</h2>
        
        <div class="table">
            
                
                    <table id="myTable" class="display" cellspacing="0" cellspacing="0" width="90%">

                    <thead>
                        <tr>
                            <th>COMPUTED REGION</th>
                            <th>DATE OF COUNT</th>
                            <th>ID</th>
                            <th>LATITUDE</th>
                            <th>LONGITUDE</th>
                            <th>STREET</th>
                            <th>TOTAL PASSING VEHICLE VOLUME</th>
                            <th>TRAFFIC VOLUME COUNT LOCATION ADDRESS</th>
                            <th>VEHICLE VOLUME BY EACH DIRECTION OF TRAFFIC</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>COMPUTED REGION</th>
                            <th>DATE OF COUNT</th>
                            <th>ID</th>
                            <th>LATITUDE</th>
                            <th>LONGITUDE</th>
                            <th>STREET</th>
                            <th>TOTAL PASSING VEHICLE VOLUME</th>
                            <th>TRAFFIC VOLUME COUNT LOCATION ADDRESS</th>
                            <th>VEHICLE VOLUME BY EACH DIRECTION OF TRAFFIC</th>
                        </tr>
                    </tfoot>
               </table>

        </div>
        <h2> Map Location Point</h2>
        <div id="map" ></div>
        
        
        
        
        <script>
            var map;
            var arrayDatos=<?php echo json_encode(get_array());?>;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: new google.maps.LatLng(41.8500300,-87.6500500),
                    mapTypeId: 'terrain'
                });

                // Create a <script> tag and set the USGS URL as the source.
                var script = document.createElement('script');
                // This example uses a local copy of the GeoJSON stored at
                // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
                script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
                document.getElementsByTagName('head')[0].appendChild(script);
            }
        </script>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
         <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8hU-XjzAunbmvNNnRXx9tN7owqjAffxQ&callback=initMap"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>

        <script>
             var arrayDatos=<?php echo json_encode(get_array());?>;
            $(document).ready(function(){
                $('#myTable').DataTable({
                    data: arrayDatos,
                    columns:[
                        {data: ":@computed_region_6mkv_f3dw"},
                        {data: "date_of_count"},
                        {data: "id"},
                        {data: "latitude"},
                        {data: "longitude"},
                        {data: "street"},
                        {data: "total_passing_vehicle_volume"},
                        {data: "traffic_volume_count_location_address"},
                        {data: "vehicle_volume_by_each_direction_of_traffic"}
                    ]
                });
            });
        </script>
        
        

        
       
    </body>
</html>
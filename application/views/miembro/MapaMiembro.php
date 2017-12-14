<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	  <style media="screen">
	#map {
	margin: 10px auto;
	width:90%;
	height:500px;
	border: 2px solid #666666;
	border-radius: 6px;
	}

  .omar{
    margin-right:15px;
     margin-left:5px;
     margin-top:5px
  }
  p{
text-align: justify;

  }

</style>

  <script type="text/javascript">

  function load() {
    var map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(18.61866963078444,-70.11270019531253),
      zoom: 7,
      mapTypeId: 'roadmap'
    });
     var infoWindow = new google.maps.InfoWindow;
    downloadUrl("<?php echo base_url('markers/markers.php')?>", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
       Array.prototype.forEach.call(markers, function(markerElem) {
        var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute("lat")),
          parseFloat(markerElem.getAttribute("lng")));
          var correo=markerElem.getAttribute('tipo');
          var nombre=markerElem.getAttribute('nombre');
          var telefono=markerElem.getAttribute('telefono');
          var foto=markerElem.getAttribute('foto');
          var id=markerElem.getAttribute('id');


            var infowincontent = '<div id="content">'+
              '<div id="siteNotice">'+
              '</div> <h5>Miembro No.'+ id+'</h5><h2 class="text-center" id="firstHeading" class="firstHeading"> <label class="label label-default">'+nombre +'</label></h2><div id="bodyContent" >'
              +  '<h6 class="text-center"> '+ point+'<div></h6> <b> Correo: <em> '+correo+ '</br><center></em></b><img src="<?php echo base_url('imagenes/')?>'+foto+'" height="80%" width="50%"/> </center>'
               +
                '<br><div class="text-center"><a href="<?php echo base_url('Problema_Controller/crear/')?>'+id+'" class=" omar btn btn-warning btn-sm">Modificar</a>'+
                '<a href="<?php echo base_url('Problema_Controller/eliminar/')?>'+id+'" class="btn btn-danger btn-sm"  onclick="return confirm(\'¿Estás seguro de que desea eliminar?\');">Eliminar</a></div> <br>'
               +
                 '</div>'+ '</div>';


          var marker = new google.maps.Marker({
          map: map,
          position: point,
          });

          marker.addListener('click', function() {
                         infoWindow.setContent(infowincontent);
                         infoWindow.open(map, marker);
                       });
      });
    });
  }
  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;
    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
    request.open('GET', url, true);
    request.send(null);
  }
  function doNothing() {}

  </script>
</head>

<body onload="load()">

  </div>
</div>
</nav>
   <h1 class="text-center">Miembros</h1>
  <div id="map">

  </div>

   </div>
   <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL5IQ7lIdJfgKKHfIrX32FPIOESwVEhiM&callback=load"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>

<form action="<?php echo base_url('miembro/registrar')?>" method="post" enctype="multipart/form-data">
  <div class="col col-md-12">
    <div>
      <span><input name="id" type="hidden" class="form-control"></span>
    </div>

    <div>
      <span><label>Cedula</label></span>
      <span><input name="cedula" type="text" class="form-control" readonly value="<?php echo  $_SESSION['cedulavalidada']?>"></span>
    </div>

    <div>
      <span><label>Nombre</label></span>
      <span><input required name="nombre" type="text" class="form-control"></span>
    </div>

    <div>
      <span><label>Telefono</label></span>
      <span><input name="telefono" type="text" class="form-control"></span>
    </div>

    <div>
      <span><label>Email</label></span>
      <span><input required name="correo" type="text" class="form-control"></span>
    </div>

    <div>
      <span><label>Contraseña</label></span>
      <span><input required name="contrasena" type="password" class="form-control"></span>
    </div>

    <div>
      <span><label>Confirme su Contraseña</label></span>
      <span><input required type="password" class="form-control"></span>
    </div>

    <div>
      <span><label>Celular</label></span>
      <span><input name="celular" type="text" class="form-control"></span>
    </div>

    <div>
      <span><label>Foto</label></span>
      <span><input name="foto" type="file" class="form-control"></span>
    </div>

    <div>
      <span><label>Direccion</label></span>
      <span><input required name="direccion" type="text" class="form-control"></span>
    </div>

    <div>
      <span><label>Tipo</label></span>
      <span><input required name="tipo" type="hidden" value="3" class="form-control"></span>
    </div>

    <div class='text-center'><h2><label class='label label-default'>Nota: Debes mover el marcador para obtener la latitud y longitud de la ubicacion</label></h2> </div>
    <div id='googleMap'></div>

    <div>
      <span><label>Latitud</label></span>
      <span><input name="latitud" id="latitud" type="text" readonly class="form-control"></span>
    </div>

    <div>
      <span><label>Longitud</label></span>
      <span><input name="longitud" id="longitud"type="text" readonly class="form-control"></span>
    </div>
    <br/>

    <div class="text-center">
      <span><input type="submit" class="mybutton btn btn-primary" value="Registrar"></span>
    </div>
  </div>
</form>
</div>
</div>

<style media="screen">
#respuesta {
  margin: auto 60px;
}

#info {
  font-size: 18px;
  background: #ffffff;
  width: 450px;
  border-radius: 6px;
  text-align: center;
  color: #666666;
  border: solid 1px #666666;
	margin: auto;
  padding: 3px;
}

.titular {
  background: #ffffff;
  font-size: 32px;
  color: #000;
  margin: 3px auto;
  text-align: center;
  width: 50%;
  border-radius: 6px;
  border: solid 1px #999999;
}

#googleMap {
  margin: 10px auto;
  width:90%;
  height:280px;
  border: 2px solid #666666;
  border-radius: 6px;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL5IQ7lIdJfgKKHfIrX32FPIOESwVEhiM"></script>
</head>

<body>
  <?php
  $lat = "18.61866963078444";
  $lng = "-70.11270019531253";
  $pos = "18.61866963078444,-70.11270019531253";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    lat = "<?php echo $lat; ?>" ;
    lng = "<?php echo $lng; ?>" ;
    document.getElementById('latitud').value = lat;
    document.getElementById('longitud').value = lng;
    var map;

    function initialize() {
      var myLatlng = new google.maps.LatLng(lat,lng);
      var mapOptions = {
        zoom: 7,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
      var marker = new google.maps.Marker({
        position: myLatlng,
        draggable:true,
        animation: google.maps.Animation.DROP,
        title: 'Ubicar Lugar!',
        web:"Localización geográfica!",
      });

      google.maps.event.addListener(marker, 'dragend', function(event) {
        var myLatLng = event.latLng;
        lat = myLatLng.lat();
        lng = myLatLng.lng();
        document.getElementById('latitud').value = lat;
        document.getElementById('longitud').value = lng;
        document.getElementById('info').innerHTML = [ lat, lng ].join(', ');
      });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    $("#enviar").click(function() {
      var url = "cargar.php";
      $("#respuesta").html('<img src="cargando.gif"/>');
      $.ajax({
        type: "POST",
        url: url,
        data: 'lat=' + lat + '&lng=' + lng,

        success: function(data)
        {
          $("#respuesta").html(data);
        }
      });
    });
  });
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

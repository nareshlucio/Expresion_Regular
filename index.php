<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Automata para Validar CURP</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-mb-3">
          <div class="form-group align-items-center">
          <h1 class="text-center">Validacion de CURP con Expresiones regulares</h1>
            <form action="" method="GET">
              <label>Ingrese Su expresion: </label>
              <input type="text" name="expresion" id="curp_input" oninput="validarinput(this);" class="form-control col-sm-5">
            </form>
            <div class="col-ms-5">
             <h3 id="resultado"></h3> 
            </div>
          </div>
        </div>
        <div class="col-mb-3">
          <h1>Validacion de Correo con Expresiones Regulares</h1>
          <form action="" method="GET" class="form" name="frminputs">
            <div class="form-group"> 
              <div class="form-control form-control-label">
                <label>Ingrese su Expresion: </label>
              </div>
              <div class="form-group">
              <input type="text" name="expresioncorreo" id="correo_input" oninput="ValidarinputCo(this);" class="form-control" name="correo">
              </div>
            </div>
          </form>
          <div class="col-ms-5">
             <h3 id="resul"></h3> 
            </div>
        </div>
        <div class="col-mb-3">
          <h1>Validacion de URL con Expresiones Regulares</h1>
          <form action="" method="GET" class="form" name="frmurl">
            <div class="form-group"> 
              <div class="form-control form-control-label">
                <label>Ingrese su URL: </label>
              </div>
              <div class="form-group">
              <input type="text" name="expresioncorreo" id="url_input" oninput="ValidarinputURL(this);" class="form-control" name="correo">
              </div>
            </div>
          </form>
          <div class="col-ms-5">
             <h3 id="URL"></h3> 
            </div>
        </div>
      </div>
    </div>
   </body>
<script >
  // Funcion para poder validar El curp que introdujo el Uusuario
    function validarCURP(curp){
      var expre = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[0-1])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JS|M[CNS]|N[ETL]|OC|PL|Q{TR}|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TD-Z]{3}[A-Z\d])(\d)$/,validado = curp.match(expre);
      if(!validado)
        return false;

    function verifidi(curp17){
      var diccionario ="0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ", ingsuma=0.0, ingdigito=0.0;
      for(var i = 0; i<17; i++){
        ingsuma += diccionario.indexOf(curp17.charAt(i))*(18-i);
        ingdigito=10-ingsuma%10;
        if(ingdigito == 10)
          return 0;
        return ingdigito;
      }
      if(validado[2] != verifidi(validado[1]))
        return false;
    }
    return true;
  }
  //Validar lo que Introdujo en el Input
     function validarinput(input){
      var curp = input.value.toUpperCase(), resultado = document.getElementById("resultado"), valido = "No valido";
      if(validarCURP(curp)){
        valido = "Valido";
        resultado.classList.add("OK");
      }else{
           resultado.classList.remove("OK");
      }
    resultado.innerText = "CURP:"+ curp+ "\n formato :"+valido;
  }
  //----------------------------------------------------------------------------------------------------------------
  function validarCorreo(){
      var lengnatural =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      var correos = document.getElementById("correo_input").value;
      if(!(lengnatural.test(correos))) {
        document.getElementById("correo_input").focus()
        //alert("Tiene que escribir un correo electronico valido")
        return false;
      }else
        return true;
  }

  function ValidarinputCo(input){
      var correo = document.getElementById("correo_input").value, resul = document.getElementById("resul"), valido = "No valido";
      if(validarCorreo()){
        valido = "Valido";
        resul.classList.add("OK");
      }else{
           resul.classList.remove("OK");
      }
    resul.innerText = "Correo:"+ correo + "\n El Correo es :"+valido;
  }
  
function validarURLs(){
  var url= document.getElementById("url_input").value;
  var pattern = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
  if(pattern.test(url)){
    //alert("El URL Es valido");
    return true;
  }else{
    //alert("El URL es Invalido")
    return false;
  }
}

  function ValidarinputURL(input){
      var URL = document.getElementById("url_input").value, resultado = document.getElementById("URL"), valido = "No valido";
      if(validarURLs()){
        valido = "Valido";
        resultado.classList.add("OK");
      }else{
           resultado.classList.remove("OK");
      }
    resultado.innerText = "URL:"+ URL + "\n El URL es :"+valido;
  }
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
  </body>
</html>
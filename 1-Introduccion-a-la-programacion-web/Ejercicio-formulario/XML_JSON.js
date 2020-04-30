var boolDataMode_XML = 1;
var boolDataMode_JSON = 2;
var boolDataMode = boolDataMode_JSON;

var txt = '<clientes>';
txt += '<cliente>';
txt += '<nombre>Jassiel</nombre>';
txt += '<edad>21</edad>';
txt += '<genero>Hombre</genero>';
txt += '<correo>dfghj@fghj.com</correo>';
txt += '<cel>12345678</cel>';
txt += '</cliente>';
txt += '</clientes>';

var parser = new DOMParser();
var xmlDoc = parser.parseFromString(txt, "text/xml");

var txtj = '{"cliente":['
    + '{"nombre":"Jassiel", "edad": "21","genero":"Hombre", "correo":"dfghj@fghj.com", "cel":"12345678"}'
    + ']}';
var clientes = JSON.parse(txtj);


function continuar2() {
    nombre = document.getElementById("nombre").value;
    edad = document.getElementById("age").value;
    genero = "";
    if (document.getElementById("genH").checked == true) {
        genero = "Hombre";
    }
    else {
        if (document.getElementById("genM").checked == true) {
            genero = "Mujer";
        }
        else {
            genero = "Otro";
        }
    } //else
    correo = document.getElementById("correo").value;
    cel = document.getElementById("cel").value;
    if (boolDataMode == boolDataMode_JSON) {
        var obj = {
            nombre: '',
            edad: '',
            genero: '',
            correo: '',
            cel: ''
        }
        obj.nombre = nombre;
        obj.edad = edad;
        obj.genero = genero;
        obj.correo = correo;
        obj.cel = cel;

        clientes.cliente.push(obj);
        alert("Alta realizada");
    }
    else if (boolDataMode == boolDataMode_XML) {

    }



}//continuar
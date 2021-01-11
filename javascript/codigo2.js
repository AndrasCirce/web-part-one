
testo = "Hola" + "\n" + "Que facil es incluir 'comillas simples'" + "\n" + "y \"comillas dobles\""; 
mes = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
var valores = [true,5,false,"hola","adios",2];

alert(testo);

mes.forEach(element => {
    alert(element);
});


//--------------------Punto 1----------------------
if  (valores[3].length > valores[4].length){
    alert(valores[3]+ " tiene mas letras");
} else {
    alert(valores[4]+ " tiene mas letras");
}
//--------------------Punto 2----------------------
alert(valores[0] || valores[2]);
alert(valores[0] && valores[2]);
//--------------------Punto 3----------------------
alert("Suma = " + (valores[1] + valores[5]) + "\n" +
     "Resta = " + (valores[1] - valores[5]) + "\n" +
     "Multiplicacion = " + (valores[1] * valores[5]) + "\n" +
     "Division = " + (valores[1] / valores[5]) + "\n" +
     "Modulo = " + (valores[1] % valores[5]) + "\n");



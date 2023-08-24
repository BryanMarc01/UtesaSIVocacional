function enviar_datos_PDF(){
	//var n=document.getElementById("direccion").value;
	var tablaa=document.getElementById("paraPDF").value;
    var tabla = [5];
    var rep="Resultado";


    var x = 0;
    while (x < 5) {
    	var r=rep+""+x;
    	tabla[x]=document.getElementById(r).value;
   
    x ++;
    }



	var url="documentopdf.php";

	$.ajax({
		type:"post",
		url:url,
		data:{paraPDF:tablaa},
		success:function(datos){
			$("#mostrarPDF").html(datos);
		}
	}
		)
}
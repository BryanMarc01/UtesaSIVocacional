function enviar_datos(){
	var n=document.getElementById("direccion").value;
	var tablaa=document.getElementById("tab").value;
    var tabla = [5];
    var rep="Resultado";


    var x = 0;
    while (x < 5) {
    	var r=rep+""+x;
    	tabla[x]=document.getElementById(r).value;
   
    x ++;
    }



	var url="enviar.php";

	$.ajax({
		type:"post",
		url:url,
		data:{direccion:n,tab:tablaa},
		success:function(datos){
			$("#mostrar").html(datos);
		}
	}
		)
}
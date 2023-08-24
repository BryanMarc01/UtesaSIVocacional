

<?php

include("conexion2.php");
include('encabezado.php');

if(isset($_GET['id'])) {
  $TestCod = $_GET['id'];
  $query0 = "SELECT * FROM test WHERE TesCod = $TestCod";
  $result0 = mysqli_query($conn, $query0);
  if(!$result0) {
    die(" Sentencia query fallida.");
  }
  $area=0;
  while ($row0 = mysqli_fetch_array($result0)){

     $area= $row0['TesAreCod'];
  }


  $query = "SELECT * FROM preguntas WHERE PreTesCod = $TestCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die(" Sentencia query fallida.");
  }
}

  ?>
 <br>
 <center><h2> Test </h2></center>
  <div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="editTest.php?id=<?php echo $TestCod ?> " method="POST">
       
        <?php  
        $i=1;

        while ($row = mysqli_fetch_array($result)){ 
           $preCodigo = $row['PreCod'];
          ?>
            <h5>Pregunta <?php echo $i ?> </h5>

            <div class="form-group">

              <input disabled="disabled" name="pregunta<?php echo $i ?>" type="text" class="form-control" value="<?php echo $row['PreNom']; ?>"  placeholder="ingrese nueva pregunta">

              <?php 
                  
                  $query2 = "SELECT *FROM carrera where CarAreCod = $area  ";
                  $resultado=mysqli_query($conn,$query2);
                  
                while ($row2 = mysqli_fetch_array($resultado)) { 

                  if($row['PreCarCod'] == $row2 ['CarCod']){


                  ?>  

                     <input  type="radio" id="carrera" name="carreraPregunta<?php echo $i ?>" value="<?php echo $row2 ['CarCod']; ?>" checked >
                           <label for="carrera"> <?php echo $row2 ['CarNom'] ?></label><br>  
                     <?php
                 } 

                  else {
                  ?>
                   <input disabled="disabled" type="radio" id="carrera" name="carreraPregunta<?php echo $i ?>" value="<?php echo $row2 ['CarCod']; ?>">
                           <label for="carrera"> <?php echo $row2 ['CarNom'] ?></label><br>
                     <?php
                    }
                    
               }
              echo'Respuestas:' ;
                $query3 = "SELECT *FROM respuestas where ResPreCod = $preCodigo ";
                $resultado3=mysqli_query($conn,$query3);

                $n=1;

                while ($row3 = mysqli_fetch_array($resultado3)){
           ?>

           <input readonly="readonly" name="pregunta<?php echo$i?>Respuesta<?php echo$n?>" type="text" class="form-control"  value="<?php echo $row3 ['ResNom']; ?>"placeholder="respuesta<?php echo$n?> -- puntos <?php echo ($n-1) ?>" >
               
           <?php
             $n= $n+1;
             }
             ?>

             </div>
            
            <?php
            
             $i=$i+1;
           } ?>

            
          </form>

</div>
</div>
</div>
</div>
<?php include('pie.php'); ?>

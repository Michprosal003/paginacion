
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.css">
  

    <title>Document</title>
</head>
<body>
    














<!--Estableciendo una conexion a la base de datos--> 


<?php 


$conn=mysqli_connect("localhost","root","","datatable");

$por_pagina=10;

if(isset($_GET['pagina']))
$pagina=$_GET['pagina'];

else 
{
    $pagina=1;
}



$empieza=($pagina-1) * $por_pagina;
$query="SELECT * FROM  preinscripcion LIMIT $empieza,$por_pagina";
$resultado=mysqli_query($conn,$query);

?>



<table class="table table-bordered table-hover table-striped">

<tr>
<td>ID</td>
<td>NOMBRE</td>
<td>APELLIDO</td>
<td>EMAIL</td>
<td>PAIS</td>
<td>CARGO</td>
</tr>


<?php 

while($fila=mysqli_fetch_assoc($resultado))
{



?>


<tr>

<td><?php echo $fila['ID'];?></td>
<td><?php echo $fila['Nombre'];?></td>
<td><?php echo $fila['Apellido'];?></td>
<td><?php echo $fila['Email'];?></td>
<td><?php echo $fila['Pais'];?></td>
<td><?php echo $fila['Cargo'];?></td>



</tr>

<?php 

}

?>





</table>


<div>

<!--paginacion-->



<?php 


$query="SELECT * FROM  preinscripcion";
$resultado=mysqli_query($conn,$query);


$total_registros=mysqli_num_rows($resultado);
$total_paginas=ceil($total_registros/$por_pagina);


echo"<center><a href='paginacion.php?pagina=1'>"  .'Anterior'. "</a>";

for($i=1;  $i<=$total_paginas;   $i++)

{

echo"<a href='paginacion.php?pagina=".$i."'> ".$i." </a> ";


}

echo"<a href='paginacion.php?pagina=$total_paginas'>"  .'Siguiente'. "</a></center>";




?>


<style>



a{
 padding:15px;
 color: white;
 text-decoration: none;
 border: 1px solid darkred;
 background: darkred;
 display: inline-block;
 box-sizing: border-box;
opacity:0.8;



}


a:hover {
    opacity:1;




}



</style>








</div>

















</body>
</html>

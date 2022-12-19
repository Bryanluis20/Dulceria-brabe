<?php 
ob_start();
include "../session.php";
include "../conexion.php";
$con = conectar();  
    $id=$_GET['id'];
    $sql="SELECT * FROM venta WHERE folio='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    $consulta="SELECT *  FROM garrafon";
    $qy=mysqli_query($con,$consulta);
  
    $consulta2="SELECT *  FROM empleado";
    $qy2=mysqli_query($con,$consulta2);

    $consulta3="SELECT *  FROM cliente";
    $qy3=mysqli_query($con,$consulta3);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ticket Venta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

            <div class="container mt-5">
                    <div class="row"> 
                        <div class="col-md-3">
                          <div class="col-1" style="font-size: 3rem; margin-left: 30%;">
                            Ticket
                          </div>
                                <form action="#">

                                <label for="fecha">Fecha</label>    
                                <input type="text" class="form-control mb-3" name="fecha" value="<?php echo $row['fecha']; ?>"> 

                                <label for="cantidad">Cantidad</label>    
                                <input type="text" class="form-control mb-3" min="0" name="cantidad" value="<?php echo $row['cantidad']; ?>">

                                <?php 
                                  while($rowG = mysqli_fetch_assoc($qy)){
                                  if($row['Id_Garrafon'] == $rowG['Id_Garrafon']){  ?> 
                                    <label for="id_g">Garrafon</label>    
                                    <input  type="text" class="form-control mb-3" name="id_g" value="<?php echo "Garrafon ".$rowG['color']." Precio $".$rowG['precio_venta']; }} ?>">
                                  <?php
                                  while($rowE = mysqli_fetch_assoc($qy2)){
                                    if($row['Id_Empleado'] == $rowE['Id_Empleado']){  ?> 
                                    <label for="id_e">Empleado</label>    
                                    <input  type="text" class="form-control mb-3" name="id_e" value="<?php echo $rowE['nombres']." ".$rowE['apellidos']; }}?>">

                                  <?php
                                  while($rowC = mysqli_fetch_assoc($qy3)){
                                  if($row['Id_Cliente'] == $rowC['Id_Cliente']){  ?> 
                                    <label for="id_c">Cliente</label>    
                                    <input  type="text" class="form-control mb-3" name="id_c" value="<?php echo $rowC['nombres']." ".$rowC['apellidos']; }} ?>">
                                    <label for="importe_total">Total</label>    
                                    <input type="text" class="form-control mb-3" name="importe_total" value="<?php echo $row['importe_total']; ?>">
                                </form>

                        </div>
              </div>
          </div>
    </body>
</html>
<?php 
$html = ob_get_clean();
//echo $html;
require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("Ticket.pdf", array("Attachment" => false));
?>

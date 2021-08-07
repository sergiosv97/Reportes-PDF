<?php
include('conexionbd.php');

$sqlcategorias = 'SELECT * FROM Categorias';
$resultadocategorias = $conexion->query($sqlcategorias);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Reportes BD</title>
  </head>
  <body>
    <div class="container">
      <h1 align="center">Ejemplo de reportes PDF</h1>
      <br>
      <form action="#" method="POST" class="form-inline">
        <label for="" class="my-1 mr-2" >Categoria</label>
        <select name="cat" class="custom-select my-1 mr-sm-2" required>
          <option value="">Seleccionar</option>
          <?php foreach ($resultadocategorias as $nombrecategorias): ?>
            <option value="<?php echo $nombrecategorias['IdCategoria']; ?>"><?php echo $nombrecategorias['NombreC'];?></option>

            <?php endforeach ?>
        </select>
        <button type="submit" name="Mostrar" class="btn btn-primary my-1">Mostrar</button>
        
      </form>
      <?php
        if(isset($_POST['Mostrar'])){
          $categoriaseleccionada = $_POST['cat'];

          $sqlproductos = "SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = $categoriaseleccionada ";

          $resultadoproductos = $conexion->query($sqlproductos);

         ?>

          <h4 align="center">**** Lista de productos  ****</h4>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Precio</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($registro = $resultadoproductos->fetch_array(MYSQLI_BOTH)){
                  echo "<tr>
                             <td>".$registro['CodigoP']."</td>
                             <td>".$registro['NombreP']."</td>
                             <td>".$registro['Precio']."</td>
                        </tr>";
                }
                $conexion->close();
              ?>  
            </tbody>
          </table>
          <a class="link" href="../reportebd.php?idCat=<?php echo $categoriaseleccionada; ?>" target="_blank"><i class="fas fa-print"></i> Imprimir</a>

        <?php
       } else{ ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Precio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="3">
                  <div class="alert alert-danger" role="alert">No hay datos</div>
                </td>
              </tr>  
            </tbody>
          </table>

        <?php
        }
      ?>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
     <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
  </body>
</html>
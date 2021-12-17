<?php
require_once 'Partials/header.php';
require_once 'Controller/SeccionesController.php';
require_once 'Controller/FallasController.php';
require_once 'Controller/EstadosController.php';
require_once 'Controller/TiposController.php';
$seccion = new Secciones();
$estados = new Estados();
$tipos = new Tipos();
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Fallas</h1>
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Fallas</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
         
          
            <!-- Inicio contenido -->
            
            
            <table id="tabla1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Estado</th>
                      <th>Tipo</th>
                      <th>Seccion</th>
                      <th>Observaciones</th>
                      <th>Creacion</th>
                      <th>Finalizacion</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $fallas = new Fallas();
                    $falla = $fallas->GetFallasPendientes();
                  
                    foreach ($falla as $f) {
                      
                    echo '<tr>';
                    echo '<td>' . $f[0] . '</td>';
                    echo '<td>' . $estados->GetEstadoPorId($f[1]) . '</td>';
                    echo '<td>' . $tipos->GetTipoPorId($f[2]) . '</td>';
                    echo '<td>' . $seccion->GetSeccionPorId($f[3]) . '</td>';
                    echo '<td>' . $f[4] . '</td>';
                    echo '<td>' . $f[5] . '</td>';
                    echo '<td>' . $f[6] . '</td>';
                    echo '<td>
                    <form action="EditarFalla" method="POST">
                    <input type="hidden" name="id" value="'.$f[0].'">
                    
                    <button type="submit" class="btn btn-block btn-primary btn-sm" name="Editar" value="Editar">Editar</button>
                    </form>
                    </td>';
                    echo '</tr>';
                    }
                  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                      <th>Estado</th>
                      <th>Tipo</th>
                      <th>Seccion</th>
                      <th>Observaciones</th>
                      <th>Creacion</th>
                      <th>Finalizacion</th>
                      <th>Editar</th>
                    </tr>
                  </tfoot>
                </table>
                      
              <!-- /.modal-dialog -->
      
              <br>
            <div class="float-left">
            <button type="button" class="btn  btn-lg btn-info" data-toggle="modal" data-target="#modal-default">
                    Agregar falla
                  </button>
            </div> 
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Agregar falla</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="AgregarFalla" method="POST">        
                        <div class ="form-group">
                          <label>Tipo falla</label>
                          <select id="tipo" name="tipo"  class="form-control">';
                          <?php                  
                              $tipo = $tipos->GetTipos();
                              foreach ($tipo as $r) {
                                  echo '<option value="' . $r['id'] . '">' . $r['tipo_falla'] . '</option>';
                                }
                            echo '</select>';
                            ?>
                        </div>
                        <div class ="form-group">
                          <label>Seccion falla</label>
                          <select id="seccion" name="seccion"  class="form-control">';
                          <?php                  
                              $secciones = $seccion->GetSecciones();
                              foreach ($secciones as $r) {
                                  echo '<option value="' . $r['id'] . '">' . $r['seccion'] . '</option>';
                                }
                            echo '</select>';
                            ?>
                        </div>
                        <div class ="form-group">
                          <label>Observaciones</label>
                          
                          <textarea class="form-control" id="observaciones" name="observaciones" rows="3" maxlength="240"></textarea>
                        </div>
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar falla</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
            <!-- Fin contenido -->
          
          </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          Fallas
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
</div>
<?php
require_once 'Partials/footer.php';
?>

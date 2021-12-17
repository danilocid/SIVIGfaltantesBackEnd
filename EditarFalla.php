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
            
            
            <?php
              $falla = new Fallas();
              $id = $_POST['id'];
              
              $fallas = $falla->GetFallaPorId($id);
              
              foreach ($fallas as $c) {
                
                echo '<div class="col-md-6">';
                echo ' <form role="form" action="ModificarFalla" method="POST">';
                echo '<div class ="form-group">
                <label>ID</label>
                <input id="id" name="id" readonly type="text" class="form-control" value = "'.$c['id'].'">
                </div>';
                echo '<div class="form-group">
                <label>Estado</label>
                <select id="estado" name="estado" class="form-control">';
                  
                  
                  $estado = $estados->GetEstados();
                  foreach ($estado as $e) {
                      if ($e['id'] == $c['estado']) {
                        echo '<option value=' . $e['id'] . ' selected >' . $e['estado'] . '</option>';
                      } else {
                        echo '<option value=' . $e['id'] . '>' . $e['estado'] . '</option>';
                      }
                  }
                echo '</select>
                </div>';
                
                echo '<div class="form-group">
                <label>Tipo</label>
                <select id="tipo" name="tipo"  class="form-control">';
                  
                  
                  $tipo = $tipos->GetTipos();
                  foreach ($tipo as $r) {
                    
                      if ($r['id'] == $c['tipo']) {
                        echo '<option value="' . $r['id'] . '" selected >' . $r['tipo_falla'] . '</option>';
                      } else {
                        echo '<option value="' . $r['id'] . '">' . $r['tipo_falla'] . '</option>';
                      }
                  }
                echo '</select>
                </div>';

                echo '<div class="form-group">
                <label>Seccion</label>
                <select id="seccion" name="seccion" class="form-control">';
                  
                  
                  $secciones = $seccion->GetSecciones();
                  foreach ($secciones as $r) {
                      if ($r['id'] == $c['seccion']) {
                        echo '<option value=' . $r['id'] . ' selected >' . $r['seccion'] . '</option>';
                      } else {
                        echo '<option value=' . $r['id'] . '>' . $r['seccion'] . '</option>';
                      }
                  }
                echo '</select>
                </div>';

                echo '<div class ="form-group">
                <label>Observaciones</label>
                <input id="observaciones" name="observaciones" required type="text" class="form-control" value = "'.$c['observaciones'].'">
                </div>';
                echo '<div class ="form-group">
                <label>Fecha de creacion</label>
                <input id="fecha_creacion" name="fecha_creacion" required type="text" readonly class="form-control" value = "'.$c['fecha_creacion'].'">
                </div>';
                echo '<div class ="form-group">
                <label>Fecha de finalizacion</label>
                <input id="fecha_finalizacion" name="fecha_finalizacion" required type="text" readonly class="form-control" value = "'.$c['fecha_finalizacion'].'">
                </div>';
                
                
              }
              ?>
      <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal">Editar falla</button>
    <div class="modal fade" id="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title">Modificar falla</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Seguro que quiere guardar los cambios?&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
          </form>  
          </div>
                      
              <!-- /.modal-dialog -->
      
                
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

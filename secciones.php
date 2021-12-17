<?php
require_once 'Partials/header.php';
require_once 'Controller/SeccionesController.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Secciones</h1>
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Secciones</h3>
  
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
                      <th>Seccion</th>
                      <th>Total Fallas</th>
                      <th>Faltantes</th>
                      <th>Completadas</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $secciones = new Secciones();
                    $seccion = $secciones->GetSecciones();
                  
                    foreach ($seccion as $s) {
                      
                    echo '<tr>';
                    echo '<td>' . $s[0] . '</td>';
                    echo '<td>' . $s[1] . '</td>';
                    echo '<td>'. $secciones->ContarFallasPorSeccion($s[0]) .' </td>';
                    echo '<td>' . $secciones->ContarFallasFaltantesPorSeccion($s[0]) .'</td>';
                    echo '<td>'. (intval($secciones->ContarFallasPorSeccion($s[0])) - intval($secciones->ContarFallasFaltantesPorSeccion($s[0]))) .'</td>';
                    echo '</tr>';
                    }
                  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Seccion</th>
                      <th>Total Fallas</th>
                      <th>Faltantes</th>
                      <th>Completadas</th>
                    </tr>
                  </tfoot>
                </table>
                      
              <!-- /.modal-dialog -->
      
                
            <!-- Fin contenido -->
          
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          Secciones
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

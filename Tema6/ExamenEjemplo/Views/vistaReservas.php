<?php
namespace reservas;
use reserva\Reserva;

class VistaReservas {

    public static function renderReservas($reservas) {
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESERVAS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Móvil</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Personas</th>
                  </tr>
                  </thead>
                  <tbody>
                
<?php
    foreach($reservas as $reserva) {
        echo "<tr>";

        echo "<td>".$reserva->getNombre()."</td>";
        echo "<td>".$reserva->getApellidos()."</td>";
        echo "<td>".$reserva->getEmail()."</td>";
        echo "<td>".$reserva->getMovil()."</td>";
        echo "<td>".$reserva->getFecha()."</td>"; 
        echo "<td>".$reserva->getHora()."</td>"; 
        echo "<td>".$reserva->getEstado()."</td>"; 
        echo "<td>".$reserva->getNComensales()."</td>"; 

        echo "<td>";
        echo "<a class='text-danger ml-2' id='deleteReserva' idReserva='".$reserva->getId()."'><i class='fas fa-trash-alt'></i></a>";
        echo "<a class='text-warning ml-2' id='updateReserva' idReservaModal='".$reserva->getId()."'><i class='fas fa-pencil-alt'></i></a>";

        echo "</td>";        
        echo "</tr>";
    }

?>

            </tbody>
            </table>


            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 


 <?php

    }


}

?>   
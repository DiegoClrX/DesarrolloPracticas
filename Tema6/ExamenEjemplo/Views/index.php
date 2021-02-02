<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESERVAS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">EL GUILI RESTAURANT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                RESERVAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id='verCliente'>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" id="nuevaReserva" data-toggle="modal" data-target="#modalReserva">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                INCIDENCIAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id='verincidencias'>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" id='nuevaincidencia'>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva</p>
                </a>
              </li>
            </ul>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id='contenido'>
   
 
</div>

  <footer class="main-footer">

    <strong>Copyright &copy; 2014-2020 JJ</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- MODAL RESERVA-->
<div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Reserva</h5>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="../Controller/controller.php">
            <input type="text" name="nombre" class="form-control" style=" margin-bottom:2%;" placeholder="Nombre" required>
            <input type="text" name="apellidos" class="form-control" style=" margin-bottom:2%;" placeholder="apellidos" required>
            <input type="email" name="email" class="form-control" style=" margin-bottom:2%;" placeholder="Email" required>
            <input type="number" name="movil" class="form-control" style=" margin-bottom:2%;" placeholder="Movil" required>
            <input type="date" name="fecha" class="form-control" style=" margin-bottom:2%;" placeholder="Fecha" required>
            <select name="hora" class="form-control" style="margin-top: 2%;" required>
              <option value="13">13:00</option>
              <option value="14">14:00</option>
              <option value="15">15:00</option>
              <option value="19">19:30</option>
              <option value="20">20:30</option>
              <option value="21">21:30</option>
            </select>
            <select name="estado" class="form-control" style="margin-top: 2%;" required>
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
            <input type="number" name="nComensales" class="form-control" style=" margin-top:2%;" placeholder="Numero de Personas" required>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="reservar">Reservar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- FINAL MODAL RESERVA -->

<!-- Modal para modificar reserva -->
<div id="modalUpdateReserva" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info">Modificar Reserva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

  <form id='formUpdate' method='post'>
          <input type="number" class="form-control" name="nComensales">
          <input type="date" name="fecha" id="" class="form-control" style="margin-top: 2%;">
          <select name="hora" class="form-control" style="margin-top: 2%;" required>
              <option value="13">13:00</option>
              <option value="14">14:00</option>
              <option value="15">15:00</option>
              <option value="19">19:30</option>
              <option value="20">20:30</option>
              <option value="21">21:30</option>
            </select>
          <input type='hidden' id='idReservaModal' name='id' value="">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" action='updateinc'>Modificar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal modificar incidencia -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


    <script>
        //VER RESERVA
        document.getElementById('verCliente').addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "verReservas"); //Acción al controlador para verclientes

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();

            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data;

            //Que la tabla coja los estilos
            $('#tabla').DataTable({"paging": true,"lengthChange": false,"searching": false,"ordering": true,"info": true,"autoWidth": false,"responsive": true,});

        });

        //BOTÓN BORRAR RESERVA
        document.getElementById("contenido").addEventListener("click", async function(e)  {
          let link = e.target.closest("a[id=deleteReserva]");
          if (link) {
            let formData = new FormData();
            formData.append("action", "deleteReserva");
            formData.append("id",link.getAttribute('idReserva'));
            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();
            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data; 

            //Que la tabla coja los estilos
            $('#tabla').DataTable({"paging": true,"lengthChange": false,"searching": false,"ordering": true,"info": true,"autoWidth": false,"responsive": true,});

          }
        });    

                
        //BOTÓN UPDATE RESERVA ABRIR FORM
        document.getElementById("contenido").addEventListener("click", async function(e)  {
          let link = e.target.closest("a[id=updateReserva]");
          if (link) {
            $('#modalUpdateReserva').modal('show');

            //Cargo en el modal el estado y el identificador de la incidencia
            var modal = $('#updateReserva');
            modal.find('#idReservaModal').val(link.getAttribute('idReservaModal'));
          }
        }); 

        //BOTÓN UPDATE ESTADO RESERVA EN EL MODAL
        document.getElementById("formUpdate").addEventListener("submit", async function(e) {
            console.log('updateReserva');
            e.preventDefault(); //Para que no envíe el formulario antes

            let formData = new FormData(e.target);
            formData.append("action", "updateReserva"); //Acción al controlador para insertar

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text(); 
            $('#modalUpdateReserva').modal('hide');
            document.getElementById("contenido").innerHTML = data; 

            //Que la tabla coja los estilos
            $('#tabla').DataTable({"paging": true,"lengthChange": false,"searching": false,"ordering": true,"info": true,"autoWidth": false,"responsive": true,});
        }); 
    </script>

  </body>
</html>
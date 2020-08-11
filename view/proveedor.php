<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIDISANO</title>

  <!-- Custom fonts for this template-->
  <link href="../src/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="../src/css/font.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../src/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="frmproveedor">
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <image src="../src/img/logo.png" height="110px" width="150px" style="border-radius:50px; padding-top:30px;">
        </a>

        <!-- Divider -->
        <br>

        <!-- Heading -->
        <div class="sidebar-heading">
          
        </div>
        <p></p>
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Tablas</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="../view/marcas.php">Marca</a>
              <a class="collapse-item" href="#">Proveedor</a>
              <a class="collapse-item" href="#">Producto</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item active">
          <a class="nav-link" href="../views/acercade.php">
          <i class="fas fa-fw fa-info-circle"></i>
            <span>Acerca de</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item active">
          <a class="nav-link" href="../php/cerrar.php">
          <i class="fas fa-fw fa-share"></i>
            <span>Cerrar sesión</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

      </ul>
      <!-- End of Sidebar -->

      
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" >

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Tabla de proveedores</h3>
                <br><button data-toggle="modal" data-target="#AProveedor" class="btn btn-primary" title="Agregar nuevo"><i class="fas fa-plus-circle fa-2x"></i></button>
              </div>

              <div class="modal fade" id="AProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!--Encabezo del modal-->
                      <h5 class="modal-title" id="">Agregar Proveedor</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!--Cuerpo del modal-->
                      <label>Proveedor</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="proveedor">
                      <label>Correo</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="correo">
                      <label>Telefono</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="telefono">
                    </div>
                    <div class="modal-footer">
                      <!--Pie del modal-->
                      <a href="#" class="btn btn-primary" @click="insertar" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-check"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Uproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!--Encabezo del modal-->
                      <h5 class="modal-title" id="">Modificar Proveedor</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!--Cuerpo del modal-->
                      <label>Proveedor</label>
                      <input style="display:none" type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="id-update">
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="proveedor-update">
                      <label>Correo</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="correo-update">
                      <label>Telefono</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="telefono-update">
                    </div>
                    <div class="modal-footer">
                      <!--Pie del modal-->
                      <a href="#" class="btn btn-primary" @click="actualizar" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-check"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Dproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!--Encabezo del modal-->
                      <h5 class="modal-title" id="">Eliminar Proveedor</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!--Cuerpo del modal-->
                      <label>Marca</label>
                      <input style="display:none" type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="id-delete">
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="marca-delete">
                      <label>Correo</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="correo-delete">
                      <label>Telefono</label>
                      <input type="text" class="form-control form-control-user" placeholder="" aria-label="Search" aria-describedby="basic-addon2" id="telefono-delete">
                    </div>
                    <div class="modal-footer">
                      <!--Pie del modal-->
                      <a href="#" class="btn btn-primary" @click="eliminar" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-check"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Clave</th>
                        <th>Nombre del proveedor</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(proveedor,index) in proveedores"  v-show="index >=  anterior && index < siguiente">                                
                        <td>{{proveedor.intClaveProveedor}}</td>                                
                        <td>{{proveedor.vchProveedor}}</td>
                        <td>{{proveedor.vchCorreo}}</td>
                        <td>{{proveedor.vchTelefono}}</td>
                        <td>
                          <div class="btn-group" role="group">
                            <button class="btn btn-secondary" title="Editar" @click="setDatosUpdate(proveedor)" data-toggle="modal" data-target="#Uproveedor"><i class="fas fa-pencil-alt"></i></button>    
                            <button class="btn btn-danger" title="Eliminar" @click="setDatosDelete(proveedor)"  data-toggle="modal" data-target="#Dproveedor"><i class="fas fa-trash-alt"></i></button>      
								          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <ul class="pagination">
                    <li v-bind:class="ocultarMostrarAnterior">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true" @click="prev">Anterior</a>
                    </li>
                    <li v-for="pagina in paginas" class="page-item">
                      <a class="page-link" @click ="paginar(pagina)" href="#">{{pagina}}</a>
                    </li>
                    <li v-bind:class="ocultarMostrarSiguiente">
                      <a class="page-link" href="#" @click="next">Siguiente</a>
                    </li>
              </ul>
          </div>
          <!-- /.container-fluid -->  

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; El mejor sitio :P</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="../src/vendor/jquery/jquery.min.js"></script>
  <script src="../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../src/js/vue.js"></script>
  <script src="../src/js/axios.min.js"></script>        
  <script src="../src/js/crud_proveedor.js"></script> 

</body>

</html>
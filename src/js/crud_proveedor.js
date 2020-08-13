var URL="../controller/ProveedorControl.php";
var d = document;
const PROVEEDOR = new Vue({
    el:"#frmproveedor",
    data: {
        titleModule : 'Proveedor1',
        proveedores : [],
        totalRegistros:0,
        paginas:1,
        itemsPagina:5,
        paginaActual: 1,
        siguiente: '',
        anterior: '',
        ocultarMostrarSiguiente: '',
        ocultarMostrarAnterior:  ''  
        // alertgeneral: null,
        // messagealert: null,
        // alerticon: null
    },

    mounted:function(){
        this.cargarDatos();
        this.contarRegistros();
        this.paginar(1);
    },

    methods: {
        cargarDatos:function() {
            let formdata = new FormData();
            formdata.append("option","showdata")
            axios.post(URL,formdata)
                .then(function (response) {
                    console.log(response);
                    PROVEEDOR.proveedores = response.data;
                })
        },

        contarRegistros:function() {
            let formdata = new FormData();
            formdata.append("option","count")
            axios.post(URL,formdata)
                .then(function (response) {
                    PROVEEDOR.totalRegistros = response.data[0].totalRegister;
                    let totalRegistroInt = parseInt(PROVEEDOR.totalRegistros);
                    PROVEEDOR.paginas = Math.ceil(  totalRegistroInt  / PROVEEDOR.itemsPagina)
                    console.log(PROVEEDOR.paginas);
                })
        },
        insertar:function(){
            let datos = {
                proveedor: d.getElementById("proveedor").value,
                correo: d.getElementById("correo").value,
                telefono: d.getElementById("telefono").value
            };
            console.log(datos)

            if(PROVEEDOR.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = PROVEEDOR.toFormData(datos,"insert");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        PROVEEDOR.cargarDatos();
                        // MARCA.alertas("myalert alert-correct","Se ha registrado exitosamente","fas fa-check bg-correct");
                        alert("Se ha registrado exitosamente");
                        PROVEEDOR.limpiarCajas();
                        this.contarRegistros();
                        this.paginar(this.paginaActual);
                    }else{
                        // MARCA.alertas("myalert alert-fail","No pudo registrarce" + response.data, "fas fa-times bg-fail");
                       alert("No pudo registrarce" + response.data);
                    }
                })
            }
        },
        eliminar: function(){
            let datos = {
                id:d.getElementById('id-delete').value,
            };
            console.log(datos)
            if(PROVEEDOR.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = PROVEEDOR.toFormData(datos,"delete");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        PROVEEDOR.cargarDatos();
                        // MARCA.alertas("myalert alert-correct","Se ha registrado exitosamente","fas fa-check bg-correct");
                        alert("Se ha eliminado exitosamente");
                        this.contarRegistros();
                        this.paginar(this.paginaActual);
                    }else{
                        // MARCA.alertas("myalert alert-fail","No pudo registrarce" + response.data, "fas fa-times bg-fail");
                       alert("No pudo eliminarce" + response.data);
                    }
                })
            }
        },
        actualizar: function() {
            let datos = {
                id:d.getElementById('id-update').value,
                proveedor:d.getElementById('proveedor-update').value,
                correo:d.getElementById('correo-update').value,
                telefono:d.getElementById('telefono-update').value,
            };
            console.log(datos)
            if(PROVEEDOR.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = PROVEEDOR.toFormData(datos,"update");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        PROVEEDOR.cargarDatos();
                        alert("Se ha actulizado exitosamente");
                        this.contarRegistros();
                        this.paginar(this.paginaActual);
                    }else{
                       alert("No pudo actulizarce" + response.data);
                    }
                })
            }
        },
        setDatosUpdate: function(proveedor){
            d.getElementById('id-update').value = proveedor.intClaveProveedor;
            d.getElementById('proveedor-update').value = proveedor.vchProveedor;
            d.getElementById('correo-update').value = proveedor.vchCorreo;
            d.getElementById('telefono-update').value = proveedor.vchTelefono;
        },
        setDatosDelete: function(proveedor){
            d.getElementById('id-delete').value = proveedor.intClaveProveedor;
            d.getElementById('proveedor-delete').value = proveedor.vchProveedor;
            d.getElementById('correo-delete').value = proveedor.vchCorreo;
            d.getElementById('telefono-delete').value = proveedor.vchTelefono;
        },
        cajasVacias:function(caja){
            if(caja.proveedor == 0 || caja.correo == 0 || caja.telefono == 0){
                return true;
            }
            return false;
        },
        alertas:function(classe, message, iconName){
            PROVEEDOR.alertgeneral = classe;
            PROVEEDOR.messagealert = message;
            PROVEEDOR.alerticon = iconName;
        },
        toFormData: (obj, option) => {
            let fd = new FormData();
            fd.append('option', option);
              for (let i in obj) {
                fd.append(i, obj[i]);
              }
            return fd;
        },
        limpiarCajas: function(){
            d.getElementById("proveedor").value = "";
            d.getElementById("correo").value = "";
            d.getElementById("telefono").value = "";
        },
        paginar: function(pagina){
            this.paginaActual = pagina;
            this.anterior = (( this.paginaActual -1) * this.itemsPagina);
            this.siguiente = this.paginaActual * this.itemsPagina;

            this.paginaActual == 1 ? this.ocultarMostrarAnterior = "page-item disabled" : this.ocultarMostrarAnterior = "page-item";
            this.paginaActual == this.paginas ? this.ocultarMostrarSiguiente = "page-item disabled" : this.ocultarMostrarSiguiente = "page-item";
        },
        prev:function (){
            this.paginaActual =  this.paginaActual - 1;
            
            this.paginar(this.paginaActual);
        },
        next: function(){
            this.paginaActual = this.paginaActual + 1;
            this.paginar(this.paginaActual);
        },
    }
});
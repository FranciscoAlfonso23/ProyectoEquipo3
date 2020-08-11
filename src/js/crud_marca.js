var URL="../controller/MarcaControl.php";
var d = document;
const MARCA = new Vue({
    el:"#frmmarca",
    data: {
        titleModule : 'Marcas2',
        marcas : [],
        totalRegistros:0,
        paginas:1,
        itemsPagina:2,
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
                    MARCA.marcas = response.data;
                })
        },

        contarRegistros:function() {
            let formdata = new FormData();
            formdata.append("option","count")
            axios.post(URL,formdata)
                .then(function (response) {
                    MARCA.totalRegistros = response.data[0].totalRegister;
                    let totalRegistroInt = parseInt(MARCA.totalRegistros);
                    MARCA.paginas = Math.ceil(  totalRegistroInt  / MARCA.itemsPagina)
                    console.log(MARCA.paginas);
                })
        },
        insertar:function(){
            let datos = {
                marca: d.getElementById("marca").value,
            };
            console.log(datos)
            if(MARCA.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = MARCA.toFormData(datos,"insert");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        MARCA.cargarDatos();
                        // MARCA.alertas("myalert alert-correct","Se ha registrado exitosamente","fas fa-check bg-correct");
                        alert("Se ha registrado exitosamente");
                        MARCA.limpiarCajas();
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
            if(MARCA.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = MARCA.toFormData(datos,"delete");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        MARCA.cargarDatos();
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
                marca:d.getElementById('marca-update').value,
            };
            console.log(datos)
            if(MARCA.cajasVacias(datos)){
                alert("Campos vacios");
            }else{
                let formdata = MARCA.toFormData(datos,"update");
                axios.post(URL,formdata)
                .then(response => {
                    console.info(response.data);
                    if (!response.data){
                        MARCA.cargarDatos();
                        // MARCA.alertas("myalert alert-correct","Se ha registrado exitosamente","fas fa-check bg-correct");
                        alert("Se ha actulizado exitosamente");
                        this.contarRegistros();
                        this.paginar(this.paginaActual);
                    }else{
                        // MARCA.alertas("myalert alert-fail","No pudo registrarce" + response.data, "fas fa-times bg-fail");
                       alert("No pudo actulizarce" + response.data);
                    }
                })
            }
        },
        setDatosUpdate: function(marca){
            d.getElementById('id-update').value = marca.intClaveMarca;
            d.getElementById('marca-update').value = marca.vchMarca;
        },
        setDatosDelete: function(marca){
            d.getElementById('id-delete').value = marca.intClaveMarca;
            d.getElementById('marca-delete').value = marca.vchMarca;
        },
        cajasVacias:function(caja){
            if(caja.marca == 0){
                return true;
            }
            return false;
        },
        alertas:function(classe, message, iconName){
            MARCA.alertgeneral = classe;
            MARCA.messagealert = message;
            MARCA.alerticon = iconName;
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
            d.getElementById("marca").value = "";
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
function init() {	
	var apiMascota='http://localhost/Mascotas_Cetzal_Alvarez/public/apiMascota';
	var apiEspecie='http://localhost/Mascotas_Cetzal_Alvarez/public/apiEspecie';
	new Vue({
		el:"#mascota",

		data:{
			prueba:'ESTA ES UNA PRUEBA claro',
			mascotas:[],
			especies:[],
			razas:[],
			nombre:'',
			edad:'',
			peso:'',
			genero:'',
			agregando:true,
			id_mascota:'',
			id_especie:'',
			id_raza:'',

			cantidad:1,
			precio:0,
			buscar:'',
		},

		//se ejecuta automaticamente cuando la pagina se crea
		created:function(){
			this.obtenerMascotas();
			this.obtenerEspecies();
		},
		//inicio de methods
		methods:{
			//mascotas INICIO
			obtenerMascotas:function(){
				this.$http.get(apiMascota).then(function(j){
					this.mascotas=j.data;
					console.log(j.data);
				})
			},
			mostrarModal:function(){
				this.agregando=true;
					this.nombre='';
					this.edad='';
					this.peso='';
					this.genero='';
					this.id_especie='';
				$('#modalMascota').modal('show');

			},
			guardarMascota:function(){

				// se construye el json para enviar al controlador
				var mascota={
					nombre:this.nombre,
					edad:this.edad,
					peso:this.peso,
					genero:this.genero,
					id_especie:this.id_especie,
					};
				//Se envia los datos en json al controlador

				//aqui empieza el error no envia los datos Uncaught (in promise)
				this.$http.post(apiMascota,mascota).then(function(j){
					
					this.obtenerMascotas();
					this.nombre='';
					this.edad='';
					this.peso='';
					this.genero='';
					this.id_especie='';
				//aqui termina el error
				}).catch(function(j){
					console.log(j);
					this.nombre='';
					this.edad='';
					this.peso='';
					this.genero='';
				});
					

				$('#modalMascota').modal('hide');
				console.log(mascota);
				
			},
			eliminarMascota:function(id){
				var confir= confirm('¿estas seguro de eliminar la mascota?')
				if(confir){
					//comienza el error  Uncaught (in promise)
					this.$http.delete(apiMascota + '/' + id).then(function(json){
						this.obtenerMascotas();
						//termina el error//
					}).catch(function(json){

					});
				}
			},
			editandoMascota:function(id){
				this.agregando=false;
				this.id_mascota=id;

				this.$http.get(apiMascota + '/' + id).then(function(json){
					this.nombre=json.data.nombre;
					this.edad=json.data.edad;
					this.genero=json.data.genero;
					this.peso=json.data.peso;
					//console.log(json.data);
				})
				$('#modalMascota').modal('show');
			},
			actualizarMascota:function(){
				alert('Estamos modificando una mascota');
				var jsonMascota = {nombre:this.nombre,
									edad:this.edad,
									peso:this.peso,
									genero:this.genero};
									//console.log(jsonMascota);
				//Uncaught (in promise) no atrapado en promesa
				this.$http.patch(apiMascota + '/' + this.id_mascota,jsonMascota).then(function(json){
					this.obtenerMascotas();
				});
				$('#modalMascota').modal('hide');

			},//mascotas FIN
			//especies INICIO
			obtenerEspecies:function(){
			this.$http.get(apiEspecie).then(function(json){
				this.especies=json.data;
				console.log(json.data);
			});
		
			},
			obtenerRazas(e){
				var id_especie=e.target.value;
				//console.log(id_especie);
				this.$http.get(apiEspecie + '/getRazas/' + id_especie).then(function(j){
					this.razas=j.data;
					console.log(j.data);
				});
			},


		},//fin de methods
		
		//empieza computed
		computed:{  
			total:function(){
				return this.cantidad * this.precio;

			},
			filtroMascotas:function(){
				return this.mascotas.filter((mascota)=>{
					return mascota.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) //||
					//hay algo mal aqui ya que cuando lo pongo desaparece toda la informacion en el navegador
						//return mascota.especie.especie.toLowerCase().match(this.buscar.toLowerCase().trim())

				});
			},

		},
		//fin de computed 

	});
} window.onload = init;
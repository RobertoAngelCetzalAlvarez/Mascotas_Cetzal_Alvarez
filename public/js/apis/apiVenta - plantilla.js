function init() {
	var apiProducto='http://localhost/Mascotas_Cetzal_Alvarez/public/apiProducto';// se crea para tener acceso global

	new Vue({
		el:'#apiVenta',

		data:{
	      mensaje:'HOLA MUNDO CRUEL',
	      sku:'',
		},
		//se ejecuta automaticamente cuando la pagina se crea
		created:function(){
			

		},
		// INICIO DE METHODS
		methods:{
			//Obtiene el listado de todas las especies
			getEspecies:function(){
				},
		},

		//FIN DE METHODS
		computed:{
			//
		},

	});
} window.onload = init;
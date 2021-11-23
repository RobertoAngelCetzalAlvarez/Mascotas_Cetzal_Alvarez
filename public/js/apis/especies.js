function init() {
	var apiEspecie='http://localhost/Mascotas_Cetzal_Alvarez/public/apiEspecie';

	new Vue({
		el:'#apiEspecies',

		data:{
	      mensaje:'HOLA MUNDO CRUEL',
	      especies:[],
		},
		//se ejecuta automaticamente cuando la pagina se crea
		created:function(){
			this.getEspecies();
		},
		// INICIO DE METHODS
		methods:{
			getEspecies:function(){
				this.$http.get(apiEspecie).then(function(j){
					this.especies=j.data;
				}).catch(function(j){
				console.log(j); 
			});
			}

		},
		//FIN DE METHODS
		computed:{


		},

	})
} window.onload = init;
<template>
	<div>
    <h1>Benutzer</h1>
    <div class="mb-3">
      <div class="row">
        <div class="col-md-12 text-right">
          <div class="btn btn-primary" data-toggle="modal" data-target="#benutzerAnlegenModal">Benutzer anlegen</div>
        </div>
      </div>
    </div>
    <table class="table">
      <tbody>
        <tr>
          <th>Nr.</th>
          <th>Name</th>
          <th>E-Mail</th>
          <th>Benutzername</th>
          <th>Aktion</th>
        </tr>
        <tr v-for="benutzer in benutzers">
          <td>{{benutzer.id}}</td>
          <td>{{benutzer.firstname}} {{benutzer.lastname}}</td>
          <td>{{benutzer.email}}</td>
          <td>{{benutzer.username}}</td>
          <td>
          	<div class="btn btn-primary btn-sm" v-on:click="openBenuter(benutzer.id)" data-toggle="modal" data-target="#benutzerUpdateModal"><i class="fas fa-edit"></i></div>
          	<div class="btn btn-danger btn-sm" v-on:click="openBenuter(benutzer.id)" data-toggle="modal" data-target="#benutzerUpdateModal"><i class="fas fa-trash"></i></div>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="benutzerAnlegenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Benutzer anlegen</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	        	<!-- Salutation -->
	        	<div class="form-group">
	        		<label class="col-md-4 col-form-label" for="salutation"><!--Anrede-->Salutation</label>
	        		<select id="salutation" name="salutation" v-model="user.salutation" class="form-control">
                          <option value="">auswählen</option>
                          <option value="mr">Herr</option>
                          <option value="mrs">Frau</option>
                        </select>
	        	</div>

	        	<!-- First Name -->
	        	<div class="form-group">
				    <label for="firstname">First Name</label>
				    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Vorname" v-model="user.firstname">
			    </div>

			    <!-- Last Name -->
			    <div class="form-group">
				    <label for="lastname">Last Name</label>
				    <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="Nachname" v-model="user.lastname">
			    </div>

			    <!-- Username -->
			    <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" placeholder="Benutzername" v-model="user.username">
			    </div>

			    <!-- Email -->
			    <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Email@email.com" v-model="user.email">
			    </div>

			    <!-- Password -->
			    <!-- Text input-->
                    <div class="form-group">
                      <label for="password">Passwort</label>
                        <input id="password" name="password" v-model="user.password" type="text" placeholder="Passwort" class="form-control">
                    </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <!--<button type="button" class="btn btn-primary" @click="closeModal">Close Modal</button>-->
	        <button type="button" class="btn btn-primary" @click="createUser">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

  </div>
</template>

<script>
	
export default{
	data(){
		return{
			benutzers:[],
			errors:{},
			user:{
	        salutation:'',
	        firstname:'',
	        lastname:'',
	        email:'',
	        password:'',
	        repeat_password:'',
	        username:''
	      }
		}
	},
	created() {
	    var vm = this;
	    vm.getAllBenutzers();    
		/*axios.get('/benutzer/all').then((response) => this.benutzers = response.data)
                  .catch((error) => this.errors = error.response.data.errors);*/
  	},
	methods: {
		getAllBenutzers(){
			var vm = this;

			axios.get('/allbenutzers')
		  .then(function (response) {
		    console.log(response);
		    vm.benutzers = response.data; // assign value to benutzers array		    	
		  })
		  .catch(function (error) {
		    console.log(error);
		    vm.errors = error.response.data.errors
		  });
		},
		createUser(){			
			/*axios.post('/benutzer',this.$data).then((response) => console.log(response))
				  .catch((error) => console.log(error));*/
			let vm = this;	  

			axios.post('/benutzer', this.$data.user)
			  .then(function (response) {
			    console.log(response);
			    // check if response was successful
			    if (response.status == 200){
			    	console.log("user created successfully!");
			    	vm.closeModal(); // close Modal
			    	vm.getAllBenutzers(); // refresh or get all Benutzers
			    }
			  })
			  .catch(function (error) {
			    console.log(error);
			  });
		},
		closeModal(){
			$('#benutzerAnlegenModal').modal('toggle')
			//$('#benutzerAnlegenModal').modal('hide')
		}
	}
}

</script>
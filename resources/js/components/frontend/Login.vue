<template>
  <div>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" v-model="email" placeholder="Email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" v-model="password" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
     <div class="form-group has-feedback">
      <label for="">Seleccionar rol</label>
     <select v-model="role" class="form-control">
        <option value="Administrador">Rol Administrador</option>
        <option value="Vendedor">Rol Vendedor</option>
     </select>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary btn-block btn-flat" v-on:click.prevent="login">Ingresar</button>
    </div>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        password : null,
        email : null,
        role : 'Administrador'
      }
    },
    mounted(){   
      
    },
    methods:{
      login(){
        let data = {
          email : this.email,
          password : this.password,
          role : this.role
        };
        axios.post('api/v1/auth/login' , data)
          .then(res => {                    
                if (res.data.success) {
                  this.$store.state.token = res.data.token;
                  location.href= res.data.redirect;
                  // this.redirect(res.data.redirect);
                }else{
                  this.$toast.error(res.data.message);
                }
          })        
        
      }
    }
  }
</script>

<style>
  .v-toast__item--error {
      background-color: #f30000;
      min-width: 300px;
  }

  .v-toast__item .v-toast__text {
    padding: 5px;
    font-size: 17px;
    font-weight: 600;
}
</style>
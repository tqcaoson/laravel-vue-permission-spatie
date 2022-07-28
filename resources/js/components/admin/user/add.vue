<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'userSave' enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Select Name</label>
                                     <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.name" placeholder="Enter Name"
                                    :class="{ 'is-invalid': form.errors.has('name') } " name="name">
                                    <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Select Email</label>
                                     <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.email" placeholder="Enter Email"
                                    :class="{ 'is-invalid': form.errors.has('email') } " name="email">
                                    <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>

                            </div>


                             <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Select Role</label>
                                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="form.roles"
                                    :class="{ 'is-invalid': form.errors.has('roles') } " name="roles">
                                  
                                    <option :value="role.id" v-for="role in getRoleList" :key="role.id">{{role.name}}</option>
                                    </select>
                                        <has-error :form="form" field="roles"></has-error>
                                    </div>
                                </div>

                            </div>

                           

                        </div>

                        <div class="col-md-5">

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                     <input type="password" class="form-control" id="exampleInputEmail1" v-model="form.password" placeholder="Enter Password"
                                    :class="{ 'is-invalid': form.errors.has('password') } " name="password">
                                    <has-error :form="form" field="password"></has-error>
                                    </div>

                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                     <input type="password" class="form-control" id="exampleInputEmail1" v-model="form.cpassword" placeholder="Confirm Password"
                                    :class="{ 'is-invalid': form.errors.has('cpassword') } " name="cpassword">
                                    <has-error :form="form" field="cpassword"></has-error>
                                    </div>
                                </div>

                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                   <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    <button type="submit" @click="goBack" class="btn btn-sm btn-danger">Back</button>
                                    </div>
                                </div>

                            </div>
                            
                            
                        </div>
                    </div>
                  
                </div>
                <!-- /.card-body -->

               
              </form>
            </div>
          
          </div>
           </div>
          <!-- /.col -->
    
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
</template>

<script>
export default {
  name: "Save",

  mounted(){
      this.$store.dispatch('getRoleList')
    },
    computed:{
      getRoleList(){
       
        return this.$store.getters.roleList
      }


    },

  data () {
    return {
      // Create a new form instance
      form: new Form({
        name: '',
        email:'',
        password:'',
        cpassword:'',
        roles:'',
        
      })
    }
  },

  methods: {
    
    userSave () {
      // Submit the form via a POST request
      this.form.post('/userSave')
        .then((response) => {
           this.$router.push('/user');
           Toast.fire({
            icon: 'success',
            title: 'User added successfully'
          })
           
       }).catch(()=>{

       });
    },

    goBack(){
      this.$router.push('/user');
    },

  }

}
</script>

<style>
 .right-border{
     border-right:1px solid black;
 }
</style>
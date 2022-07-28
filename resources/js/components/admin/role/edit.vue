<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'roleEdit'>
                <div class="row">
                    <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.name" placeholder="Enter Role Name"
                    :class="{ 'is-invalid': form.errors.has('name') } " name="name">
                     <has-error :form="form" field="name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                   <button type="submit" @click="goBack" class="btn btn-sm btn-danger">Back</button>
                </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">List</div>
                                <div class="col-md-3">Add</div>
                                <div class="col-md-3">Edit</div>
                                <div class="col-md-3">Delete</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3" v-for ="permission in getPermissionList" :key="permission.id">
                                <div class="row">
                                    <div class="col-md-3" >
                                         <div class="form-group">
                                           
                                            <input type="checkbox" class="form-control" id="exampleInputEmail1" v-model="form.permission"  :value="permission.id"
                                            :class="{ 'is-invalid': form.errors.has('permission') } " name="permission">
                                            <has-error :form="form" field="permission"></has-error>
                                         </div>
                                    </div>
                                    <div class="col-md-9">
                                        {{permission.name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
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
  name: "Edit",

  data () {
    return {
     
      // Create a new form instance
      form: new Form({
        name: '',
        permission:[],
        
      })
    }
  },
    mounted(){
      this.$store.dispatch('getPermissionList')
    },

    created(){
        axios.get('/roleById/'+this.$route.params.roleId).then((response)=>{
           this.form.name = response.data.role.name;
          
           for(let i=0;i<=response.data.permission.length;i++){
             for(let j=1;j<=response.data.SelectedRoleLength;j++){
              
               if(response.data.permission[i].id == response.data.rolePermissions[j] ){
                 this.form.permission[i]=response.data.rolePermissions[j];
               }
             }
             
           }
        });
        
    },
    computed:{
      getPermissionList(){
       
        return this.$store.getters.permissionList
      }


    },



  methods: {
    roleEdit () {
      // Submit the form via a POST request
       this.form.post(`/roleUpdate/${this.$route.params.roleId}`)
        .then((response) => {
           this.$router.push('/role');
           Toast.fire({
            icon: 'success',
            title: 'Role edited successfully'
          })
           
       }).catch(()=>{

       });
    },

    goBack(){
      this.$router.push('/role');
    }
  }

}
</script>

<style>

</style>
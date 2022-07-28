<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
                <div class="text-right">
                    <router-link to="/addUser" class="btn btn-sm btn-primary"> Add </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for = "(user,index) in getUserList" :key = "user.id">
                      <td>{{index+1}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.role_name}}</td>
                      <td>
                         <div class="">
                             <router-link :to="`/editUser/${user.id}`" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></router-link>
                             <a  @click.prevent ="userDelete(user.id)" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                         </div>
                      </td>
                     
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->

            
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
  name: "List",

    mounted(){
      this.$store.dispatch('getUserList')
    },
    computed:{
      getUserList(){
       
        return this.$store.getters.userList
      }


    },
    
 

  methods: {
    userDelete(id){
      axios.get('/userDelete/'+id).then((response)=>{
         this.$store.dispatch('getUserList')
         Toast.fire({
            icon: 'success',
            title: 'User deleted successfully'
          })
      })
    }
   
  }

}
</script>

<style>

</style>
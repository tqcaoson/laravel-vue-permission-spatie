<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Content List</h3>
                <div class="text-right">
                    <router-link to="/addConfiguration" class="btn btn-sm btn-primary"> Add </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Header</th>
                       <th>Slogan</th>
                       <th>Contact Email</th>
                        <th>Contact Mobile</th>
                         <th>Footer</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for = "(config,index) in getConfigList" :key = "config.id">
                      <td>{{index+1}}</td>
                      <td>{{config.header_text}}</td>
                       <td>{{config.slogan_text}}</td>
                     
                      <td>{{config.contact_email}}</td>
                      <td>{{config.contact_mobile}}</td>
                       <td>{{config.footer_text}}</td>
                      
                      <td>
                         <div class="">
                             <router-link :to="`/editConfiguration/${config.id}`" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></router-link>
                             <a  @click.prevent ="configDelete(config.id)" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
      this.$store.dispatch('getConfigList')
    },
    computed:{
      getConfigList(){
       console.log(this.$store.getters.configList)
        return this.$store.getters.configList
      }


    },
    
 

  methods: {
    configDelete(id){
      axios.get('/configDelete/'+id).then((response)=>{
         this.$store.dispatch('getConfigList')
         Toast.fire({
            icon: 'success',
            title: 'Configuration deleted successfully'
          })
      })
    }
   
  }

}
</script>

<style>

</style>
<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <div class="text-right">
                    <router-link to="/addCategory" class="btn btn-sm btn-primary"> Add </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for = "(categoryList,index) in getCategoryList" :key = "categoryList.id">
                      <td>{{index+1}}</td>
                      <td>{{categoryList.cat_name}}</td>
                      <td>
                         <div class="">
                             <router-link :to="`/editCategory/${categoryList.id}`" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></router-link>
                             <a  @click.prevent ="categoryDelete(categoryList.id)" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
      this.$store.dispatch('getCategoryList')
    },
    computed:{
      getCategoryList(){
       
        return this.$store.getters.categoryList
      }


    },
    
 

  methods: {
    categoryDelete(id){
      axios.get('/categoryDelete/'+id).then((response)=>{
         this.$store.dispatch('getCategoryList')
         Toast.fire({
            icon: 'success',
            title: 'Category deleted successfully'
          })
      })
    }
   
  }

}
</script>

<style>

</style>
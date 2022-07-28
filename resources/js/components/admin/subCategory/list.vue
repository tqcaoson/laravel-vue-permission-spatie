<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
                <div class="text-right">
                    <router-link to="/addSubCategory" class="btn btn-sm btn-primary"> Add </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name</th>
                       <th>SubCategory Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for = "(subCategoryList,index) in getSubCategoryList" :key = "subCategoryList.id">
                      <td>{{index+1}}</td>
                      <td>{{subCategoryList.categories.cat_name}}</td>
                      <td>{{subCategoryList.sub_cat_name}}</td>
                      <td>
                         <div class="">
                             <router-link :to="`/editSubCategory/${subCategoryList.id}`" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></router-link>
                             <a  @click.prevent ="subCategoryDelete(subCategoryList.id)" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
      this.$store.dispatch('getSubCategoryList')
    },
    computed:{
      getSubCategoryList(){
       
        return this.$store.getters.subCategoryList
      }


    },
    
 

  methods: {
    subCategoryDelete(id){
      axios.get('/subCategoryDelete/'+id).then((response)=>{
         this.$store.dispatch('getSubCategoryList')
         Toast.fire({
            icon: 'success',
            title: 'SubCategory deleted successfully'
          })
      })
    }
   
  }

}
</script>

<style>

</style>
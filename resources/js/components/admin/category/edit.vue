<template>
<div>
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'categoryUpdate'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.cat_name" placeholder="Enter Category Name"
                    :class="{ 'is-invalid': form.errors.has('cat_name') } " name="cat_name">
                     <has-error :form="form" field="cat_name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                   <button type="submit" @click="goBack" class="btn btn-sm btn-danger">Back</button>
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

   mounted(){
        axios.get('/categoryById/'+this.$route.params.categoryId).then((response)=>{
            this.form.fill(response.data.categoryById)
        })
    },


  data () {
    return {

      // Create a new form instance
      form: new Form({
        cat_name: '',
        
      })
    }
  },

  methods: {
    categoryUpdate () {
      // Submit the form via a POST request
      this.form.post(`/categoryUpdate/${this.$route.params.categoryId}`)
        .then((response) => {
           this.$router.push('/category');
           Toast.fire({
            icon: 'success',
            title: 'Category updated successfully'
          })
           
       }).catch(()=>{

       });
    },

    goBack(){
      this.$router.push('/category');
    }
  }

}
</script>

<style>

</style>
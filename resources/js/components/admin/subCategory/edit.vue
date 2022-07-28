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
                <h3 class="card-title">Update Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'subCategoryEdit'>
                <div class="card-body">

                    <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="form.cat_id" placeholder="Enter Name"
                    :class="{ 'is-invalid': form.errors.has('cat_id') } " name="cat_id">
                   
                    <option :value="category.id" v-for="category in getCategoryList" :key="category.id">{{category.cat_name}}</option>
                    </select>
                        <has-error :form="form" field="cat_id"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.sub_cat_name" placeholder="Enter Name"
                        :class="{ 'is-invalid': form.errors.has('sub_cat_name') } " name="sub_cat_name">
                        <has-error :form="form" field="sub_cat_name"></has-error>
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
      this.$store.dispatch('getCategoryList')
    },
    created(){
        axios.get('/subCategoryById/'+this.$route.params.subCategoryId).then((response)=>{
            this.form.fill(response.data.subCategoryById)
        })
    },
    computed:{
      getCategoryList(){
       
        return this.$store.getters.categoryList
      }


    },

  data () {
    return {
      // Create a new form instance
      form: new Form({
        sub_cat_name: '',
        cat_id:'',
        
      })
    }
  },

  methods: {
    subCategoryEdit () {
      // Submit the form via a POST request
      this.form.post(`/subCategoryUpdate/${this.$route.params.subCategoryId}`)
        .then((response) => {
           this.$router.push('/subCategory');
           Toast.fire({
            icon: 'success',
            title: 'Sub Category edited successfully'
          })
           
       }).catch(()=>{

       });
    },

    goBack(){
      this.$router.push('/subCategory');
    }
  }

}
</script>

<style>

</style>
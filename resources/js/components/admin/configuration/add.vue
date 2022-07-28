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
                <h3 class="card-title">Add Website Configuration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'configSave' enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Header</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="header_text" placeholder="Enter Header Text"
                                         name="header_text">
                                         <div v-if = "errors && errors.header_text">{{errors.header_text[0]}}</div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Slogan</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="slogan_text" placeholder="Enter Slogan Text"
                                         name="slogan_text">
                                         <div v-if = "errors && errors.slogan_text">{{errors.slogan_text[0]}}</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" v-model="contact_email" placeholder="Enter Contact Email"
                                         name="contact_email">
                                         <div v-if = "errors && errors.contact_email">{{errors.contact_email[0]}}</div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Phone No.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="contact_mobile" placeholder="Enter Mobile Number"
                                         name="contact_mobile">
                                         <div v-if = "errors && errors.contact_mobile">{{errors.contact_mobile[0]}}</div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-5">

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload Logo</label>
                                       
                                  <input type="file" name="logo" class="form-control" id="inputFileUpload" @change = "getFile"
                                  >
                                     <div v-if = "errors && errors.logo">{{errors.logo[0]}}</div>
                                        
                                    </div>

                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Footer</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="footer_text" placeholder="Enter Footer Text"
                                         name="footer_text">
                                         <div v-if = "errors && errors.footer_text">{{errors.footer_text[0]}}</div>
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
      this.$store.dispatch('getCategoryList')
    },
    computed:{
      getCategoryList(){
       
        return this.$store.getters.categoryList
      }


    },

  data () {
    return {
      
       header_text:'',
       slogan_text:'',
       contact_email:'',
       contact_mobile:'',
       footer_text:'',
       file:'',
       errors:{},
     
     
    }
  },

  methods: {

    getSubCategory(){
      
       axios.get('/getSubCategoryByCategoryId/'+this.category_id).then((response)=>{
            this.subCategory = response.data.subCategoryList;
        })
    },

    getFile(e){
        this.file = e.target.files[0];
        if(this.file.size >2097152){
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'File is Larger than 2MB !',
          
        })
        
        }
    },
    
    configSave () {
      // Submit the form via a POST request
     let form = new FormData;
     form.append('logo',this.file);
     form.append('header_text',this.header_text);
     form.append('slogan_text',this.slogan_text);
     form.append('contact_email',this.contact_email);
     form.append('contact_mobile',this.contact_mobile);
     form.append('footer_text',this.footer_text);
      
      axios.post('/configSave',form)
        .then((response) => {
           this.$router.push('/configuration');
           Toast.fire({
            icon: 'success',
            title: 'Configuration added successfully'
          })
           
       }).catch(error=>{
          this.errors = error.response.data.errors;
       });
    },

    goBack(){
      this.$router.push('/configuration');
    },

  }

}
</script>

<style>
 .right-border{
     border-right:1px solid black;
 }
</style>
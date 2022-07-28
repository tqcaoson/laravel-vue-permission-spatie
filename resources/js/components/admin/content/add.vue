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
                <h3 class="card-title">Add New Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent = 'contentSave' enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Select Category</label>
                                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="category_id" placeholder="Enter Name"
                                     name="category_id" @change = "getSubCategory">
                                    
                                    <option :value="category.id" v-for="category in getCategoryList" :key="category.id">{{category.cat_name}}</option>
                                    </select>
                                     <div v-if = "errors && errors.category_id">{{errors.category_id[0]}}</div>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Select SubCategory</label>
                                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="subCategory_id" placeholder="Enter SubCategory"
                                     name="subCategory_id">
                                
                                    <option :value="sub_cat.id" v-for="sub_cat in subCategory" :key="sub_cat.id">{{sub_cat.sub_cat_name}}</option>
                                    </select>
                                     <div v-if = "errors && errors.subCategory_id">{{errors.subCategory_id[0]}}</div>
                                    </div>
                                </div>

                            </div>


                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Content Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="title" placeholder="Enter Title"
                                        name="title">
                                         <div v-if = "errors && errors.title">{{errors.title[0]}}</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    

                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                     <ckeditor :editor="editor" name= "description" v-model="description" :config="editorConfig"></ckeditor>
                                    <div v-if = "errors && errors.description">{{errors.description[0]}}</div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-5">

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload File</label>
                                       
                                  <input type="file" name="file" class="form-control" id="inputFileUpload" @change = "getFile"
                                  >
                                     <div v-if = "errors && errors.file">{{errors.file[0]}}</div>
                                        
                                    </div>

                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Video Url</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="video_url" placeholder="Enter Url"
                                         name="video_url">
                                         <div v-if = "errors && errors.video_url">{{errors.video_url[0]}}</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Course Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="course_price" placeholder="Enter Price"
                                         name="course_price">
                                         <div v-if = "errors && errors.course_price">{{errors.course_price[0]}}</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Course Discount Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="course_discount_price" placeholder="0.00"
                                         name="course_discount_price">
                                         <div v-if = "errors && errors.course_discount_price">{{errors.course_discount_price[0]}}</div>
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
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
      subCategory:[],
       category_id:'',
       subCategory_id:'',
       title:'',
       description:'',
       file:'',
       video_url:'',
       course_discount_price:'',
       course_price:'',
       errors:{},
     
      editor: ClassicEditor,
            editorData: '<p>Rich-text editor content.</p>',
            editorConfig: {
                // The configuration of the rich-text editor.
            },
     
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
    
    contentSave () {
      // Submit the form via a POST request
     let form = new FormData;
     form.append('file',this.file);
     form.append('category_id',this.category_id);
     form.append('subCategory_id',this.subCategory_id);
     form.append('title',this.title);
     form.append('description',this.description);
     form.append('video_url',this.video_url);
     form.append('course_price',this.course_price);
     form.append('course_discount_price',this.course_discount_price);
      
      axios.post('/contentSave',form)
        .then((response) => {
           this.$router.push('/content');
           Toast.fire({
            icon: 'success',
            title: 'Content added successfully'
          })
           
       }).catch(error=>{
          this.errors = error.response.data.errors;
       });
    },

    goBack(){
      this.$router.push('/content');
    },

  }

}
</script>

<style>
 .right-border{
     border-right:1px solid black;
 }
</style>
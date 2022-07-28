import Axios from "axios"

export default{
    state:{
        category:[],
        subCategory:[],
        content:[],
        user:[],
        role:[],
        permission:[],
        roleWisePermission:[],
        config:[],
        

    },

    getters:{
       categoryList(state){
           return state.category
       },
       subCategoryList(state){
        return state.subCategory
      },

      contentList(state){
        return state.content
      },
      userList(state){
         return state.user
       },
       roleList(state){
         return state.role
       },
       permissionList(state){
         return state.permission
       },
       roleWisePermissionList(state){
         return state.roleWisePermission
       },
       configList(state){
         return state.config
       }
       
    },

    actions:{
        getCategoryList(context){
           Axios.get('/categoryList').then((response)=>{
              context.commit('categoryList',response.data.categoryList)
           })
        },
        getSubCategoryList(context){
            Axios.get('/subCategoryList').then((response)=>{
               context.commit('subCategoryList',response.data.subCategoryList)
            })
         },

         getContentList(context){
            Axios.get('/contentList').then((response)=>{
               context.commit('contentList',response.data.contentList)
            })
         },
         getUserList(context){
            Axios.get('/userList').then((response)=>{
               context.commit('userList',response.data.userList)
            })
         },
         getRoleList(context){
            Axios.get('/roleList').then((response)=>{
               context.commit('roleList',response.data.roleList)
            })
         },
         getPermissionList(context){
            Axios.get('/permissionList').then((response)=>{
               context.commit('permissionList',response.data.permissionList)
            })
         },
         getRoleWisePermissionList(context){
            Axios.get('/roleWisePermissionList').then((response)=>{
               context.commit('roleWisePermissionList',response.data.roleWisePermissionList)
            })
         },

         getConfigList(context){
            Axios.get('/configList').then((response)=>{
               context.commit('configList',response.data.configList)
            })
         }
         
        
    },
    mutations:{
           categoryList(state,responseData){
               return state.category = responseData;
           },

           subCategoryList(state,response){
            return state.subCategory = response;
          },

          contentList(state,response){
            return state.content = response;
          },
          userList(state,response){
            return state.user = response;
          },
          
          roleList(state,response){
            return state.role = response;
          },
          permissionList(state,response){
            return state.permission = response;
          },
          roleWisePermissionList(state,response){
            return state.roleWisePermission = response;
          },

          configList(state,response){
            return state.config = response;
          }
    }
}
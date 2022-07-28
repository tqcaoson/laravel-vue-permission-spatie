import dashboard from './components/admin/dashboard/index.vue';

// import component for category
import categorylist from './components/admin/category/list.vue';
import categoryadd from './components/admin/category/add.vue';
import categoryedit from './components/admin/category/edit.vue';

// import component for sub category
import subCategorylist from './components/admin/subCategory/list.vue';
import subCategoryadd from './components/admin/subCategory/add.vue';
import subCategoryedit from './components/admin/subCategory/edit.vue';

// import component for content
import contentlist from './components/admin/content/list.vue';
import contentadd from './components/admin/content/add.vue';
import contentedit from './components/admin/content/edit.vue';


// import component for user
import userlist from './components/admin/user/list.vue';
import useradd from './components/admin/user/add.vue';
import useredit from './components/admin/user/edit.vue';

// import component for role
import rolelist from './components/admin/role/list.vue';
import roleadd from './components/admin/role/add.vue';
import roleedit from './components/admin/role/edit.vue';


// import component for website configuration
import configlist from './components/admin/configuration/list.vue';
import configadd from './components/admin/configuration/add.vue';
import configedit from './components/admin/configuration/edit.vue';



export const routes = [
   
    {
        path: '/', 
        component: dashboard
    },

    // start route for category  //
    {
        path: '/category', 
        component: categorylist
    },
    {
        path: '/addCategory', 
        component: categoryadd
    },

    {
        path: '/editCategory/:categoryId', 
        component: categoryedit
    },

    // start route for sub category //

    {
        path: '/subCategory', 
        component: subCategorylist
    },
    {
        path: '/addSubCategory', 
        component: subCategoryadd
    },

    {
        path: '/editSubCategory/:subCategoryId', 
        component: subCategoryedit
    },

    // start route for content //

    {
        path: '/content', 
        component: contentlist
    },
    {
        path: '/addContent', 
        component: contentadd
    },

    {
        path: '/editContent/:contentId', 
        component: contentedit
    },

     // start route for user //

     {
        path: '/user', 
        component: userlist
    },
    {
        path: '/addUser', 
        component: useradd
    },

    {
        path: '/editUser/:userId', 
        component: useredit
    },


     // start route for role //

     {
        path: '/role', 
        component: rolelist
    },
    {
        path: '/addRole', 
        component: roleadd
    },

    {
        path: '/editRole/:roleId', 
        component: roleedit
    },


     // start route for website configuration //

     {
        path: '/configuration', 
        component: configlist
    },
    {
        path: '/addConfiguration', 
        component: configadd
    },

    {
        path: '/editConfiguration/:configId', 
        component: configedit
    },


    
  ]
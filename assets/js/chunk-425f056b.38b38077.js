(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-425f056b"],{"0826":function(e,t,n){"use strict";n.r(t);var s=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("el-row",{attrs:{gutter:20}},[n("el-col",{attrs:{xs:24,sm:12,md:8}},[n("el-card",{attrs:{shadow:"hover"}},[n("div",{attrs:{slot:"header"},slot:"header"},[n("span",[e._v("角色设置")])]),n("div",[n("el-button",{staticClass:"btn",attrs:{size:"small",plain:""},on:{click:e.addRole}},[e._v("新增角色")])],1),n("div",{staticClass:"cool-list"},e._l(e.role,function(t){return n("div",{key:t.id,staticClass:"el-row"},[n("el-dropdown-item",{attrs:{divided:""}},[n("el-col",{attrs:{span:12}},[e._v("\n                                      "+e._s(t.role_name)+"\n                                  ")]),n("el-col",{attrs:{span:12}},[n("el-button",{attrs:{size:"mini"},on:{click:function(n){return e.editRole(t.id,t.role_name)}}},[e._v("编辑\n                                      ")]),n("el-button",{attrs:{size:"mini",type:"danger"},on:{click:function(n){return e.deleteRole(1,t.id)}}},[e._v("删除\n                                      ")])],1)],1)],1)}),0)])],1),n("el-col",{attrs:{xs:24,sm:12,md:8}},[n("el-card",{attrs:{shadow:"hover"}},[n("div",{attrs:{slot:"header"},slot:"header"},[n("span",[e._v("角色菜单设置")])]),n("div",[n("el-row",[n("el-col",{attrs:{span:12}},[n("div",[n("el-select",{ref:"selection",attrs:{size:"small",placeholder:"请选择"},on:{change:e.handleChange},model:{value:e.value,callback:function(t){e.value=t},expression:"value"}},e._l(e.role,function(e){return n("el-option",{key:e.id,attrs:{label:e.role_name,value:e.id}})}),1)],1)]),n("el-col",{attrs:{span:12}},[n("el-button",{staticClass:"btn",attrs:{size:"small",plain:""},on:{click:e.addRoleMenu}},[e._v("新增角色菜单")])],1)],1)],1),n("div",{staticClass:"cool-list"},[n("div",{staticClass:"el-row"},[n("el-dropdown-item",{attrs:{divided:""}},[n("el-col",{attrs:{span:8}},[n("el-tag",[e._v("主菜单")])],1),n("el-col",{attrs:{span:8}},[n("el-tag",[e._v("子菜单")])],1),n("el-col",{attrs:{span:8}},[n("el-tag",[e._v("操作")])],1)],1)],1),e._l(e.menu,function(t){return n("div",{key:t.id,staticClass:"el-row"},[n("el-dropdown-item",{attrs:{divided:""}},[n("el-col",{attrs:{span:8}},[e._v("\n                                      "+e._s(t.menu_name)+"\n                                  ")]),n("el-col",{attrs:{span:8}},[e._v("\n                                      "+e._s(t.sub_name)+"\n                                  ")]),n("el-col",{attrs:{span:8}},[n("el-button",{attrs:{size:"mini",type:"danger"},on:{click:function(n){return e.deleteRoleMenu(2,t.id)}}},[e._v("删除\n                                      ")])],1)],1)],1)})],2)])],1)],1),n("el-dialog",{attrs:{visible:e.dialogVisible,width:"30%","before-close":e.handleClose},on:{"update:visible":function(t){e.dialogVisible=t}}},[n("span",{attrs:{slot:"title"},slot:"title"},[n("el-tag",[e._v(e._s(e.selectedLabel))])],1),n("div",[n("el-row",[n("el-col",{attrs:{span:12}},[n("el-select",{attrs:{size:"small",placeholder:"请选择"},on:{change:function(t){return e.getSubMenu(e.mainValue)}},model:{value:e.mainValue,callback:function(t){e.mainValue=t},expression:"mainValue"}},e._l(e.mainMenu,function(e){return n("el-option",{key:e.id,attrs:{label:e.menu_name,value:e.id}})}),1)],1),n("el-col",{attrs:{span:12}},[n("el-select",{attrs:{size:"small",placeholder:"请选择"},model:{value:e.subValue,callback:function(t){e.subValue=t},expression:"subValue"}},e._l(e.subMenu,function(e){return n("el-option",{key:e.id,attrs:{label:e.sub_name,value:e.id}})}),1)],1)],1)],1),n("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[n("el-button",{attrs:{size:"mini"},on:{click:function(t){e.dialogVisible=!1}}},[e._v("取 消")]),n("el-button",{attrs:{size:"mini",type:"primary"},on:{click:e.saveRoleMenu}},[e._v("确 定")])],1)])],1)},a=[],i={name:"system_menu",data:function(){return{role:[],menu:[],value:"",selectedLabel:"",mainMenu:[],mainValue:"",subMenu:[],subValue:"",subName:"",component:"",dialogVisible:!1,isOpenDialogVisible:0}},methods:{handleChange:function(){var e=this;this.$nextTick(function(){e.selectedLabel=e.$refs.selection.selectedLabel}),this.getMenu(this.value)},getRole:function(){var e=this;return new Promise(function(t,n){e.$api.get("?f=system&c=Role&a=getRole").then(function(n){200===n.status&&(e.role=n.data,e.value=n.data[0].id,t(e.value))})})},getMenu:function(e){var t=this;this.$api.post("?f=system&c=Role&a=getMenu",{id:e}).then(function(e){200===e.status&&(t.menu=e.data)})},getMainMenu:function(){var e=this;return new Promise(function(t,n){e.$api.get("?f=system&c=Menu&a=getMenu").then(function(n){200===n.status&&(e.mainMenu=n.data,e.mainValue=n.data[0].id,t(e.mainValue))})})},getSubMenu:function(e){var t=this;this.subValue="",this.$api.post("?f=system&c=Menu&a=getSubMenu",{id:e}).then(function(e){200===e.status&&(t.subMenu=e.data,t.subValue=e.data[0].id)})},addRoleMenu:function(){var e=this;this.dialogVisible=!0,0===this.isOpenDialogVisible&&this.getMainMenu().then(function(t){e.getSubMenu(t),e.isOpenDialogVisible=1})},saveRoleMenu:function(){var e=this;return new Promise(function(t){var n={data:{role_id:e.value,menu_id:e.mainValue,sub_id:e.subValue}};e.$api.post("?f=system&c=Role&a=addRoleMenu",n).then(function(n){1===n.data.status?(e.$message({type:"info",message:"操作成功"}),e.getMenu(e.value),e.dialogVisible=!1):e.$message({type:"info",message:"操作失败"}),t(n.data.status)})})},editRole:function(e,t){var n=this;this.mesEditBox("请修改角色名","?f=system&c=Role&a=editRole",{id:e},t).then(function(e){1===e&&n.getRole()})},deleteRole:function(e,t){var n=this;this.deleteBox("?f=system&c=Role&a=deleteRole",{id:t,type:e}).then(function(e){1===e&&n.getRole()})},deleteRoleMenu:function(e,t){var n=this;this.deleteBox("?f=system&c=Role&a=deleteRole",{id:t,type:e}).then(function(e){1===e&&n.getMenu(n.value)})},addRole:function(){var e=this;this.mesEditBox("请添加角色","?f=system&c=Role&a=addRole",{}).then(function(t){1===t&&e.getRole()})},refreshSort:function(e){var t=this,n={1:this.menu,2:this.subRole}[e],s={type:e,dataRole:n};this.$api.post("?f=system&c=Role&a=refreshSort",s).then(function(e){1===e.data.status?t.$message({type:"info",message:"操作成功"}):t.$message({type:"info",message:"操作失败"})})},handleClose:function(e){this.$message({type:"info",message:"取消输入"}),e()},mesEditBox:function(e,t,n,s){var a=this;return new Promise(function(i,l){a.$prompt(e,"",{confirmButtonText:"确定",cancelButtonText:"取消",inputValue:s}).then(function(e){var s=e.value,o={name:s},u=Object.assign(o,n);a.$api.post(t,u).then(function(e){1===e.data.status?(a.$message({type:"info",message:"操作成功"}),i(e.data.status)):l(a.$message({type:"info",message:"操作失败"}))})}).catch(function(){a.$message({type:"info",message:"取消输入"})})}).catch(function(e){console.log(e)})},deleteBox:function(e,t){var n=this;return new Promise(function(s,a){n.$confirm("此操作将删除该选项, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(i){i.value;n.$api.post(e,t).then(function(e){1===e.data.status?(n.$message({type:"info",message:"操作成功"}),s(e.data.status)):a(n.$message({type:"info",message:"操作失败"}))})}).catch(function(){n.$message({type:"info",message:"取消输入"})})}).catch(function(e){console.log(e)})}},created:function(){var e=this;this.getRole().then(function(t){e.selectedLabel=e.$refs.selection.selectedLabel,e.getMenu(t)})},mounted:function(){this.$dragging.$on("dragged",function(e){var t=e.value;console.log(t.list)})}},l=i,o=(n("b0b4"),n("2877")),u=Object(o["a"])(l,s,a,!1,null,"74119c88",null);t["default"]=u.exports},"0d71":function(e,t,n){},b0b4:function(e,t,n){"use strict";var s=n("0d71"),a=n.n(s);a.a}}]);
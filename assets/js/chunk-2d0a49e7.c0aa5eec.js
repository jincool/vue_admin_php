(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0a49e7"],{"06e0":function(e,t,r){"use strict";r.r(t);var a=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("el-container",[r("el-main",[r("el-row",{attrs:{type:"flex",justify:"space-around"}},[r("el-col",{attrs:{span:8}},[r("form_frame",[r("template",{slot:"title"},[e._v("\n                            党费上划申请表\n                        ")]),r("template",{slot:"main"},[r("el-form",{ref:"ruleForm",staticClass:"demo-ruleForm",attrs:{model:e.ruleForm,rules:e.rules,"label-width":"100px"}},[r("el-form-item",{attrs:{label:"组织名称",prop:"address"}},[r("el-input",{model:{value:e.ruleForm.address,callback:function(t){e.$set(e.ruleForm,"address",t)},expression:"ruleForm.address"}})],1),r("el-form-item",{attrs:{label:"活动名称",prop:"activityName"}},[r("el-input",{model:{value:e.ruleForm.activityName,callback:function(t){e.$set(e.ruleForm,"activityName",t)},expression:"ruleForm.activityName"}})],1),r("el-form-item",{attrs:{label:"费用预算",prop:"money"}},[r("el-input",{model:{value:e.ruleForm.money,callback:function(t){e.$set(e.ruleForm,"money",t)},expression:"ruleForm.money"}})],1),r("el-form-item",{attrs:{label:"活动时间",required:""}},[r("el-col",{attrs:{span:11}},[r("el-form-item",{attrs:{prop:"date1"}},[r("el-date-picker",{staticStyle:{width:"100%"},attrs:{type:"date",placeholder:"选择日期"},model:{value:e.ruleForm.date1,callback:function(t){e.$set(e.ruleForm,"date1",t)},expression:"ruleForm.date1"}})],1)],1),r("el-col",{staticClass:"line",attrs:{span:2}},[e._v("-")]),r("el-col",{attrs:{span:11}},[r("el-form-item",{attrs:{prop:"date2"}},[r("el-time-picker",{staticStyle:{width:"100%"},attrs:{placeholder:"选择时间"},model:{value:e.ruleForm.date2,callback:function(t){e.$set(e.ruleForm,"date2",t)},expression:"ruleForm.date2"}})],1)],1)],1),r("el-form-item",{attrs:{label:"活动说明",prop:"desc"}},[r("el-input",{attrs:{type:"textarea"},model:{value:e.ruleForm.desc,callback:function(t){e.$set(e.ruleForm,"desc",t)},expression:"ruleForm.desc"}})],1),r("el-form-item",{attrs:{label:"审核意见",prop:"agree"}},[r("el-input",{attrs:{type:"textarea"},model:{value:e.ruleForm.agree,callback:function(t){e.$set(e.ruleForm,"agree",t)},expression:"ruleForm.agree"}})],1),r("el-form-item",[r("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.submitForm("ruleForm")}}},[e._v("申请")]),r("el-button",{on:{click:function(t){return e.resetForm("ruleForm")}}},[e._v("重置")])],1)],1)],1)],2)],1),r("el-col",{attrs:{span:8}},[r("form_frame",[r("template",{slot:"title"},[e._v("\n                            申请列表\n                        ")]),r("template",{slot:"main"},[r("el-row",[r("el-col",{attrs:{span:24}},[r("el-steps",{attrs:{active:e.active}},[r("el-step",{attrs:{title:"申请"}}),r("el-step",{attrs:{title:"进行中"}}),r("el-step",{attrs:{title:"通过"}})],1)],1)],1),e._l(e.dataList,function(t){return r("el-dropdown-item",{key:t.id,attrs:{divided:""}},[r("el-row",{nativeOn:{click:function(r){return e.status(t.status)}}},[r("el-col",{attrs:{span:14}},[e._v(" "+e._s(t.activityName))]),r("el-col",{attrs:{span:10}},[e._v(e._s(t.date))])],1)],1)})],2)],2)],1)],1)],1)],1)],1)},l=[],s={name:"UpApply",data:function(){return{active:0,dataList:[{id:100,date:"2016-05-02",activityName:"贫困补助",status:1},{id:99,date:"2016-04-22",activityName:"学习教育",status:1},{id:89,date:"2016-03-12",activityName:"生活改善",status:2},{id:88,date:"2016-04-11",activityName:"生活改善",status:3},{id:77,date:"2016-03-23",activityName:"学习教育",status:3},{id:44,date:"2016-03-12",activityName:"生活改善",status:3},{id:43,date:"2016-02-14",activityName:"贫困补助",status:3},{id:42,date:"2016-01-16",activityName:"生活改善",status:3}],ruleForm:{name:"",address:"",activityName:"",region:"",desc:""},rules:{address:[{required:!0,message:"请输入组织部门",trigger:"blur"},{min:1,max:25,message:"长度在 1 到 25 个字符",trigger:"blur"}],activityName:[{required:!0,message:"请输入活动名称",trigger:"blur"},{min:1,max:25,message:"长度在 1 到 25 个字符",trigger:"blur"}],money:[{required:!0,message:"请输入预算金额",trigger:"blur"}],date1:[{type:"date",required:!0,message:"请选择日期",trigger:"change"}],date2:[{type:"date",required:!0,message:"请选择时间",trigger:"change"}],desc:[{required:!0,message:"请填写活动说明",trigger:"blur"}],agree:[{required:!1,message:"请填写活动形式",trigger:"blur"}]}}},methods:{submitForm:function(e){this.$refs[e].validate(function(e){if(!e)return console.log("error submit!!"),!1;alert("submit!")})},resetForm:function(e){this.$refs[e].resetFields()},status:function(e){this.active=e}}},i=s,o=r("2877"),m=Object(o["a"])(i,a,l,!1,null,"e23c3f02",null);t["default"]=m.exports}}]);
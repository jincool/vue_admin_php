(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-b618d82e"],{"427e":function(t,i,e){"use strict";e.r(i);var n=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticStyle:{width:"100%",height:"300px"},attrs:{id:"zzgxInfo"}})},a=[],o={name:"",data:function(){return{charts:"",opinion:["申请","审核","接收"],opinionDataZc:[18,18,18,22,16,17,16,19,16,19,12,13,16,14,16,19],opinionDataCs:[12,12,8,6,6,7,8,9,8,5,2,3,6,14,1,3],opinionDataWkz:[2,8,8,2,6,1,1,1,6,1,2,3,6,4,6,2],opinionXz:["平桥镇","车桥镇","新材料产业园","石塘镇","顺河镇","朱桥镇","复兴镇","山阳街道","淮城街道","流均镇","河下街道","施河镇","漕运镇","博里镇","苏嘴镇","钦工镇"]}},methods:{drawPie:function(t){this.charts=this.$echarts.init(document.getElementById(t)),this.charts.setOption({tooltip:{trigger:"axis"},legend:{orient:"vertical",x:"left",textStyle:{color:"#ccc",fontSize:12},data:this.opinion},calculable:!0,xAxis:[{axisLine:{lineStyle:{type:"solid",color:"#fff",width:"1"}},type:"category",data:this.opinionXz,axisLabel:{interval:0,rotate:35}}],yAxis:[{axisLine:{lineStyle:{color:"#fff",width:"1"}},type:"value"}],splitLine:{show:!1},series:[{name:"正常",type:"bar",barWidth:11,data:this.opinionDataZc,itemStyle:{color:"#49f61d"}},{name:"审核",type:"bar",barWidth:11,data:this.opinionDataCs,itemStyle:{color:"#ff8e3a"}},{name:"接收",type:"bar",barWidth:11,data:this.opinionDataWkz,itemStyle:{color:"#ff2325"}}]})}},mounted:function(){this.$nextTick(function(){this.drawPie("zzgxInfo")})}},s=o,r=(e("b00b"),e("2877")),c=Object(r["a"])(s,n,a,!1,null,"df7fb458",null);i["default"]=c.exports},b00b:function(t,i,e){"use strict";var n=e("d693"),a=e.n(n);a.a},d693:function(t,i,e){}}]);
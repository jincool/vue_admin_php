(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-dae7c7da"],{e27d:function(t,e,i){},ee68:function(t,e,i){"use strict";var n=i("e27d"),a=i.n(n);a.a},f521:function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticStyle:{width:"100%",height:"300px"},attrs:{id:"numInfo"}})},a=[],o={name:"",data:function(){return{charts:"",opinion:["会议次数"],opinionData:[2,8,8,2,6,7,6,8,6,9,2,3,6,4,6,9],opinionXz:["平桥镇","车桥镇","新材料产业园","石塘镇","顺河镇","朱桥镇","复兴镇","山阳街道","淮城街道","流均镇","河下街道","施河镇","漕运镇","博里镇","苏嘴镇","钦工镇"]}},methods:{drawPie:function(t){this.charts=this.$echarts.init(document.getElementById(t)),this.charts.setOption({color:["#8a4bcc"],tooltip:{trigger:"axis"},calculable:!0,xAxis:[{axisLine:{lineStyle:{type:"solid",color:"#fff",width:"1"}},type:"category",data:this.opinionXz,axisLabel:{interval:0,rotate:35}}],yAxis:[{axisLine:{lineStyle:{color:"#fff",width:"1"}},type:"value"}],splitLine:{show:!1},series:[{name:"会议次数",type:"line",barWidth:15,data:this.opinionData,markPoint:{data:[{type:"max",name:"最大值"},{type:"min",name:"最小值"}]},itemStyle:{normal:{areaStyle:{type:"default"}}},markLine:{data:[{type:"average",name:"平均值"}]}}]})}},mounted:function(){this.$nextTick(function(){this.drawPie("numInfo")})}},s=o,r=(i("ee68"),i("2877")),c=Object(r["a"])(s,n,a,!1,null,"a34c74d2",null);e["default"]=c.exports}}]);
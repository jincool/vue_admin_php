(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-f354e304"],{"0d96":function(t,i,e){},"219d":function(t,i,e){"use strict";e.r(i);var n=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticStyle:{width:"100%",height:"300px"},attrs:{id:"joinNum"}})},a=[],o={name:"",data:function(){return{charts:"",opinion:["参会人数"],opinionData:[782,844,687,1188,885,976,985,992,682,1090,886,933]}},methods:{drawPie:function(t){this.charts=this.$echarts.init(document.getElementById(t)),this.charts.setOption({color:["#ba37cc"],tooltip:{trigger:"axis"},calculable:!0,xAxis:[{axisLine:{lineStyle:{type:"solid",color:"#fff",width:"1"}},type:"category",data:["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"]}],yAxis:[{axisLine:{lineStyle:{color:"#fff",width:"1"}},type:"value"}],splitLine:{show:!1},series:[{name:"参会人数",type:"bar",barWidth:15,data:this.opinionData,markPoint:{data:[{type:"max",name:"最大值"},{type:"min",name:"最小值"}]},markLine:{data:[{type:"average",name:"平均值"}]}}]})}},mounted:function(){this.$nextTick(function(){this.drawPie("joinNum")})}},s=o,c=(e("4b37"),e("2877")),r=Object(c["a"])(s,n,a,!1,null,"6dbd402d",null);i["default"]=r.exports},"4b37":function(t,i,e){"use strict";var n=e("0d96"),a=e.n(n);a.a}}]);
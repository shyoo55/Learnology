<?php header("Content-type: text/css"); ?>

html{height:100%;width:100%;}
body{font-family:Courier;border-style:outset;background-color:#E9E7E7; font-family: Times New Roman; font-size: 22px;}
header{border:0;padding:0%;margin:0%;text-align:center;}
header{background-color:#C9C7C8;height:auto;width:100%;}
img{
margin-left: auto;
margin-right: auto;
max-width: 100%;
display: block;
justify-content:center;
align-items:center;}

/*//////creative home page//////////*/
.container{ text-align: center;}

.container span{
text-transform: uppercase;
display: block;}

.first{
color:#808080 ;
font-size: 40px;
font-weight: 300;
letter-spacing: 8px;
margin-bottom: 10px;
background: white;
animation: text 3s 1;}

.second{
color:#808080;
font-size: 30px;
font-weight: 200;
letter-spacing: 5px;
margin-bottom: 50px;
background: white;
animation: text 3s 1;}

@keyframes text{
0%{
color: white;
margin-bottom: -30px;}
30%{
letter-spacing: 15px;
margin-bottom: -30px;}
85%{
letter-spacing: 10px;
margin-bottom: -30px;
position: relative;}}

//////table

table {
  font-family: Times New Roman;
  border-collapse: collapse;
  width: 70%;
}

td, th{
  text-align: center;
  padding: 8px;

}
table tr:nth-child(even) {
  background-color: #B0ACAE;
}
table tr:nth-child(odd) {
 background-color: #B0ACAE;
   opacity: 0.7;

}
table th {
background-color: #968AA4;
color: #222021;
width: 60%;
height: 10%
}

#table1 {
  font-family: Times New Roman;
  border-collapse: collapse;
  width: 70%;
  font-size: 22px;
}

#table1, th{
  background-color: #968AA4;
  color: #222021;
  width: 60%;
  height: 10%
}

#table1, td, th{
  text-align: center;
  padding: 8px;
}

main{
width:auto;
height:auto;
padding:1%;
margin :4% 10% 4% 10%;}



img{
margin-left: auto;
margin-right: auto;
max-width: 100%;
display: block;
justify-content:center;
align-items:center;}

h1{
	 text-align: center;
}
p{
	text-align: center;
}
.button{
display:center;
}
#button{
  margin-left: 30%;
  background-color:#B0ACAE;
  height: 100px;
  width:40%;
  font-size: 25px;
  opacity: 0.7;
}
#p1{
	text-align: center;
}
.info{
	 text-align:left;
	 line-height:2em;
 }



 /*navbar*/

 header nav ul li {height:25%;width:33.33%;background-color:#C9C7C8;}
 a{color:#000000;}
 a:hover{color:red;font-weight:bold;}


 ul {

 margin:0%;

 list-style:none;
 text-align:center;
 border:0%;
 padding: 0%;
 }


 ul li {float:left;

 width:100%;
 height:100%;
 opacity:.8;
 text-align:center;
 font-size:20px;
 line-height:40px;
 background-color:#C9C7C8;

 }

 ul li a {
 text-decoration:none;
 color:black;
 display:block;
 }

 ul li ul li {
   display:none;
   height:100%;
   width:100%;
 }

  ul li:hover ul li {
 display:block;}


 ul:hover li a{
 background:#C9C7C8;
 color: #000000;
 transform:scale(1);
 opacity:.9;
 filter: blur(.5px);}

 ul li a:hover{
 transform:scale(1.1);
 opacity: 1;
 filter: blur(0px);}


 ul li a:before {
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 transition: 0s;
 transform-origin: right;
 transform: scaleX(0);
 z-index: -1;
 }

 ul li a:hover:before {
 transition: 0s;
 transform-origin:left;
 transform: scaleX(1);
 z-index: -1;
 }

<?php
    header('content-type: text/css');
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoload.php";
?>
/* ============================================== */
/* Global */ 
/* ============================================== */
* {
    color: white;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*:focus { 
    border: none;
    outline: none;
}

html {
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
    overflow: auto;
    scrollbar-color: #5f6681 #051039;
    scrollbar-width: auto;
}

body {
    background-color: #051039;
    font-family: arial;
    font-size: 16px;
    text-align: center;
}

button {
    background-color: transparent;
    border: none;
    padding: 5px 10px 5px 5px;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

input {
    background-color: transparent;
    border: none;
    border-radius: 0;
    padding: 5px 10px 5px 10px;
    font-size: 16px;
    color: white;
    width: 100%;
}

input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus {
    -webkit-text-fill-color: white ;
    transition: background-color 5000s ease-in-out 0s;
}

select {
    background-color: transparent;
    border: none;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

textarea {
    background-color: transparent;
    border: none;
    border-radius: 0;
    padding: 5px 10px 5px 10px;
    font-family: arial;
    font-size: 16px;
    color: white;
    width: 100%;
    resize: none;
}

textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus {
    transition: background-color 5000s ease-in-out 0s;
}

xmp {
    padding: 10px 10px 10px 50px;
	font-size: 16px;
}

a {
    text-decoration: none;
}

b {
    color: cyan;
}

hr {
    background-color: #051039; 
    border: none;
	height: 3px; 
    width: 100%; 
    margin: auto;
    margin-top: 20px;
    text-align: center;
}

hr:after {
    content: "\f164";
    font-family: FontAwesome;
	font-size: 20px;
    background-color: #051039;
    color: white; 
    display: inline-block;
    position: relative;
    top: -20px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 20px;
}

span {
    word-break: break-all;
}
/* ============================================== */
/* Custom */
/* ============================================== */
.Main {
    background-color: rgba(20,20,0,0.5);
    border: 1px solid rgba(255,255,255,0);
    min-height: 500px;
}
.Menu {
    border: 1px solid rgba(255,255,255,0);
    display: inline-block;
    font-size: 16px;
    padding: 10px;
}
.Menu2 {
    border: 1px solid rgba(255,255,255,0.5);
    min-width: 200px;
    padding: 10px;
    display: block;
}
/* ============================================== */

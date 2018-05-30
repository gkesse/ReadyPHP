<?php
    header('content-type: text/css');
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
}

body {
    background: #051039;
    font-family: "Archivo Narrow", Arial;
    font-size: 20px;
    text-align: center;
}

a {
    text-decoration: none;
}

button {
    background: transparent;
    border: none;
    padding: 5px 10px 5px 5px;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

input {
    background: none;
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
    background: transparent;
    border: none;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

textarea {
    background: transparent;
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

b {
    color: cyan;
	font-size: 18px;
}

/* ============================================== */
/* HtmlPage */ 
/* ============================================== */

.HtmlPage {

}

/* ============================================== */
/* BodyPage */ 
/* ============================================== */

.BodyPage {
    background: rgba(255,255,255,0.2);
}

.BodyPage.Mrg {
    max-width: 1000px;
    margin: auto;
}

.BodyPage {
    background: rgba(255,255,255,0.2);
}

/* ============================================== */
/* MainPage */ 
/* ============================================== */

.MainPage {
    padding: 20px 10px;
}

/* ============================================== */
/* MainBlock */ 
/* ============================================== */

.MainBlock {
    background: rgba(255,255,255,0.0);
    border: 2px solid rgba(255,255,255,0.2);
    min-height: 250px;
    max-width: 500px;
    margin: auto;
    text-align: left;
}

.MainBlock .Title {
    background: rgba(255,255,255,0.2);
    padding: 10px 10px;
    font-family: Anton;
    font-size: 25px;
}

.MainBlock .Body {

}

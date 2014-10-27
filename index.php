<!DOCTYPE html>
<html>


<head>

    <meta charset="UTF-8">

    <title>Placement Informer</title>
    <script type="text/javascript" src="IN/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="IN/css/bootstrap.min.css">



    <?php
session_start();
if (isset($_SESSION['username']))
{
    unset($_SESSION['err']);
    header('Location: IN/studentHome.php');
}
else
{
    if(isset($_SESSION['err'])){
        echo '<div class="alert alert-danger text-center" role="alert"><strong>Error! </strong> Wrong username or password.</div>';

    }
}
?>
        <style>
/*! normalize.css v3.0.0 | MIT License | git.io/normalize */html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,main,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}

</style>


  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto+Slab'>
      <link rel="SHORTCUT ICON" href="images/rvce.ico">

    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
  background-color: #7D41DC;
  font-family: "Roboto Slab", serif;
  color: white;
}

.preload * {
  transition: none !important;
}

label {
  display: block;
  font-weight: bold;
  font-size: small;
  text-transform: uppercase;
  font-size: 0.7em;
  margin-bottom: 0.35em;
}

input[type="text"], input[type="password"] {
  width: 100%;
  border: none;
  padding: 0.5em;
  border-radius: 2px;
  margin-bottom: 0.5em;
  color: #333;
}
input[type="text"]:focus, input[type="password"]:focus {
  outline: none;
  box-shadow: inset -1px -1px 3px rgba(0, 0, 0, 0.3);
}

button {
  padding-left: 1.5em;
  padding-right: 1.5em;
  padding-bottom: 0.5em;
  padding-top: 0.5em;
  border: none;
  border-radius: 2px;
  background-color: #0BD5BA;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
  color: white;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.45);
}

small {
  font-size: 1em;
}

.login--login-submit {
  float: right;
}

.login--container {
  width: 600px;
  background-color: #7D41DC;
  margin: 0 auto;
  position: relative;
  top: 25%;
}

.login--toggle-container {
  position: absolute;
  background-color: #7D41DC;
  right: 0;
  line-height: 2.5em;
  width: 50%;
  height: 120px;
  text-align: right;
  cursor: pointer;
  transform: perspective(1000px) translateZ(1px);
  transform-origin: 0% 0%;
  transition: all 1s cubic-bezier(0.06, 0.63, 0, 1);
  backface-visibility: hidden;
}
.login--toggle-container .js-toggle-login {
  font-size: 3.2em;
  text-decoration: underline;
}
.login--active .login--toggle-container {
  transform: perspective(1000px) rotateY(180deg);
  background-color: #bc1012;
}

.login--username-container, .login--password-container {
  float: left;
  background-color: #7D41DC;
  width: 50%;
  height: 120px;
  padding: 0.5em;
}

.login--username-container {
  transform-origin: 100% 0%;
  transform: perspective(1000px) rotateY(180deg);
  transition: all 1s cubic-bezier(0.06, 0.63, 0, 1);
  background-color: #bc1012;
  backface-visibility: hidden;
}
.login--active .login--username-container {
  transform: perspective(1000px) rotateY(0deg);
  background-color: #7D41DC;
}
.proj-name{
width:30%;
position:absolute;
left:39%;
top:70%;


}

.logo{
width:20%;
position:absolute;
left:47%;
top:55%;


}

</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>
<div class='preload login--container'>

  <form class="form col-md-12 center-block" method="post" action="IN/php/loginCheck.php">
  <div class='login--form'>
    <div class='login--username-container'>
      <label>Username</label>
      <input autofocus placeholder='Username' type='text' name="username" required>
    </div>
    <div class='login--password-container'>
      <label>Password</label>
      <input placeholder='Password' type='password' name="password" required>
      <button class='js-toggle-login login--login-submit'>Login</button>
    </div>
  </div>
  </form>
  <div class='login--toggle-container'>
    <small>Relax and </small>
    <div class='js-toggle-login'>Carpe diem</div>
    <small>live it love it</small>
  </div>
</div>
<div class="logo">
	<img src="images/logo.png">
</div>

<div class="proj-name">
	<h1 id="proj-head">Placement Informer</h1>
</div>
  <script src='js/jquery.js'></script>
  <script src="js/index.js"></script>


</body>

</html>
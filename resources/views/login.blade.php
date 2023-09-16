<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/styles_login.css" rel="stylesheet" />
    <title>Administrateur</title>
</head>
<body id="particles-js"></body>
<div class="animated bounceInDown">
  <a href="{{route('donneur')}}"><button style="background-color: #ffc800; border-radius: 5px; margin-top:20px; margin-left:20px; height:30px; width: 90px; ">retour</button></a>
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" onsubmit="return checkStuff()" action="{{route('register')}}" method="post">
      <h2>Bienvenue<span></span></h2>
      <h5>Renseignez les champs pour vous connecter</h5>
        <input type="text" name="name" placeholder="Votre nom" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="password" autocomplete="off">
        <button type="submit" class="btn1">Se connecter</button>
      </form>
  </div>
</div>

<script src="/design/js/scripts_login.js"></script>
</body>
</html>

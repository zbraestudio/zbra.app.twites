# API
Você pode utilizar a API do Z.BRA Tradutor Twitês em outras aplicações extra-twitter.

É muito fácil de utilizá-lo. Veja o exemplo abaixo:

  <?php

  //parâmetros
  $twet = 'Eu queria dizer à vocês uma coisa importante: É importante dizer que de importante só mesmo a importância dos dizeres importantes. Ufa, falei.';
  $specialcharacters = 'true'; //opcional
  $maxlength - 140; //opcional

  $json_file = file_get_contents("http://apps.zbraestudio.com.br/twites/json.php");
  $json_str = json_decode($json_file, true);

  $item = $json_str->twite;
  echo($item);
  ?>

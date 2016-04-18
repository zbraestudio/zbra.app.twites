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

## Parâmetros
Abaixo veja quais os parâmetros que podem ser usados ao utilizar a API:


#### twet
Texto que você vai tentar traduzir (reduzir).
Esse campo é obrigatório.


#### specialcharacters
Diz se você quer (*false*) que o resultado venha sem caracteres especiais ou que venha (*true*) normal.
Por padrão, é true;


#### maxlength
Número máximo de caracteres.
Por padrão, é 140 (twiter)


<?
include('zbra.obj.twites.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title>Tradutor Twitês</title>
<link rel="stylesheet" href="stylesheets/reset.css">
<!-- Carrega jQuery -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Carrega Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Carrega bootstrap.device.debug -->
<!-- Quando terminar o site comentar as chamas abaixo -->
<link rel="stylesheet" href="javascripts/bootstrap.device.debug/bootstrap.device.debug.css">
<script src="javascripts/bootstrap.device.debug/bootstrap.device.debug.js"></script>

<!-- Banners do Topo -->
<script src="javascripts/cycle/jquery.cycle.js"></script>
<script src="javascripts/cycle/responsivo.js"></script>

<!-- Controle de acesso pelo Mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- Carrega CSS -->
<link rel="stylesheet" href="./stylesheets/animations.css">
<link rel="stylesheet" href="./stylesheets/master.css">

<!-- Carrega JS -->
<script src="./javascripts/jquery.dotdotdot.js"></script>
<script src="./javascripts/base.js"></script>
</head>

<body>


  <nav class="navbar navbar-default">

    <div class="container">


      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <p><strong>Tradutor Twitês</strong>  | Escreva abaixo seu tweet que vamos tentar <strike>fazer o milagres de</strike> traduzí-lo para caber em 140 caracteres.</p>
        </a>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row">
      <div class="col-md-6" style="margin-top: 50px;">
        <p><strong>Seu texto</strong></p>
        <form action="index.php" method="post">
          <textarea class="form-control" rows="5" id="original" name="original" required=""><?= @$_POST['original']; ?></textarea><br>
          <button class="btn btn-default" type="submit">Traduzir</button>       <span id="original_contador"></span>
        </form>
      </div>
    </div>

    <?




    if(isset($_POST['original'])) {

      /* TRADUTOR */

      $twites = new zbraTwites();

      $twet = $_POST['original'];
      $traduzido = $twites->translate($twet);


    if($twet == $traduzido) {

      ?>
      <div class="alert alert-info" role="alert"><strong>Uma notícia boa! </strong> Seu twet nem precisou ser traduzido,
        afinal ele tem menos do que 140 caracteres. [<?= $traduzido; ?>]
      </div>
    <?
    } else {
      ?>
      <div class="row">

      <div class="col-md-6" style="margin-top: 50px;">

      <?
      if ($twites->length > 140) {
        ?>
        <div class="alert alert-danger" role="alert"><strong>Não conseguimos :(</strong> Tentamos reduzir o
          máximo, mas o texto ainda ultrapassou o limite de 140 caracteres.
        </div>
      <?
      } else {
        ?>
        <div class="alert alert-success" role="alert"><strong>Traduzido! :)</strong> Ahá! Conseguimos traduzir seu
          texto pra caber num twet. Selecione e copie o texto abaixo!
        </div>

        <textarea class="form-control" rows="5" id="traduzido"><?= @$traduzido; ?></textarea><br>
        <?
        if ($twites->length <= 140) {
          ?>
          <a href="http://twitter.com/home?status=<?= str_replace("\r\n", ' ', $traduzido); ?>" target="_blank">
            <button class="btn btn-default" type="button">Tweetar agora!</button>
          </a>
        <?
        }
        ?>
        <span id="traduzido_contador">123 caracteres.</span>

      <?
      }
    }
          ?>
        </div>
      </div>
    <?
    }
    ?>
  </div>

  <div class="panel-footer navbar-fixed-bottom">
    <div class="container">
      Esse app foi desenvolvido por <b>Tihh Gonçalves</b> (<a href="http://www.twitter.com/tihhgoncalves" target="_blank">@tihhgoncalves</a>)
  </div>
</body>
</html>
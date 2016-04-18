<?php
include('zbra.obj.twites.php');
header('Content-Type: application/json');

//parâmetros
if(!isset($_GET['twet'])){
    echo(json_encode(array('status' => 'error', 'msg' => 'Não foi informado o parâmetro "twet".')));
    exit;
};

$twites = new zbraTwites();

if(isset($_GET['specialcharacters'])){
    $twites->specialcharacters = (($_GET['specialcharacters'] == 'true')?true:false);
}

if(isset($_GET['maxlength'])){
    $twites->maxlength = intval($_GET['maxlength']);
}

$result = $twites->translate($_GET['twet']);

if($twites->length <= $twites->maxlength){
    $json = array(  'status' => 'ok',
                    'twite' =>  $result,
                    'length' => $twites->length);
} else {
    $json = array(  'status' => 'warning',
                    'msg'   =>  'O twet foi traduzido, mas excedeu o limite máximo de caracteres.',
                    'twite' =>  $result,
                    'length' => $twites->length);
}

echo(json_encode($json));

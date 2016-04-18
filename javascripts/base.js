$(document).ready(function(){

  $('#original').bind('input propertychange', function() {
    contadores($(this), $('#original_contador'));
  });

  $('#traduzido').bind('input propertychange', function() {
    contadores($(this), $('#traduzido_contador'));
  });

  contadores($('#original'), $('#original_contador'));
  contadores($('#traduzido'), $('#traduzido_contador'));
});

function contadores(input, contador){

  var x = input.val().length;

  contador.text(x + ' caracter(res)');

  if(x > 140){
    contador.css('color', 'red');
  }

}



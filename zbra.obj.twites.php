<?
class zbraTwites{

    public $specialcharacters = false;
    public $maxlength = 140;
    public $length = 0;


    private function strlen($var){
        return strlen(utf8_decode($var));
    }

    private function rules($original, $new, $text){

        foreach($original as $x=>$o){

            $text = preg_replace("/( $o)/im", ' ' . $new[$x], $text);
            $text = preg_replace("/($o )/im", $new[$x] . ' ', $text);
        }
        return trim($text);
    }

    private function noSpecialCharacters($text){

        $chars1 = array('O','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','&', 'ª', 'º', '%');
        $chars2 = array('o','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','e', 'a', 'o', 'perc');
        $text = str_replace($chars1, $chars2, $text);

        return $text;
    }

    public function translate($twet){
        
        //Se já for menor que o tamanho máximo, retorna como está
        if($this->strlen($twet) <= $this->maxlength)
            return $twet;

        //nível 1
        $t1 = array('você', 'quando', 'quanto', 'que',  'não', 'hoje');
        $t2 = array('vc',   'qdo',    'qto',    'q',    'ñ',    'hj');
        $twet = $this->rules($t1, $t2, $twet);

        //nível 2
        if ($this->strlen($twet) > $this->maxlength) {
            $t1 = array('de', 'para', 'te', 'se');
            $t2 = array('d', 'pra',   't', 'c');
            $twet = $this->rules($t1, $t2, $twet);
        }


        //nível 3
        if ($this->strlen($twet) > $this->maxlength) {
            $t1 = array('pra', 'uma', 'um');
            $t2 = array('p',    '1',  '1');
            $twet = $this->rules($t1, $t2, $twet);
        }

        //nível 4
        if ($this->strlen($twet) > $this->maxlength) {
            $t1 = array('querer', 'fazer', 'fizer',   'nova',   'novo');
            $t2 = array('qrer',   'fzer', 'fzer',     'nv',     'nv');
            $twet = $this->rules($t1, $t2, $twet);
        }

        //verifica se deve tirar caracteres especiais
        if($this->specialcharacters)
            $twet = $this->noSpecialCharacters($twet);

        //número de caracteres do resultado
        $this->length = $this->strlen($twet);


        return $twet;

    }



}
?>
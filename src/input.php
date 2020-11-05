<?php

namespace ptk\input;

/**
 * Entrada de dados do usuário, semelante a um input type=text do html.
 * 
 * @param string $prompt
 * @return string
 */
function entry(string $prompt): string {
    fwrite(STDOUT, $prompt);
    $input = trim(fgets(STDIN));
    return $input;
}

/**
 * Seleção única em uma lista de opções.
 * 
 * @param string $prompt
 * @param array $options
 * @param mixed $default
 * @return mixed Retorna a chave da opção selecionada.
 */
function choice(string $prompt, array $options, $default = null) {
    fwrite(STDOUT, $prompt.PHP_EOL);
    
    //define a largura máxima das chaves
    $len = 0;
    foreach ($options as $k => $v){
        if(strlen($k) > $len){
            $len = strlen($k);
        }
    }
    
    foreach ($options as $k => $v){
        $k = str_pad($k, $len, ' ', STR_PAD_BOTH);
        $message = "\t[$k]\t$v".PHP_EOL;
        fwrite(STDOUT, $message);
    }
    
    $message = 'Sua seleção';
    if(!is_null($default)){
        $message .= " [$default]";
    }
    $choice = entry($message.": ");
    
    if(!is_null($default)){
        if($choice == false){
            $choice = $default;
        }
    }
    
    return $choice;
}
<?php

require 'vendor/autoload.php';

echo ptk\input\entry("Qual é o seu nome? ");

$options = ['Opção 1', 'Opção 2', 'Opção 3'];
echo \ptk\input\choice("Escolha uma opção:", $options);
echo \ptk\input\choice("Escolha uma opção:", $options, 2);
<?php

function fstring($input){
    $debug = false;
    //$debug = true;

    $GLOBALS += get_defined_vars();

    // get variables which naming { ... }
    preg_match_all("/{([^\{\}]+)}/iu", $input, $matches);

    if(isset($matches[1])){
        foreach ($matches[1] AS $variable_name){
            if(array_key_exists($variable_name, $GLOBALS)){
                $variable_value = $GLOBALS[$variable_name];

                if ($debug) {
                    echo '$variable_name is: ' . print_r($variable_name, true) . PHP_EOL;
                    echo '$variable_value is: ' . print_r($variable_value, true) . PHP_EOL;
                    echo 'type of variable is: ' . print_r(gettype($variable_value), true) . PHP_EOL;
                }

                switch (gettype($variable_value)) {
                    case "object":
                    case "array":
                    case "resource":
                        $replacement = print_r($variable_value, true);
                        break;
                    case "boolean":
                        if($variable_value === true){
                            $replacement = "TRUE";
                        }elseif($variable_value === false){
                            $replacement = "FALSE";
                        }
                        break;
                    case "NULL":
                        $replacement = "NULL";
                        break;
                    default:
                        $replacement = $variable_value;
                }

                $needle = '{' . $variable_name . '}';

                if ($debug) {
                    echo '$replacement is: ' . print_r($replacement, true) . PHP_EOL;
                }
                $input = str_replace($needle, $replacement, $input);
            }
        }
    }

    return $input;
}

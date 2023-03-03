<?php
class Compiler
{
    function loopingArray($array, $name)
    {
        $keys = array_keys($array);
        for ($i = 0; $i < count($array); $i++) {
            if (!is_array($array[$keys[$i]])) {
                if (array_key_exists("type", $array)) {
                    $type = $array["type"];
                }
                if (array_key_exists("value", $array)) {
                    $values = $array["value"];
                }
                $this->output($name, $type, $values);
                $name = str_replace("_$keys[$i]", "", $name);
                break;
            } else if (is_array($array[$keys[$i]]) && array_key_exists("value", $array)) {
                if (array_key_exists("type", $array)) {
                    $type = $array["type"];
                }
                if (array_key_exists("value", $array)) {
                    $values = $array["value"];
                }
                $this->output($name, $type, $values);
                $name = $keys[$i] . "_";
                break;
            } else if (array_key_exists("value", $array)) {
                if (array_key_exists("type", $array)) {
                    $type = $array["type"];
                }
                if (array_key_exists("value", $array)) {
                    $values = $array["value"];
                }
                $this->output($name, $type, $values);
                $name = $keys[$i] . "_";
                break;
            } else if (!array_key_exists("value", $array)) {
                $name .= $keys[$i] . "_";
                echo "<b>$keys[$i]</b><br>";
                $name = str_replace("_$keys[$i]]", "", $name);
                if (is_array($array[$keys[$i]])) {
                    $this->loopingArray($array[$keys[$i]], $name);
                }
                $name = str_replace("_$keys[$i]", "", $name);
            }
        }
    }

    function output($name, $type, $value)
    {
        $name = strtolower($name);
        $name = str_replace(["@", "-"], "_", $name);
        $name = substr($name, 0, strlen($name) - 1);
        if (!is_array($value) && !is_array($type)) {
            echo "$name<br>$value<br>$type<br><br>";
        }else{
            echo "$name<br>$type<br>";
            print_r($value);
            echo "<br><br>";
        }
    }
}

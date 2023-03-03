<?php
include('constant/constant.php');
include('helper/Helper.php');
class Compiler
{
    private $helper;
    private $color = array("color", "colors");
    private $dimens = array("lineHeights");
    private $fontDimens = array("fontSizes");
    private $typography = array("typography");
    private $textAppeareance = array(
        "fontFamily" => "android:fontFamily",
        "lineHeight" => "android:lineHeight",
        "fontSize" => "android:textSize",
    );
    private $styleRef = array(
        "fontFamily" => "@font",
        "lineHeight" => "@dimen",
        "fontSize" => "@dimen",
    );
    private $globalArray = [];
    public function __construct($array)
    {
        $this->helper = new Helper();
        $this->globalArray = $array;
    }
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
            if (in_array($type, $this->color)) {
                $this->outputToColorsXml($name, $value);
            }

            if (in_array($type, $this->dimens)) {
                if (is_numeric($value))
                    $this->outputToGlobalDimensXml($name, $value);
            }
            if (in_array($type, $this->fontDimens)) {
                if (is_numeric($value))
                    $this->outputToFontDimensXml($name, $value);
            }
        } else {
            if (in_array($type, $this->typography)) {
                echo "$name<br>$type<br>";
                $tagBuka = '<style name="' . $name . '" parent="Widget.MaterialComponents.TextView">';
                $tagTutup = '</style>';
                $content = "";
                foreach ($value as $ii => $k) {
                    if (key_exists($ii, $this->textAppeareance)) {
                        $exp = explode(".", str_replace(["{", "}"], "", $k));
                        $content .=
                            '    <item name="' . $this->textAppeareance[$ii] . '">' . $this->styleRef[$ii] . strtolower("/global_$exp[0]_$exp[1]") . '</item>' . PHP_EOL;
                    }
                }
                $this->outputToGlobalStylesXml(PHP_EOL.$tagBuka . PHP_EOL . $content . $tagTutup . PHP_EOL);
            }
        }
    }

    function outputToColorsXml($name, $value)
    {
        $colorTag = '<color name="' . $name . '">' . $value . '</color>' . PHP_EOL;
        $this->helper->writeToColorResourceExist($colorTag);
    }
    function outputToFontDimensXml($name, $value)
    {
        $dimensTag = '<dimen name="' . $name . '">' . $value . 'sp</dimen>' . PHP_EOL;
        $this->helper->writeToFontDimensResourceExist($dimensTag);
    }
    function outputToGlobalDimensXml($name, $value)
    {
        $dimensTag = '<dimen name="' . $name . '">' . $value . 'dp</dimen>' . PHP_EOL;
        $this->helper->writeToDimensResourceExist($dimensTag);
    }
    function outputToGlobalIntegersXml()
    {
    }
    function outputToGlobalStringsXml()
    {
    }
    function outputToGlobalStylesXml($styles)
    {
        $this->helper->writeToStylesResourceExist($styles);
    }
}

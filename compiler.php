<?php
include('config.php');
include('constant/constant.php');
include('helper/Helper.php');
class Compiler
{
    private $helper;
    private $config;
    private $globalArray = [];
    public function __construct($array)
    {
        $this->helper = new Helper();
        $this->globalArray = $array;
        $this->config = new Config();
        echo "Generate file...";
    }
    function loopingArray($array, $name, $isUsingGlobalRef)
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
                $this->output($name, $type, $values, $isUsingGlobalRef);
                $name = str_replace("_$keys[$i]", "", $name);
                break;
            } else if (is_array($array[$keys[$i]]) && array_key_exists("value", $array)) {
                if (array_key_exists("type", $array)) {
                    $type = $array["type"];
                }
                if (array_key_exists("value", $array)) {
                    $values = $array["value"];
                }
                $this->output($name, $type, $values, $isUsingGlobalRef);
                $name = $keys[$i] . "_";
                break;
            } else if (array_key_exists("value", $array)) {
                if (array_key_exists("type", $array)) {
                    $type = $array["type"];
                }
                if (array_key_exists("value", $array)) {
                    $values = $array["value"];
                }
                $this->output($name, $type, $values, $isUsingGlobalRef);
                $name = $keys[$i] . "_";
                break;
            } else if (!array_key_exists("value", $array)) {
                $name .= $keys[$i] . "_";
                $name = str_replace("_$keys[$i]]", "", $name);
                if (is_array($array[$keys[$i]])) {
                    $this->loopingArray($array[$keys[$i]], $name, $isUsingGlobalRef);
                }
                $name = str_replace("_$keys[$i]", "", $name);
            }
        }
    }

    function output($name, $type, $value, $isUsingGlobalRef)
    {
        $name = strtolower($name);
        $name = str_replace(["@", "-", " "], "_", $name);
        $name = substr($name, 0, strlen($name) - 1);
        if (!is_array($value) && !is_array($type)) {
            if (in_array($type, $this->config->color)) {
                if ($isUsingGlobalRef) {
                    $exp = explode(".", str_replace(["{", "}"], "", $value));
                    $xp = implode("_", $exp);
                    $newValue = "@color/global_$xp";
                    $this->outputToColorsXml($name, $newValue);
                } else {

                    $this->outputToColorsXml($name, $value);
                }
            }

            if (in_array($type, $this->config->dimens)) {
                if (is_numeric($value))
                    $this->outputToGlobalDimensXml($name, $value);
            }

            if (in_array($type, $this->config->globalIntegers)) {
                if (is_numeric($value))
                $this->outputToGlobalIntegersXml($name, $value);
            }
            if (in_array($type, $this->config->fontDimens)) {
                if (is_numeric($value))
                $this->outputToFontDimensXml($name, $value);
            }
            if (in_array($type, $this->config->typography)) {
                if ($isUsingGlobalRef) {
                    $exp = explode(".", str_replace(["{", "}", "@"], "", str_replace(["@"], "_", $value)));
                    $xp = strtolower(implode("_", $exp));
                    $tagBuka = '<style name="' . $name . '" parent="global_' . $xp . '"/>';
                    $this->outputToGlobalStylesXml(PHP_EOL . $tagBuka . PHP_EOL);
                }
            }
        } else {
            if (in_array($type, $this->config->typography)) {
                $tagBuka = '<style name="' . $name . '" parent="Widget.MaterialComponents.TextView">';
                $tagTutup = '</style>';
                $content = "";
                foreach ($value as $ii => $k) {
                    $exp = explode(".", str_replace(["{", "}"], "", $k));
                    if (key_exists($ii, $this->config->textAppeareance)) {
                        if (is_array($this->config->textAppeareance[$ii])) {
                            $prop = explode(",", $this->config->textAppeareance[$ii]['prop']);
                            $tools = explode(",", $this->config->textAppeareance[$ii]['tools']);
                            foreach ($prop as $ki => $pp) {
                                $content .=
                                    '    <item name="' . $pp . '" ' . $tools[$ki] . '>@integer' .  strtolower("/global_$exp[0]_$exp[1]") . '</item>' . PHP_EOL;
                            }
                        } else {
                            $content .=
                                '    <item name="' . $this->config->textAppeareance[$ii] . '">' . $this->config->styleRef[$ii] . strtolower("/global_$exp[0]_$exp[1]") . '</item>' . PHP_EOL;
                        }
                    }
                }
                $this->outputToGlobalStylesXml(PHP_EOL . $tagBuka . PHP_EOL . $content . $tagTutup . PHP_EOL);
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
    function outputToGlobalIntegersXml($name, $value)
    {
        $integersTag = '<integer name="' . $name . '">' . $value . '</integer>' . PHP_EOL;
        $this->helper->writeToIntegersResourceExist($integersTag);
    }
    function outputToGlobalStringsXml()
    {
    }
    function outputToGlobalStylesXml($styles)
    {
        $this->helper->writeToStylesResourceExist($styles);
    }
}

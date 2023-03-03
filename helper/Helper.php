<?php
include('header/header_tag.php');
class Helper
{
    private $tag;

    public function __construct()
    {
        $this->tag = new Headertag();
    }
    private function isColorResourceExist()
    {
        if (!is_file('output/colors.xml')) {
            return fopen("output/colors.xml", "a");
        } else
            return fopen("output/colors.xml", "a");
    }
    function writeToColorResourceExist($colorTag)
    {
        $colorsXml = $this->isColorResourceExist();
        // Seek to the end
        fseek($colorsXml, SEEK_SET, 0);
        // Get and save that position
        // Write your data
        fwrite($colorsXml, $colorTag);
        // Close the file handler
        fclose($colorsXml);
    }

    function isFontDimensResourceExist()
    {
        if (!is_file('output/fontDimens.xml')) {
            return fopen("output/fontDimens.xml", "a");
        } else
            return fopen("output/fontDimens.xml", "a");
    }
    function writeToFontDimensResourceExist($dimensTag)
    {
        $dimensXml = $this->isFontDimensResourceExist();
        // Seek to the end
        fseek($dimensXml, SEEK_SET, 0);
        // Get and save that position
        // Write your data
        fwrite($dimensXml, $dimensTag);
        // Close the file handler
        fclose($dimensXml);
    }
    private function isDimensResourceExist()
    {
        if (!is_file('output/dimens.xml')) {
            return fopen("output/dimens.xml", "a");
        } else
            return fopen("output/dimens.xml", "a");
    }
    function writeToDimensResourceExist($dimensTag)
    {
        $dimensXml = $this->isDimensResourceExist();
        // Seek to the end
        fseek($dimensXml, SEEK_SET, 0);
        // Get and save that position
        // Write your data
        fwrite($dimensXml, $dimensTag);
        // Close the file handler
        fclose($dimensXml);
    }
    function isIntegersResourceExist()
    {
        if (!is_file('output/integers.xml')) {
            fopen("integers.xml", "w");
        }
    }
    function isStringsResourceExist()
    {
        if (!is_file('output/strings.xml')) {
            fopen("strings.xml", "w");
        }
    } 
    
    private function isStyleResourceExist()
    {
        if (!is_file('output/styles.xml')) {
            return fopen("output/styles.xml", "a");
        } else
            return fopen("output/styles.xml", "a");
    }

    function writeToStylesResourceExist($styleValue)
    {
        $styleXml = $this->isStyleResourceExist();
        // Seek to the end
        fseek($styleXml, SEEK_SET, 0);
        // Get and save that position
        // Write your data
        fwrite($styleXml, $styleValue);
        // Close the file handler
        fclose($styleXml);
    }
}

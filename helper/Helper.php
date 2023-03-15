<?php
include('../config.php');
class Helper
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }
    private function isColorResourceExist()
    {
        if (!is_file($this->config->colorsResourcePath)) {
            return fopen($this->config->colorsResourcePath, "a");
        } else
            return fopen($this->config->colorsResourcePath, "a");
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
        if (!is_file($this->config->fontDimensResourcePath)) {
            return fopen($this->config->fontDimensResourcePath, "a");
        } else
            return fopen($this->config->fontDimensResourcePath, "a");
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
        if (!is_file($this->config->dimensResourcePath)) {
            return fopen($this->config->dimensResourcePath, "a");
        } else
            return fopen($this->config->dimensResourcePath, "a");
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
    private function isIntegersResourceExist()
    {
        if (!is_file($this->config->integersResourcePath)) {
            return fopen($this->config->integersResourcePath, "a");
        } else
            return fopen($this->config->integersResourcePath, "a");
    }
    function writeToIntegersResourceExist($integersTag)
    {
        $integersXml = $this->isIntegersResourceExist();
        // Seek to the end
        fseek($integersXml, SEEK_SET, 0);
        // Get and save that position
        // Write your data
        fwrite($integersXml, $integersTag);
        // Close the file handler
        fclose($integersXml);
    }
    function isStringsResourceExist()
    {
        if (!is_file('output/strings.xml')) {
            fopen("strings.xml", "w");
        }
    }

    private function isStyleResourceExist()
    {
        if (!is_file($this->config->stylesResourcePath)) {
            return fopen($this->config->stylesResourcePath, "a");
        } else
            return fopen($this->config->stylesResourcePath, "a");
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

if you want to use this design token compiler, include this project inside root of android project you have.

this project is only work with Figma Plugin “Token Studio“

Execute this project using command line for simple. 
php -f index.php


note: make sure php can access from global.

step to use:
    1. Change your config in config.php
    2. process your global design token first. 
    2. If you're done for global design, you can continue to platform spesific. On platform specific, you still need array global design token.

folder structure:
    + helper
        - helper.php (contains logic for write output into the specific file)
    + output
        - colors.xml (output for color resources in android)
        - dimens.xml (output for general dimens (in dp) in android)
        - fontDimens.xml (output for font dimens (in sp) in android)
        - integers.xml (output for global interger in android)
        - strings.xml (output for global string in android)
        - styles.xml (output for global style in android)
        note: for android resouces, you have to rearrange your content resource if you include this lib into android project (move ouput between <resources></resources>)
    - compiler.php (main logic for processing json token out to specific file)
    - config.php (contains project configuration)
    - index.php (start node)
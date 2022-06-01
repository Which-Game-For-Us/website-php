<?php
function Index() {
    $includeDir = ".".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR;
    $includeDefault = $includeDir."informations.php";
    if(isset($_GET['p']) && !empty($_GET['p'])):
        $_GET['p'] = str_replace("\0", '', $_GET['p']);
        $includeFile = basename(realpath($includeDir.$_GET['p'].".php"));
        $includePath = $includeDir.$includeFile;
        if(!empty($includeFile) && file_exists($includePath)):
            include $includePath;
        else:
            include $includeDefault;
        endif;
    else:
        include $includeDefault;
    endif;
};
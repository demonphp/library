<?php

$substr = "index.html";
$log =
<<< logfile
        192.168.1.11:/www/htdocs/index.html:[2016/08/10:21:58:27]
        192.168.1.11:/www/htdocs/index.html:[2016/08/18:01:51:37]
        192.168.1.11:/www/htdocs/index.html:[2016/08/20:11:48:27]
logfile;

    $pos =strpos($log, $substr);
    $pos2=strpos($log,"\n",$pos);
    $pos=$pos+strlen($substr)+1;
    $timestamp=substr($log,$pos,$pos2-$pos);
    echo "The file $substr was first accessed on:$timestamp";
    echo "<br>";
    $author="lester@example.com";
    $author=str_replace("@", "at", $author);
    echo "connect the author of this article at $author";
    echo "<br>";
    echo ltrim(strstr($author,"@"), "@");
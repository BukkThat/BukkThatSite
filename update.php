<?php
$ip = $_SERVER['REMOTE_ADDR'];
error_reporting(E_ERROR);
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}
$image = file_get_contents("https://github.com/BukkThat/BukkThatSite/archive/master.zip");
file_put_contents("master.zip", $image);
$zip = new ZipArchive;
if ($zip->open('master.zip') === TRUE) {
    $zip->extractTo(getcwd());
    $zip->close();
    recurse_copy(getcwd() . "/BukkThatSite-master/", getcwd());
    unlink("master.zip");
    rmdir_recursive(getcwd() . "/BukkThatSite-master/");
    file_put_contents("logs/gitlog.txt", "\n" . date("Y-m-d H:i:s") . ": Successful deploy from $ip", FILE_APPEND | LOCK_EX);   
} else {
    file_put_contents("logs/gitlog.txt", "\n" . date("Y-m-d H:i:s") . ": FAILED deploy from $ip", FILE_APPEND | LOCK_EX);
}
?>

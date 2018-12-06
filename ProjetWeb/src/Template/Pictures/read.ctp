<?php foreach($pictures as $key => $value){
    $path = "/img/photos/".$value->file;
    echo "<img src='$path'>";
}

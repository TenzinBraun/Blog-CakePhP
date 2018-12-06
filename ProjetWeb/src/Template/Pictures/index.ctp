<?php
foreach ($pictures as $picture){

    echo $this->Html->image($picture->file, ['alt' => $picture->description]);
}
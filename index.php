<?php

require_once __DIR__ . '/vendor/autoload.php';

use Vlc\Vlc;

$vlc = new Vlc('', '123456789');

$vlc->restart();
$vlc->play();

$vlc->seekTo(120);
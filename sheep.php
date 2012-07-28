<?php
include __DIR__.'/lib/screen.php';
include __DIR__.'/lib/sprite.php';

$alpha = include __DIR__.'/letters.php';

$screen = new Screen(101, 31);
$screen->clear();

$sheepy = array_map(function($line){
  return trim($line, "\n");
}, file(__DIR__."/images/tomnomnom.jpg.txt"));

$sheepySprite = new Sprite([100,2], function($screen) use($sheepy){
  if ($this->c[0] > 5){
    $this->c[0] -= 2;
  } 
  $screen->sprite($this->c, $sheepy);
});
$screen->attachSpriteObject($sheepySprite);

$border = new Sprite([0,0], function($screen){
  $screen->rect($this->c, [100,30], '#');
});
$screen->attachSpriteObject($border);

while (true){
  $screen->clear();
  $screen->drawFrame();
  usleep(65000);
}


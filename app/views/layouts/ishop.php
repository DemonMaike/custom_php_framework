<?php
use Pfm\View;

echo $this->getPart("parts/header");
echo $this->content;
echo $this->getPart("parts/footer");
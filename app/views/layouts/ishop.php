<?php
use Pfm\View;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=$this->getMeta()?>
</head>
<body>
    <?php
        echo $this->content;
    ?>
</body>
</html>
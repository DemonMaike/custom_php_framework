<?php
use Pfm\View;
?>

<?php $this->getPart("parts/header") ?>
<?php echo $this->content;?>
<?php $this->getPart("parts/footer") ?>
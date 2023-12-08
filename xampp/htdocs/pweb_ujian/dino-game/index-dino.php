<?php
include './header.php';
// Your PHP code here.

// Home Page template below.
?>

<?=template_header('Dino')?>

<div class="content">
	<h2>Dino Game</h2>
</div>
<div style="text-align: center;">
    <script src="index.js" defer type="module"></script>
    <canvas id="game"></canvas>
</div>

<?=template_footer()?>
<?php
include './functions.php';
// Your PHP code here.

// Home Page template below.
?>

<?=template_header('Home')?>

<style>
    body {
        overflow: hidden;
    }
    .video-container {
        position: absolute;
        width: 100%;
        height: 100vh;
        overflow: hidden;
		z-index: 1;
    }
    video {
		width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
	}
	.content {
		position: absolute;
		z-index: 2;
		text-align: center;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
	}
</style>

<div class="video-container">
    <video autoplay muted loop>
        <source src="vid1.mp4" type="video/mp4">
    </video>
</div>

<div class="content">
	<img src="img1.png" alt="Roy Kimochi">
	<p class="welcome-paragraph">Selamat datang di website buatan Satria "Roy Kimochi" Harya Sulistyo!</p>
</div>

<?=template_footer()?>
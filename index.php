<?php
	header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60 * 24))); // 1 hour
?><!DOCTYPE HTML>
<html>
	<head>
		<title>Johansen.WTF</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="apple-touch-icon" sizes="57x57" href="/assets/assets/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/assets/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/assets/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/assets/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/assets/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/assets/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/assets/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/assets/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/assets/ms-icon-144x144.png">
		
		<style type="text/css">
			@font-face {
				font-family: Overpass;
				src: url("fonts/OverpassMono-VariableFont_wght.ttf");
			}

			body {
				font-family: 'Overpass', sans-serif;
				color: #FFFFFF;
			}
			video {
			  position: fixed;
			  right: 0;
			  bottom: 0;
			  min-width: 100%; 
			  min-height: 100%;
				transform: translateX(calc((100% - 100vw) / 2));
			}
			
			.centered {
			  position: fixed;
			  top: 50%;
			  left: 50%;
			  transform: translate(-50%, -50%);
			  text-align:center;
			}
			
			img.logo {
				max-width: 100%;
				height: auto;
			}
			
			img.teamviewer {
				position: absolute;
				bottom: 15px;
				right: 15px;
			}
		</style>
	</head>
	<body>
		<video class="lazy" autoplay muted loop id="myVideo" poster="/assets/background.jpeg">
			<source data-src="/assets/background.mp4" type="video/mp4">
			<source data-src="/assets/background.webm" type="video/webm">
			<source data-src="/assets/background.ogg" type="video/ogg">
		</video>
		<div class="centered">
			<img class="logo" src="/assets/logo.png" /><br />
			<a><strong id="icanhazdadjoke">&nbsp;</strong></a>
		</div>
		
		<script src="/assets/scripts.js"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
			var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

			if ("IntersectionObserver" in window) {
				var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(video) {
					if (video.isIntersecting) {
					for (var source in video.target.children) {
						var videoSource = video.target.children[source];
						if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
						videoSource.src = videoSource.dataset.src;
						}
					}

					video.target.load();
					video.target.classList.remove("lazy");
					lazyVideoObserver.unobserve(video.target);
					}
				});
				});

				lazyVideos.forEach(function(lazyVideo) {
				lazyVideoObserver.observe(lazyVideo);
				});
			}
			});
		</script>
	</body>
</html>

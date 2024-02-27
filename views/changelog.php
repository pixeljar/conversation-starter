<?php
/**
 * Changelog view.
 *
 * @package Conversation_Starter
 */

?>

<div class="wrap">
	<h1>Conversation Starter - Changelog</h1>

	<h3>1.4</h3>
	<ul>
		<li>This version represents a major modernization of the codebase</li>
		<li>Updated to work with WordPress 6.5</li>
		<li>Updated to work with PHP 8</li>
		<li>This version implements standard security practices</li>
	</ul>

	<h3>1.3</h3>
	<ul>
		<li>Removes deprecated functions and checks for array variables.</li>
		<li>Adds changelog page.</li>
	</ul>

	<h3>1.2</h3>
	<ul>
		<li>Fixed cases when incorrect prompt would show up above the comment form.</li>
		<li>Fixed several escaping functions that led to data being placed in incorrect places.</li>
	</ul>

	<h3>1.1.1</h3>
	<ul>
		<li>Stopped the box from showing up when no message was defined for a post (posts written before the plugin was installed)</li>
	</ul>

	<h3>1.1</h3>
	<ul>
		<li>The security holes have been patched up.</li>
		<li>Reworked how the prompt was attached to the comment form to allow for greater compatibility with more themes.</li>
	</ul>

	<h3>1.0</h3>
	<ul>
		<li>It's version 1 baby, what you see is what you get.</li>
	</ul>

	<div class="pixel-jar-ads">
		<h3>More from Pixel Jar</h3>

		<div class="ad-flex-container">
			<div class="ad">
				<a href="https://www.pixeljar.com/" target="_blank">
					<img
						src="<?php echo esc_url( PJ_CONVO_ASSETS . 'images/pixel-jar.svg' ); ?>"
						alt="Pixel Jar logo"
					/>
				</a>
				<p>Conversation Starter is proudly powered by Pixel Jar. We're a small web development agency that focuses on WordPress as a development platform for websites. Pixel Jar started in 2004. It grew out of the desire to be free to choose projects that challenge us and work with clients that inspire us. Read more about us <a href="https://pixeljar.com" target="_blank">here</a></p>
			</div>

			<div class="ad">
				<a href="https://adsanityplugin.com/" target="_blank">
					<img
						src="<?php echo esc_url( PJ_CONVO_ASSETS . 'images/adsanity.svg' ); ?>"
						alt="AdSanity logo"
					/>
				</a>
				<p>Pixel Jar also makes AdSanity, a light ad rotator plugin for WordPress. It allows the user to create and manage ads shown on a website as well as keep statistics on views and clicks through a robust set of features. You can read all about it on the <a href="https://adsanityplugin.com" target="_blank">AdSanity site</a>.</p>
			</div>
		</div>
	</div>
</div>

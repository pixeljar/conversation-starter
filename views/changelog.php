<div class="wrap">
	<h1><?php esc_html_e( 'Conversation Starter Changelog', 'pj-convo' ); ?></h1>

	<h3>1.3</h3>
	<ul>
		<li>Removes deprecated functions and checks for array variables.</li>
		<li>Adds changelog page.</li>
	</ul>

	<h3>1.2</h3>
	<ul>
		<li><?php esc_html_e( 'Fixed cases when incorrect prompt would show up above the comment form.', 'pj-convo' ); ?></li>
		<li><?php esc_html_e( 'Fixed several escaping functions that led to data being placed in incorrect places.', 'pj-convo' ); ?></li>
	</ul>

	<h3>1.1.1</h3>
	<ul>
		<li><?php esc_html_e( 'Stopped the box from showing up when no message was defined for a post (posts written before the plugin was installed)', 'pj-convo' ); ?></li>
	</ul>

	<h3>1.1</h3>
	<ul>
		<li><?php esc_html_e( 'The security holes have been patched up.', 'pj-convo' ); ?></li>
		<li><?php esc_html_e( 'Reworked how the prompt was attached to the comment form to allow for greater compatibility with more themes.', 'pj-convo' ); ?></li>
	</ul>

	<h3>1.0</h3>
	<ul>
		<li><?php esc_html_e( 'It\'s version 1 baby, what you see is what you get.', 'pj-convo' ); ?></li>
	</ul>

	<div class="pixel-jar-ads">
		<h3><?php esc_html_e( 'More from Pixel Jar', 'pj-convo' ); ?></h3>

		<div class="ad-flex-container">
			<div class="ad">
				<a href="https://www.pixeljar.com/" target="_blank">
					<img
						src="<?php echo PJ_CONVO_ASSETS . 'images/pixel-jar.svg' ?>"
						alt="<?php esc_attr_e( 'Pixel Jar logo', 'pj-convo' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( 'Conversation Starter is proudly powered by %1$s. We’re a small web development agency that focuses on %2$s as a development platform for websites. %1$s started in 2004. It grew out of the desire to be free to choose projects that challenge us and work with clients that inspire us. Read more about us <a href="%3$s" target="_blank">here</a>.', 'pj-convo' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Pixel Jar',
						'WordPress',
						esc_url( 'https://www.pixeljar.com' )
					);
				?></p>
			</div>

			<div class="ad">
				<a href="https://adsanityplugin.com/" target="_blank">
					<img
						src="<?php echo PJ_CONVO_ASSETS . 'images/adsanity.svg' ?>"
						alt="<?php esc_attr_e( 'AdSanity logo', 'pj-convo' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( '%1$s also makes %2$s, a light ad rotator plugin for %3$s. It allows the user to create and manage ads shown on a website as well as keep statistics on views and clicks through a robust set of features. You can read all about it on the <a href="%4$s" target="_blank">%2$s site</a>.', 'pj-convo' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Pixel Jar',
						'AdSanity',
						'WordPress',
						esc_url( 'https://adsanityplugin.com/' )
					);
				?></p>
			</div>

			<div class="ad">
				<a href="https://www.clickrangerpro.com/" target="_blank">
					<img
						src="<?php echo PJ_CONVO_ASSETS . 'images/click-ranger-pro.svg' ?>"
						alt="<?php esc_attr_e( 'Click Ranger Pro logo', 'pj-convo' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( '%1$s helps you easily track user clicks, downloads, and events of your %2$s website to %3$s. Get the data you need without the fuss of JavaScript or PHP. You can read all about it on the <a href="%4$s" target="_blank">%1$s site</a>.', 'pj-convo' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Click Ranger Pro',
						'WordPress',
						'Google Analytics',
						esc_url( 'https://www.clickrangerpro.com/' )
					);
				?></p>
			</div>
		</div>
	</div>
</div>

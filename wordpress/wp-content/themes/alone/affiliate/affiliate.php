<?php
function affiliate_register_admin_script() {
  wp_register_style('affiliate', get_template_directory_uri() . '/affiliate/affiliate.css' );
  wp_enqueue_style('affiliate');

}
add_action( 'admin_enqueue_scripts', 'affiliate_register_admin_script' );

/* Elementor affiliate */
function affiliate_elementor_render() {
  ?>
  <div class="notice bears-elementor-notice is-dismissible">
    <div class="media">
      <a href="https://trk.elementor.com/23969" target="_blank">
        <div class="overlay">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="163px" height="27px" viewBox="0 0 163 27"><g id="e-text"><path id="Path" d="M102.054 12.939 C102.054 12.939 100.65 13.273 99.465 13.557 L97.66 13.968 C97.655 13.968 97.647 13.968 97.645 13.968 97.645 13.482 97.68 12.969 97.796 12.497 97.946 11.891 98.274 11.183 98.842 10.872 99.461 10.534 100.216 10.494 100.872 10.756 101.551 11.025 101.861 11.68 101.995 12.359 102.032 12.548 102.058 12.738 102.075 12.931 L102.054 12.939 Z M106.756 13.966 C106.756 9.259 103.792 7.235 100.006 7.235 95.724 7.235 93.043 10.201 93.043 13.989 93.043 18.108 95.325 20.79 100.241 20.79 102.899 20.79 104.405 20.32 106.192 19.425 L105.51 16.341 C104.145 16.953 102.876 17.329 101.181 17.329 99.324 17.329 98.264 16.623 97.865 15.305 L106.638 15.305 C106.709 14.953 106.756 14.554 106.756 13.966 Z" fill="currentColor" stroke="none"></path><path id="Path-1" d="M62.925 12.939 C62.925 12.939 61.521 13.273 60.336 13.557 L58.532 13.968 C58.526 13.968 58.518 13.968 58.516 13.968 58.516 13.482 58.551 12.969 58.667 12.497 58.817 11.891 59.145 11.183 59.713 10.872 60.332 10.534 61.087 10.494 61.743 10.756 62.422 11.025 62.732 11.68 62.866 12.359 62.903 12.548 62.929 12.738 62.947 12.931 L62.925 12.939 Z M67.627 13.966 C67.627 9.259 64.663 7.235 60.877 7.235 56.595 7.235 53.914 10.201 53.914 13.989 53.914 18.108 56.196 20.79 61.112 20.79 63.77 20.79 65.276 20.32 67.063 19.425 L66.381 16.341 C65.017 16.953 63.747 17.329 62.052 17.329 60.195 17.329 59.135 16.623 58.736 15.305 L67.509 15.305 C67.58 14.953 67.627 14.554 67.627 13.966 Z" fill="currentColor" stroke="none"></path><path id="Path-2" d="M52.311 3.776 L47.967 3.776 47.967 20.32 52.311 20.32 52.311 3.776 Z" fill="currentColor" stroke="none"></path><path id="Path-3" d="M107.674 7.658 L112.238 7.658 113.198 10.583 C113.799 9.139 115.151 7.281 117.55 7.281 120.842 7.281 122.631 8.951 122.631 13.258 L122.631 20.319 118.069 20.319 C118.069 18.847 118.071 17.376 118.072 15.905 118.072 15.231 118.061 14.556 118.071 13.881 118.078 13.258 118.122 12.615 117.791 12.056 117.567 11.679 117.2 11.401 116.803 11.212 115.997 10.827 115.124 10.839 114.334 11.25 114.139 11.35 113.199 11.859 113.199 12.095 L113.199 20.319 108.637 20.319 108.637 11.075 107.674 7.658 Z" fill="currentColor" stroke="none"></path><path id="Path-4" d="M126.324 10.976 L124.23 10.976 124.23 7.658 126.324 7.658 126.324 5.583 130.886 4.509 130.886 7.658 135.472 7.658 135.472 10.976 130.886 10.976 130.886 14.695 C130.886 16.154 131.592 16.837 132.65 16.837 133.731 16.837 134.344 16.695 135.26 16.39 L135.801 19.826 C134.554 20.367 133.002 20.626 131.425 20.626 128.109 20.626 126.32 19.049 126.32 15.991 L126.32 10.976 126.324 10.976 Z" fill="currentColor" stroke="none"></path><path id="Path-5" d="M144.252 17.026 C145.921 17.026 146.91 15.826 146.91 13.895 146.91 11.964 145.968 10.858 144.323 10.858 142.652 10.858 141.689 11.964 141.689 13.966 141.689 15.848 142.631 17.026 144.252 17.026 Z M144.299 7.165 C148.581 7.165 151.708 9.847 151.708 14.013 151.708 18.202 148.581 20.72 144.252 20.72 139.947 20.72 136.889 18.131 136.889 14.013 136.891 9.847 139.926 7.165 144.299 7.165 Z" fill="currentColor" stroke="none"></path><path id="Path-6" d="M88.954 7.619 C88.146 7.287 87.232 7.163 86.361 7.288 85.917 7.353 85.483 7.481 85.08 7.68 83.975 8.227 83.112 9.472 82.648 10.583 82.345 9.304 81.459 8.152 80.165 7.619 79.357 7.287 78.443 7.163 77.573 7.288 77.128 7.353 76.694 7.481 76.291 7.68 75.188 8.225 74.327 9.466 73.863 10.573 L73.863 10.492 72.934 7.658 68.371 7.658 69.332 11.075 69.332 20.32 73.865 20.32 73.865 12.06 C73.881 11.999 74.084 11.885 74.119 11.857 74.65 11.48 75.275 11.09 75.939 11.041 76.617 10.99 77.286 11.336 77.691 11.875 77.734 11.934 77.775 11.993 77.813 12.056 78.145 12.615 78.1 13.258 78.092 13.881 78.084 14.556 78.095 15.23 78.094 15.905 78.092 17.376 78.09 18.847 78.09 20.318 L82.654 20.318 82.654 13.258 C82.654 13.222 82.654 13.187 82.654 13.151 L82.654 12.062 C82.664 12.003 82.872 11.883 82.91 11.857 83.44 11.48 84.065 11.09 84.73 11.041 85.408 10.99 86.076 11.336 86.481 11.875 86.525 11.934 86.566 11.993 86.603 12.056 86.935 12.615 86.89 13.258 86.884 13.881 86.876 14.556 86.888 15.23 86.886 15.905 86.884 17.376 86.882 18.847 86.882 20.318 L91.445 20.318 91.445 13.258 C91.443 11.189 91.146 8.522 88.954 7.619 Z" fill="currentColor" stroke="none"></path><path id="Path-7" d="M162.503 7.283 C160.105 7.283 158.752 9.141 158.151 10.585 L157.189 7.66 152.625 7.66 153.586 11.077 153.586 20.322 158.151 20.322 158.151 11.779 C158.801 11.665 162.33 12.314 163 12.56 L163 7.298 C162.837 7.289 162.672 7.283 162.503 7.283 Z" fill="currentColor" stroke="none"></path><path id="Path-8" d="M41.663 12.516 C41.663 12.516 40.26 12.851 39.074 13.134 L37.27 13.545 C37.264 13.545 37.256 13.545 37.254 13.545 37.254 13.059 37.29 12.546 37.405 12.074 37.555 11.468 37.883 10.76 38.451 10.449 39.07 10.111 39.825 10.071 40.482 10.333 41.16 10.603 41.471 11.257 41.604 11.936 41.642 12.125 41.667 12.316 41.685 12.508 L41.663 12.516 Z M46.367 13.543 C46.367 8.836 43.403 6.813 39.617 6.813 35.335 6.813 32.654 9.778 32.654 13.566 32.654 17.685 34.937 20.368 39.853 20.368 42.51 20.368 44.016 19.897 45.803 19.003 L45.121 15.919 C43.757 16.53 42.487 16.906 40.792 16.906 38.935 16.906 37.875 16.2 37.476 14.882 L46.249 14.882 C46.32 14.532 46.367 14.131 46.367 13.543 Z" fill="currentColor" stroke="none"></path></g><path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.2084C0 20.4107 5.83624 26.2501 13.0347 26.2501C20.2332 26.2501 26.0695 20.4107 26.0695 13.2084C26.0695 6.00609 20.2332 0.166748 13.0347 0.166748C5.83624 0.166748 0 6.00609 0 13.2084ZM9.77554 7.77424H7.60342V18.6426H9.77554V7.77424ZM11.9477 7.77424H18.4641V9.94753H11.9477V7.77424ZM18.4641 12.1208H11.9477V14.2941H18.4641V12.1208ZM11.9477 16.4693H18.4641V18.6426H11.9477V16.4693Z" fill="currentColor" id="e-icon"></path></svg>
        </div>

        <video class="elementor-video" src="https://elementor.com/wp-content/uploads/2021/06/02_MainVideo_1066_600_HR201.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://elementor.com/wp-content/uploads/2021/05/home-hero-1.png"></video>
      </a>
    </div>

    <div class="content">
      <h3 class="title">
        <a href="https://trk.elementor.com/23969" target="_blank">New 50+ Pro widgets to design awesome & responsive property detail pages</a>
      </h3>
      <div class="desc">Elementor is the leading website builder platform for professionals on WordPress with 5+ million active installations. Therefore, it is tested carefully with a large community of developers. And now, ALone is fully compatible with Elementor.</div>
      <a class="get-ele-pro" href="https://trk.elementor.com/23969" target="_blank">Get Elementor Pro</a>
    </div>
  </div>
  <?php
}
add_action( 'admin_notices', 'affiliate_elementor_render', - 10 );

/* Give affiliate */
remove_action( 'admin_menu', 'give_add_add_ons_option_link', 999999 );

function affiliate_give_add_add_ons_option_link() {
	global $submenu;

	// Show menu only if user has permission.
	if ( ! current_user_can( 'edit_give_payments' ) ) {
		return;
	}

	// Add-ons
  $submenu['edit.php?post_type=give_forms'][] = [
		'<span class="bears-get-addons gateways-payment">All Gateways Payment</span>',
		'install_plugins',
		esc_url( 'https://stellarwp.pxf.io/n17M9x' ),
	];

  $submenu['edit.php?post_type=give_forms'][] = [
    '<span class="bears-get-addons recurring-payment">Recurring Payment</span>',
		'install_plugins',
		esc_url( 'https://stellarwp.pxf.io/2rADGD' ),
	];

  $submenu['edit.php?post_type=give_forms'][] = [
    '<span class="bears-get-addons must-have-addons">Must have Add-ons</span>',
		'install_plugins',
		esc_url( 'https://stellarwp.pxf.io/5bVrXn' ),
	];

}
add_action( 'admin_menu', 'affiliate_give_add_add_ons_option_link', 999999999 );

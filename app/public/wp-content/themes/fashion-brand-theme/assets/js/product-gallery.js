/**
 * Single product gallery — thumbnail swap for main image.
 *
 * @package Fashion_Brand_Theme
 */
(function () {
	'use strict';

	function initGallery(root) {
		var main = root.querySelector('[data-gallery-main], .product-gallery-main img');
		var thumbs = root.querySelectorAll('[data-gallery-thumb]');

		if (!main || !thumbs.length) {
			return;
		}

		thumbs.forEach(function (thumb) {
			thumb.addEventListener('click', function () {
				var src = thumb.getAttribute('data-image-src');
				var srcset = thumb.getAttribute('data-image-srcset');

				if (!src) {
					return;
				}

				main.setAttribute('src', src);
				if (srcset) {
					main.setAttribute('srcset', srcset);
				} else {
					main.removeAttribute('srcset');
				}

				thumbs.forEach(function (btn) {
					btn.classList.remove('is-active', 'active');
					btn.setAttribute('aria-pressed', 'false');
				});

				thumb.classList.add('is-active');
				thumb.setAttribute('aria-pressed', 'true');
			});
		});
	}

	function boot() {
		document.querySelectorAll('[data-product-gallery]').forEach(initGallery);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})();

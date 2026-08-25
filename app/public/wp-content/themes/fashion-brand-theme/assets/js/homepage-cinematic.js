/**
 * Homepage cinematic scroll — scene snap, parallax, overlay nav.
 *
 * Enqueued only on the front page.
 *
 * @package Fashion_Brand_Theme
 */

document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	var scrollWrap = document.querySelector( '.scroll-wrap' );
	var scenes = Array.prototype.slice.call( document.querySelectorAll( '.scene' ) );
	var counter = document.querySelector( '.cinematic-counter' );
	var overlayNav = document.querySelector( '.cinematic-overlay-nav' );
	var menuBtn = document.querySelector( '.cinematic-menu-btn' );
	var closeBtn = document.querySelector( '.cinematic-overlay-close' );
	var reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( ! scrollWrap || ! scenes.length ) {
		return;
	}

	var titles = scenes.map( function ( scene ) {
		return scene.getAttribute( 'data-title' ) || '';
	} );

	function updateCounter( index ) {
		if ( ! counter ) {
			return;
		}

		counter.innerHTML =
			'<b>' +
			String( index + 1 ).padStart( 2, '0' ) +
			'</b> / ' +
			String( scenes.length ).padStart( 2, '0' ) +
			' — ' +
			titles[ index ];
	}

	function setActiveScene( scene ) {
		scenes.forEach( function ( item ) {
			item.classList.remove( 'active' );
		} );
		scene.classList.add( 'active' );
		updateCounter( scenes.indexOf( scene ) );
	}

	var io = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting && entry.intersectionRatio > 0.55 ) {
					setActiveScene( entry.target );
				}
			} );
		},
		{ threshold: [ 0.55 ] }
	);

	scenes.forEach( function ( scene ) {
		io.observe( scene );
	} );

	setActiveScene( scenes[ 0 ] );

	if ( ! reducedMotion ) {
		scrollWrap.addEventListener(
			'scroll',
			function () {
				scenes.forEach( function ( scene ) {
					var rect = scene.getBoundingClientRect();
					var img = scene.querySelector( '.scene-img' );
					var progress = rect.top / window.innerHeight;

					if ( img ) {
						img.style.transform =
							'translateY(' + progress * 40 + 'px) scale(1.08)';
					}
				} );
			},
			{ passive: true }
		);
	}

	function openOverlay() {
		if ( ! overlayNav || ! menuBtn ) {
			return;
		}

		overlayNav.classList.add( 'is-open' );
		overlayNav.removeAttribute( 'hidden' );
		overlayNav.setAttribute( 'aria-hidden', 'false' );
		menuBtn.setAttribute( 'aria-expanded', 'true' );
		document.body.classList.add( 'is-cinematic-nav-open' );
	}

	function closeOverlay() {
		if ( ! overlayNav || ! menuBtn ) {
			return;
		}

		overlayNav.classList.remove( 'is-open' );
		overlayNav.setAttribute( 'aria-hidden', 'true' );
		menuBtn.setAttribute( 'aria-expanded', 'false' );
		document.body.classList.remove( 'is-cinematic-nav-open' );
	}

	if ( overlayNav ) {
		overlayNav.setAttribute( 'aria-hidden', 'true' );
		overlayNav.removeAttribute( 'hidden' );
	}

	if ( menuBtn ) {
		menuBtn.addEventListener( 'click', openOverlay );
	}

	if ( closeBtn ) {
		closeBtn.addEventListener( 'click', closeOverlay );
	}

	document.addEventListener( 'keydown', function ( event ) {
		if ( 'Escape' === event.key ) {
			closeOverlay();
		}
	} );

	// Desktop-only overlay hover previews (CSS hides panel below 1100px).
	var preview = document.querySelector( '.cinematic-overlay-preview' );
	var previewImg = preview ? preview.querySelector( 'img' ) : null;
	var previewCaption = preview ? preview.querySelector( '.cinematic-overlay-preview__caption' ) : null;
	var previewLinks = document.querySelectorAll( '.cinematic-overlay-nav a[data-preview-img]' );
	var finePointer = window.matchMedia( '(hover: hover) and (pointer: fine)' );

	function showPreview( link ) {
		if ( ! preview || ! previewImg || ! previewCaption || ! finePointer.matches ) {
			return;
		}

		previewImg.src = link.getAttribute( 'data-preview-img' ) || '';
		previewCaption.textContent = link.getAttribute( 'data-preview-caption' ) || '';
		preview.classList.add( 'is-active' );
	}

	function hidePreview() {
		if ( preview ) {
			preview.classList.remove( 'is-active' );
		}
	}

	previewLinks.forEach( function ( link ) {
		link.addEventListener( 'mouseenter', function () {
			showPreview( link );
		} );
		link.addEventListener( 'mouseleave', hidePreview );
		link.addEventListener( 'focus', function () {
			showPreview( link );
		} );
		link.addEventListener( 'blur', hidePreview );
	} );

	if ( overlayNav ) {
		overlayNav.addEventListener( 'transitionend', function () {
			if ( ! overlayNav.classList.contains( 'is-open' ) ) {
				hidePreview();
			}
		} );
	}
} );

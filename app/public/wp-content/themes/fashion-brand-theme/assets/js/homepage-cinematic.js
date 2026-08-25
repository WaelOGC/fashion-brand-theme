/**
 * Homepage cinematic scroll — paged scenes, overlay nav, previews.
 *
 * Enqueued only on the front page.
 *
 * @package Fashion_Brand_Theme
 */

document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	var scrollWrap = document.querySelector( '.scroll-wrap' );
	var track = document.querySelector( '.scene-track' );
	var scenes = Array.prototype.slice.call( document.querySelectorAll( '.scene' ) );
	var counter = document.querySelector( '.cinematic-counter' );
	var overlayNav = document.querySelector( '.cinematic-overlay-nav' );
	var menuBtn = document.querySelector( '.cinematic-menu-btn' );
	var closeBtn = document.querySelector( '.cinematic-overlay-close' );
	var isFinePointer = window.matchMedia( '(pointer: fine)' ).matches;
	var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var current = 0;
	var animating = false;
	var ANIMATION_MS = reduceMotion ? 0 : 1050;

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

	function setActiveByIndex( index ) {
		scenes.forEach( function ( scene, i ) {
			scene.classList.toggle( 'active', i === index );
		} );
		updateCounter( index );
	}

	function goTo( index ) {
		if ( ! track ) {
			return;
		}

		index = Math.max( 0, Math.min( scenes.length - 1, index ) );

		if ( index === current || animating ) {
			return;
		}

		animating = true;
		current = index;
		track.style.transform = 'translateY(-' + index * 100 + 'vh)';
		setActiveByIndex( index );

		window.setTimeout( function () {
			animating = false;
		}, ANIMATION_MS );
	}

	function overlayIsOpen() {
		return overlayNav && overlayNav.classList.contains( 'is-open' );
	}

	if ( isFinePointer && track ) {
		var wheelCooldown = false;

		scrollWrap.addEventListener(
			'wheel',
			function ( event ) {
				if ( overlayIsOpen() ) {
					return;
				}

				event.preventDefault();

				if ( animating || wheelCooldown ) {
					return;
				}

				if ( Math.abs( event.deltaY ) < 8 ) {
					return;
				}

				wheelCooldown = true;
				window.setTimeout( function () {
					wheelCooldown = false;
				}, 60 );

				goTo( current + ( event.deltaY > 0 ? 1 : -1 ) );
			},
			{ passive: false }
		);

		document.addEventListener( 'keydown', function ( event ) {
			if ( overlayIsOpen() ) {
				return;
			}

			if ( 'ArrowDown' === event.key || 'PageDown' === event.key ) {
				event.preventDefault();
				goTo( current + 1 );
			}

			if ( 'ArrowUp' === event.key || 'PageUp' === event.key ) {
				event.preventDefault();
				goTo( current - 1 );
			}
		} );
	} else {
		// Touch / coarse: native proximity snap — keep counter in sync via IO.
		var io = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting && entry.intersectionRatio > 0.55 ) {
						var index = scenes.indexOf( entry.target );

						if ( index > -1 ) {
							current = index;
							setActiveByIndex( index );
						}
					}
				} );
			},
			{ threshold: [ 0.55 ] }
		);

		scenes.forEach( function ( scene ) {
			io.observe( scene );
		} );
	}

	setActiveByIndex( 0 );

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
	var fineHover = window.matchMedia( '(hover: hover) and (pointer: fine)' );

	function showPreview( link ) {
		if ( ! preview || ! previewImg || ! previewCaption || ! fineHover.matches ) {
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

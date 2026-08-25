/**
 * Homepage motion — scroll reveal + header scroll state.
 *
 * Enqueued only on the front page.
 *
 * @package Fashion_Brand_Theme
 */

document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	var nav = document.querySelector( '.site-header' );

	if ( nav ) {
		window.addEventListener(
			'scroll',
			function () {
				if ( window.scrollY > 40 ) {
					nav.classList.add( 'scrolled' );
				} else {
					nav.classList.remove( 'scrolled' );
				}
			},
			{ passive: true }
		);

		if ( window.scrollY > 40 ) {
			nav.classList.add( 'scrolled' );
		}
	}

	var reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var targets = document.querySelectorAll( '.reveal, .reveal-img' );

	if ( ! targets.length ) {
		return;
	}

	if ( reducedMotion || ! ( 'IntersectionObserver' in window ) ) {
		targets.forEach( function ( target ) {
			target.classList.add( 'is-visible' );
		} );
		return;
	}

	var io = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					io.unobserve( entry.target );
				}
			} );
		},
		{
			threshold: 0.15,
			rootMargin: '0px 0px -60px 0px',
		}
	);

	targets.forEach( function ( target ) {
		io.observe( target );
	} );
} );

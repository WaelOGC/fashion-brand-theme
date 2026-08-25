/**
 * Custom cursor — front page, fine-pointer devices only.
 *
 * @package Fashion_Brand_Theme
 */

document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	if ( ! window.matchMedia( '(pointer: fine)' ).matches ) {
		return;
	}

	var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var lerp = reduceMotion ? 1 : 0.18;

	var dot = document.createElement( 'div' );
	dot.className = 'cursor-dot';
	dot.innerHTML = '<span class="cursor-label"></span>';
	dot.setAttribute( 'aria-hidden', 'true' );
	document.body.appendChild( dot );

	var label = dot.querySelector( '.cursor-label' );
	var mouseX = 0;
	var mouseY = 0;
	var dotX = 0;
	var dotY = 0;

	document.addEventListener( 'mousemove', function ( event ) {
		mouseX = event.clientX;
		mouseY = event.clientY;
	} );

	function raf() {
		dotX += ( mouseX - dotX ) * lerp;
		dotY += ( mouseY - dotY ) * lerp;
		dot.style.transform =
			'translate(' + dotX + 'px,' + dotY + 'px) translate(-50%,-50%)';
		requestAnimationFrame( raf );
	}

	requestAnimationFrame( raf );

	var hoverTargets = document.querySelectorAll( 'a, button, .cat-item, .guide-entry' );

	hoverTargets.forEach( function ( el ) {
		el.addEventListener( 'mouseenter', function () {
			dot.classList.add( 'hover' );
			label.textContent = el.getAttribute( 'data-cursor-label' ) || 'View';
		} );

		el.addEventListener( 'mouseleave', function () {
			dot.classList.remove( 'hover' );
			label.textContent = '';
		} );
	} );
} );

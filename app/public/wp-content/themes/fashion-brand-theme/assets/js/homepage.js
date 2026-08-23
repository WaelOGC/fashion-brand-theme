/**
 * Homepage Threshold Sequence interactions.
 *
 * @package Fashion_Brand_Theme
 */

( function () {
	'use strict';

	const frontPage = document.querySelector( '.site-main--front-page' );

	if ( ! frontPage ) {
		return;
	}

	const revealElements = frontPage.querySelectorAll( '[data-homepage-reveal]' );
	const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	function markVisible( element ) {
		element.classList.add( 'is-visible' );
	}

	if ( reducedMotion || ! ( 'IntersectionObserver' in window ) ) {
		revealElements.forEach( markVisible );
		return;
	}

	const staggerGroups = {
		tile: 70,
		product: 80,
		guide: 100,
	};

	const observer = new IntersectionObserver(
		function ( entries, obs ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}

				const element = entry.target;
				const group = element.getAttribute( 'data-homepage-reveal' );
				const delay = staggerGroups[ group ] || 0;
				const siblings = group ? frontPage.querySelectorAll( '[data-homepage-reveal="' + group + '"]' ) : [];
				let index = 0;

				if ( siblings.length > 1 ) {
					index = Array.prototype.indexOf.call( siblings, element );
				}

				window.setTimeout(
					function () {
						markVisible( element );
					},
					delay * index
				);

				obs.unobserve( element );
			} );
		},
		{
			root: null,
			rootMargin: '0px 0px -8% 0px',
			threshold: 0.12,
		}
	);

	revealElements.forEach( function ( element ) {
		observer.observe( element );
	} );
}() );

/**
 * Progressive Commit prototype — collection section mode transform.
 */
( function () {
	'use strict';

	const commitRoot = document.querySelector( '[data-progressive-commit]' );

	if ( ! commitRoot ) {
		return;
	}

	const region = commitRoot.querySelector( '[data-progressive-commit-region]' );
	const toggle = commitRoot.querySelector( '[data-progressive-commit-toggle]' );
	const status = commitRoot.querySelector( '[data-progressive-commit-status]' );

	if ( ! region || ! toggle || ! status ) {
		return;
	}

	const labelEditorial = toggle.querySelector( '.progressive-commit__toggle-label--editorial' );
	const labelCommerce = toggle.querySelector( '.progressive-commit__toggle-label--commerce' );
	const editorialBlocks = commitRoot.querySelectorAll( '[data-progressive-commit-editorial]' );
	const commerceBlocks = commitRoot.querySelectorAll( '[data-progressive-commit-commerce]' );

	function getFirstCommerceFocusTarget() {
		return commitRoot.querySelector( '.collection-piece__cta' );
	}

	function setMode( mode ) {
		const isCommerce = 'commerce' === mode;

		region.dataset.mode = mode;
		region.classList.toggle( 'is-commerce-mode', isCommerce );
		toggle.setAttribute( 'aria-pressed', isCommerce ? 'true' : 'false' );

		if ( labelEditorial ) {
			labelEditorial.hidden = isCommerce;
		}

		if ( labelCommerce ) {
			labelCommerce.hidden = ! isCommerce;
		}

		editorialBlocks.forEach( function ( block ) {
			block.setAttribute( 'aria-hidden', isCommerce ? 'true' : 'false' );
		} );

		commerceBlocks.forEach( function ( block ) {
			block.setAttribute( 'aria-hidden', isCommerce ? 'false' : 'true' );
		} );

		status.textContent = isCommerce
			? 'Commerce mode active. Product names, prices, and shop actions are now visible.'
			: 'Editorial mode active. Product details are hidden.';
	}

	function activateCommerce() {
		setMode( 'commerce' );

		const focusTarget = getFirstCommerceFocusTarget();

		if ( focusTarget ) {
			focusTarget.focus( { preventScroll: true } );
		}
	}

	function activateEditorial() {
		setMode( 'editorial' );
		toggle.focus( { preventScroll: true } );
	}

	toggle.addEventListener( 'click', function () {
		if ( 'commerce' === region.dataset.mode ) {
			activateEditorial();
			return;
		}

		activateCommerce();
	} );

	document.addEventListener( 'keydown', function ( event ) {
		if ( 'Escape' !== event.key || 'commerce' !== region.dataset.mode ) {
			return;
		}

		event.preventDefault();
		activateEditorial();
	} );

	setMode( 'editorial' );
}() );

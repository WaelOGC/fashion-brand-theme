<?php
/**
 * Template Name: Contact Page
 * Contact page template.
 *
 * Used automatically for a Page with slug "contact".
 *
 * @package Fashion_Brand_Theme
 */

get_header();

$hero_image = FASHION_BRAND_THEME_URI . '/assets/images/contact-photography/hero-contact.jpg';

// Editable hero copy — change these strings to update the page wording.
$hero_eyebrow    = __( 'Get in touch', 'fashion-brand-theme' );
$hero_heading    = __( "We'd love to hear from you.", 'fashion-brand-theme' );
$hero_subheading = __( 'Questions, ideas, or just a hello — we read every message.', 'fashion-brand-theme' );

// Editable aside copy.
$aside_heading = __( "Let's talk", 'fashion-brand-theme' );
$intro_copy    = __(
	"Have a question about an order, a collaboration idea, or just want to say hello? We're always happy to hear from you.",
	'fashion-brand-theme'
);
$contact_email = 'hello@wrenwold.com';
$response_note = __( 'We usually reply within 1 business day.', 'fashion-brand-theme' );

// Editable form column label.
$form_heading = __( 'Send a message', 'fashion-brand-theme' );
?>

<main id="primary" class="site-main contact-page">
	<section class="contact-page__hero" aria-labelledby="contact-hero-heading">
		<div class="contact-page__hero-grid">
			<div class="contact-page__hero-media contact-reveal-hero">
				<img
					class="contact-page__hero-image"
					src="<?php echo esc_url( $hero_image ); ?>"
					alt=""
					width="1600"
					height="2000"
					decoding="async"
					fetchpriority="high"
				>
			</div>

			<div class="contact-page__hero-content contact-reveal-hero">
				<p class="contact-page__hero-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
				<h1 id="contact-hero-heading" class="contact-page__hero-heading">
					<?php echo esc_html( $hero_heading ); ?>
				</h1>
				<p class="contact-page__hero-subheading"><?php echo esc_html( $hero_subheading ); ?></p>
			</div>
		</div>
	</section>

	<section class="contact-page__content" aria-label="<?php esc_attr_e( 'Contact form and details', 'fashion-brand-theme' ); ?>">
		<div class="contact-page__grid">
			<aside class="contact-aside-column contact-reveal">
				<h2 class="contact-aside-column__heading"><?php echo esc_html( $aside_heading ); ?></h2>
				<p class="contact-aside-column__intro"><?php echo esc_html( $intro_copy ); ?></p>
				<p class="contact-aside-column__email">
					<a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
				</p>
				<p class="contact-aside-column__response"><?php echo esc_html( $response_note ); ?></p>
				<?php fashion_brand_theme_render_social_icons(); ?>
			</aside>

			<div class="contact-form-column contact-reveal">
				<p class="contact-form-column__heading"><?php echo esc_html( $form_heading ); ?></p>
				<?php
				// Contact Form 7 — do not move this shortcode out of the form column.
				echo do_shortcode( '[contact-form-7 id="734e725" title="Contact form WREN WOLD"]' );
				?>
			</div>
		</div>
	</section>
</main>

<script>
document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var heroReveals = document.querySelectorAll( '.contact-reveal-hero' );
	var scrollReveals = document.querySelectorAll( '.contact-page__content .contact-reveal' );
	var contentSection = document.querySelector( '.contact-page__content' );

	function activate( element ) {
		if ( element ) {
			element.classList.add( 'is-active' );
		}
	}

	if ( reduceMotion ) {
		heroReveals.forEach( activate );
		scrollReveals.forEach( activate );
		return;
	}

	heroReveals.forEach( activate );

	if ( ! contentSection || ! scrollReveals.length ) {
		return;
	}

	var observer = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}

				scrollReveals.forEach( activate );
				observer.disconnect();
			} );
		},
		{ threshold: 0.2 }
	);

	observer.observe( contentSection );
} );
</script>

<?php
get_footer();

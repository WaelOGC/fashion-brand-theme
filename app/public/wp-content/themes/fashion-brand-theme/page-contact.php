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
$aside_eyebrow     = __( 'Other ways to reach us', 'fashion-brand-theme' );
$intro_copy        = __(
	"Have a question about an order, a collaboration idea, or just want to say hello? We're always happy to hear from you.",
	'fashion-brand-theme'
);
$contact_email     = 'hello@wrenwold.com';
$response_note     = __( 'We usually reply within 1 business day.', 'fashion-brand-theme' );

// Editable form column heading.
$form_heading = __( 'Send us a message', 'fashion-brand-theme' );
?>

<main id="primary" class="site-main contact-page">
	<?php /* Hero — reuses homepage scene markup/classes for the same overlay + reveal treatment. */ ?>
	<section
		class="scene contact-page__hero active"
		aria-labelledby="contact-hero-heading"
	>
		<img
			class="scene-img"
			src="<?php echo esc_url( $hero_image ); ?>"
			alt=""
			width="1600"
			height="2000"
			decoding="async"
			fetchpriority="high"
		>
		<div class="scene-top-scrim" aria-hidden="true"></div>
		<div class="scene-scrim scrim-bottom" aria-hidden="true"></div>
		<div class="scene-copy">
			<p class="scene-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
			<h1 id="contact-hero-heading" class="scene-headline scene-headline--contact">
				<?php echo esc_html( $hero_heading ); ?>
			</h1>
			<p class="scene-subheading"><?php echo esc_html( $hero_subheading ); ?></p>
		</div>
	</section>

	<section class="contact-page__content" aria-label="<?php esc_attr_e( 'Contact form and details', 'fashion-brand-theme' ); ?>">
		<div class="contact-page__grid">
			<div class="contact-form-column">
				<h2 class="contact-form-column__heading"><?php echo esc_html( $form_heading ); ?></h2>
				<?php
				// Contact Form 7 — do not move this shortcode out of the left column.
				echo do_shortcode( '[contact-form-7 id="734e725" title="Contact form WREN WOLD"]' );
				?>
			</div>

			<aside class="contact-aside-column">
				<p class="contact-aside-column__eyebrow"><?php echo esc_html( $aside_eyebrow ); ?></p>
				<p class="contact-aside-column__intro"><?php echo esc_html( $intro_copy ); ?></p>
				<p class="contact-aside-column__email">
					<a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
				</p>
				<p class="contact-aside-column__response"><?php echo esc_html( $response_note ); ?></p>
				<?php fashion_brand_theme_render_social_icons(); ?>
			</aside>
		</div>
	</section>
</main>

<?php
get_footer();

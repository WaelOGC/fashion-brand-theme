/**
 * Contact page — CF7 phone field country selector.
 *
 * Self-hosted circular flag SVGs are embedded below (no CDN).
 *
 * @package Fashion_Brand_Theme
 */

( function () {
	'use strict';

	var DEFAULT_ISO = 'NL';
	var clip = '<clipPath id="c"><circle cx="12" cy="12" r="12"/></clipPath><g clip-path="url(#c)">';

	var FLAG_SVGS = {
		default: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#D6D2CB"/><circle cx="12" cy="12" r="4" fill="#8C877E"/></g></svg>',
		nl: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#AE1C28"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#21468B"/></g></svg>',
		be: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#000"/><rect x="8" width="8" height="24" fill="#FAE042"/><rect x="16" width="8" height="24" fill="#ED2939"/></g></svg>',
		de: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#000"/><rect y="8" width="24" height="8" fill="#DD0000"/><rect y="16" width="24" height="8" fill="#FFCE00"/></g></svg>',
		fr: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#002395"/><rect x="8" width="8" height="24" fill="#FFF"/><rect x="16" width="8" height="24" fill="#ED2939"/></g></svg>',
		gb: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#012169"/><path d="M12 0v24M0 12h24" stroke="#FFF" stroke-width="5"/><path d="M12 0v24M0 12h24" stroke="#C8102E" stroke-width="2.5"/></g></svg>',
		ie: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#169B62"/><rect x="8" width="8" height="24" fill="#FFF"/><rect x="16" width="8" height="24" fill="#FF883E"/></g></svg>',
		it: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#009246"/><rect x="8" width="8" height="24" fill="#FFF"/><rect x="16" width="8" height="24" fill="#CE2B37"/></g></svg>',
		es: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#AA151B"/><rect y="6" width="24" height="12" fill="#F1BF00"/></g></svg>',
		pt: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="10" height="24" fill="#006600"/><rect x="10" width="14" height="24" fill="#FF0000"/></g></svg>',
		at: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#ED2939"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#ED2939"/></g></svg>',
		ch: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#D52B1E"/><rect x="10" y="5" width="4" height="14" fill="#FFF"/><rect x="5" y="10" width="14" height="4" fill="#FFF"/></g></svg>',
		lu: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#ED2939"/><rect y="12" width="24" height="12" fill="#00A1DE"/></g></svg>',
		dk: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#C8102E"/><rect x="7" width="3" height="24" fill="#FFF"/><rect y="10.5" width="24" height="3" fill="#FFF"/></g></svg>',
		se: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#006AA7"/><rect x="6" width="4" height="24" fill="#FECC00"/><rect y="10" width="24" height="4" fill="#FECC00"/></g></svg>',
		no: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#BA0C2F"/><rect x="6" width="4" height="24" fill="#FFF"/><rect y="10" width="24" height="4" fill="#FFF"/></g></svg>',
		fi: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#FFF"/><rect x="6" width="4" height="24" fill="#003580"/><rect y="10" width="24" height="4" fill="#003580"/></g></svg>',
		pl: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#FFF"/><rect y="12" width="24" height="12" fill="#DC143C"/></g></svg>',
		cz: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#FFF"/><rect y="12" width="24" height="12" fill="#D7141A"/><polygon points="0,0 12,12 0,24" fill="#11457E"/></g></svg>',
		sk: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FFF"/><rect y="8" width="24" height="8" fill="#0B4EA2"/><rect y="16" width="24" height="8" fill="#EE1C25"/></g></svg>',
		hu: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#CE2939"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#436F4D"/></g></svg>',
		ro: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#002B7F"/><rect x="8" width="8" height="24" fill="#FCD116"/><rect x="16" width="8" height="24" fill="#CE1126"/></g></svg>',
		bg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FFF"/><rect y="8" width="24" height="8" fill="#00966E"/><rect y="16" width="24" height="8" fill="#D62612"/></g></svg>',
		hr: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FF0000"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#171796"/></g></svg>',
		si: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FFF"/><rect y="8" width="24" height="8" fill="#005DA4"/><rect y="16" width="24" height="8" fill="#FF0000"/></g></svg>',
		gr: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#0D5EAF"/><rect y="10" width="24" height="4" fill="#FFF"/><rect x="10" width="4" height="24" fill="#FFF"/></g></svg>',
		us: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#B22234"/><rect width="10" height="10" fill="#3C3B6E"/></g></svg>',
		ca: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="6" height="24" fill="#FF0000"/><rect x="6" width="12" height="24" fill="#FFF"/><rect x="18" width="6" height="24" fill="#FF0000"/></g></svg>',
		au: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#012169"/></g></svg>',
		nz: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#012169"/><rect y="12" width="24" height="12" fill="#FFF"/></g></svg>',
		jp: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#FFF"/><circle cx="12" cy="12" r="5" fill="#BC002D"/></g></svg>',
		cn: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#DE2910"/></g></svg>',
		in: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FF9933"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#138808"/></g></svg>',
		br: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#009C3B"/><polygon points="12,4 22,12 12,20 2,12" fill="#FFDF00"/></g></svg>',
		mx: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="8" height="24" fill="#006847"/><rect x="8" width="8" height="24" fill="#FFF"/><rect x="16" width="8" height="24" fill="#CE1126"/></g></svg>',
		ae: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#00732F"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#000"/><rect width="6" height="24" fill="#FF0000"/></g></svg>',
		sa: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#006C35"/></g></svg>',
		tr: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#E30A17"/><circle cx="10.5" cy="12" r="4" fill="#FFF"/><circle cx="11.5" cy="12" r="3.2" fill="#E30A17"/></g></svg>',
		il: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#FFF"/><rect y="4" width="24" height="3" fill="#0038B8"/><rect y="17" width="24" height="3" fill="#0038B8"/></g></svg>',
		za: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#007A4D"/><polygon points="0,0 12,12 0,24" fill="#000"/></g></svg>',
		sg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#EF3340"/><rect y="12" width="24" height="12" fill="#FFF"/></g></svg>',
		kr: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#FFF"/><circle cx="12" cy="12" r="4" fill="#CD2E3A"/></g></svg>',
		ua: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="12" fill="#005BBB"/><rect y="12" width="24" height="12" fill="#FFD500"/></g></svg>',
		rs: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#C6363C"/><rect y="8" width="24" height="8" fill="#0C4076"/><rect y="16" width="24" height="8" fill="#FFF"/></g></svg>',
		is: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="24" fill="#02529C"/><rect x="6" width="4" height="24" fill="#FFF"/><rect y="10" width="24" height="4" fill="#FFF"/></g></svg>',
		ee: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#0072CE"/><rect y="8" width="24" height="8" fill="#000"/><rect y="16" width="24" height="8" fill="#FFF"/></g></svg>',
		lv: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#9E3039"/><rect y="8" width="24" height="8" fill="#FFF"/><rect y="16" width="24" height="8" fill="#9E3039"/></g></svg>',
		lt: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">' + clip + '<rect width="24" height="8" fill="#FDB913"/><rect y="8" width="24" height="8" fill="#006A44"/><rect y="16" width="24" height="8" fill="#C1272D"/></g></svg>',
	};

	var COUNTRIES = [
		{ iso: 'NL', name: 'Netherlands', dial: '+31' },
		{ iso: 'BE', name: 'Belgium', dial: '+32' },
		{ iso: 'DE', name: 'Germany', dial: '+49' },
		{ iso: 'FR', name: 'France', dial: '+33' },
		{ iso: 'GB', name: 'United Kingdom', dial: '+44' },
		{ iso: 'IE', name: 'Ireland', dial: '+353' },
		{ iso: 'IT', name: 'Italy', dial: '+39' },
		{ iso: 'ES', name: 'Spain', dial: '+34' },
		{ iso: 'PT', name: 'Portugal', dial: '+351' },
		{ iso: 'AT', name: 'Austria', dial: '+43' },
		{ iso: 'CH', name: 'Switzerland', dial: '+41' },
		{ iso: 'LU', name: 'Luxembourg', dial: '+352' },
		{ iso: 'DK', name: 'Denmark', dial: '+45' },
		{ iso: 'SE', name: 'Sweden', dial: '+46' },
		{ iso: 'NO', name: 'Norway', dial: '+47' },
		{ iso: 'FI', name: 'Finland', dial: '+358' },
		{ iso: 'PL', name: 'Poland', dial: '+48' },
		{ iso: 'CZ', name: 'Czech Republic', dial: '+420' },
		{ iso: 'SK', name: 'Slovakia', dial: '+421' },
		{ iso: 'HU', name: 'Hungary', dial: '+36' },
		{ iso: 'RO', name: 'Romania', dial: '+40' },
		{ iso: 'BG', name: 'Bulgaria', dial: '+359' },
		{ iso: 'HR', name: 'Croatia', dial: '+385' },
		{ iso: 'SI', name: 'Slovenia', dial: '+386' },
		{ iso: 'GR', name: 'Greece', dial: '+30' },
		{ iso: 'US', name: 'United States', dial: '+1' },
		{ iso: 'CA', name: 'Canada', dial: '+1' },
		{ iso: 'AU', name: 'Australia', dial: '+61' },
		{ iso: 'NZ', name: 'New Zealand', dial: '+64' },
		{ iso: 'JP', name: 'Japan', dial: '+81' },
		{ iso: 'CN', name: 'China', dial: '+86' },
		{ iso: 'IN', name: 'India', dial: '+91' },
		{ iso: 'BR', name: 'Brazil', dial: '+55' },
		{ iso: 'MX', name: 'Mexico', dial: '+52' },
		{ iso: 'AE', name: 'United Arab Emirates', dial: '+971' },
		{ iso: 'SA', name: 'Saudi Arabia', dial: '+966' },
		{ iso: 'TR', name: 'Turkey', dial: '+90' },
		{ iso: 'IL', name: 'Israel', dial: '+972' },
		{ iso: 'ZA', name: 'South Africa', dial: '+27' },
		{ iso: 'SG', name: 'Singapore', dial: '+65' },
		{ iso: 'KR', name: 'South Korea', dial: '+82' },
		{ iso: 'UA', name: 'Ukraine', dial: '+380' },
		{ iso: 'RS', name: 'Serbia', dial: '+381' },
		{ iso: 'IS', name: 'Iceland', dial: '+354' },
		{ iso: 'EE', name: 'Estonia', dial: '+372' },
		{ iso: 'LV', name: 'Latvia', dial: '+371' },
		{ iso: 'LT', name: 'Lithuania', dial: '+370' },
	];

	var sortedCountries = COUNTRIES.slice().sort( function ( a, b ) {
		return a.name.localeCompare( b.name );
	} );

	function getCountry( iso ) {
		for ( var i = 0; i < COUNTRIES.length; i++ ) {
			if ( COUNTRIES[ i ].iso === iso ) {
				return COUNTRIES[ i ];
			}
		}

		for ( var j = 0; j < COUNTRIES.length; j++ ) {
			if ( COUNTRIES[ j ].iso === DEFAULT_ISO ) {
				return COUNTRIES[ j ];
			}
		}

		return COUNTRIES[ 0 ];
	}

	function createFlagElement( iso ) {
		var span = document.createElement( 'span' );
		span.className = 'contact-phone-field__flag';
		span.setAttribute( 'aria-hidden', 'true' );
		span.innerHTML = FLAG_SVGS[ iso.toLowerCase() ] || FLAG_SVGS.default;
		return span;
	}

	function closeDropdown( dropdown, trigger ) {
		dropdown.classList.remove( 'is-open' );
		trigger.setAttribute( 'aria-expanded', 'false' );
	}

	function openDropdown( dropdown, trigger ) {
		dropdown.classList.add( 'is-open' );
		trigger.setAttribute( 'aria-expanded', 'true' );
	}

	function stripDialCode( value, dial ) {
		var trimmed = ( value || '' ).trim();

		if ( ! trimmed ) {
			return '';
		}

		var normalizedDial = dial.replace( /\s/g, '' );
		var compact = trimmed.replace( /\s/g, '' );

		if ( compact.indexOf( normalizedDial ) === 0 ) {
			return compact.slice( normalizedDial.length ).replace( /^[\s\-]+/, '' );
		}

		if ( compact.charAt( 0 ) === '+' ) {
			return trimmed.replace( /^\+\d+\s*/, '' );
		}

		return trimmed;
	}

	function buildInternationalValue( dial, localNumber ) {
		var local = ( localNumber || '' ).trim().replace( /^0+/, '' );

		if ( ! local ) {
			return '';
		}

		return dial + ' ' + local;
	}

	function enhancePhoneField( telInput ) {
		if ( ! telInput || telInput.dataset.contactPhoneEnhanced === 'true' ) {
			return;
		}

		var wrap = telInput.closest( '.wpcf7-form-control-wrap' ) || telInput.parentElement;
		var form = telInput.closest( 'form' );

		if ( ! wrap || ! form ) {
			return;
		}

		telInput.dataset.contactPhoneEnhanced = 'true';

		var selected = getCountry( DEFAULT_ISO );
		var group = document.createElement( 'div' );
		group.className = 'contact-phone-field';

		var country = document.createElement( 'div' );
		country.className = 'contact-phone-field__country';

		var trigger = document.createElement( 'button' );
		trigger.type = 'button';
		trigger.className = 'contact-phone-field__trigger';
		trigger.setAttribute( 'aria-haspopup', 'listbox' );
		trigger.setAttribute( 'aria-expanded', 'false' );
		trigger.setAttribute( 'aria-label', 'Select country code' );

		var triggerFlag = createFlagElement( selected.iso );
		var triggerDial = document.createElement( 'span' );
		triggerDial.className = 'contact-phone-field__dial';
		triggerDial.textContent = selected.dial;

		trigger.appendChild( triggerFlag );
		trigger.appendChild( triggerDial );

		var dropdown = document.createElement( 'div' );
		dropdown.className = 'contact-phone-field__dropdown';

		var search = document.createElement( 'input' );
		search.type = 'search';
		search.className = 'contact-phone-field__search';
		search.placeholder = 'Search country';
		search.setAttribute( 'aria-label', 'Search country' );
		search.autocomplete = 'off';

		var list = document.createElement( 'ul' );
		list.className = 'contact-phone-field__list';
		list.setAttribute( 'role', 'listbox' );

		dropdown.appendChild( search );
		dropdown.appendChild( list );
		country.appendChild( trigger );
		country.appendChild( dropdown );

		wrap.parentNode.insertBefore( group, wrap );
		group.appendChild( country );
		group.appendChild( wrap );

		telInput.placeholder = telInput.placeholder || '6 12345678';
		telInput.setAttribute( 'inputmode', 'tel' );
		telInput.setAttribute( 'autocomplete', 'tel-national' );

		function renderOptions( countries ) {
			list.innerHTML = '';

			countries.forEach( function ( countryData ) {
				var item = document.createElement( 'li' );
				var button = document.createElement( 'button' );
				button.type = 'button';
				button.className = 'contact-phone-field__option';
				button.setAttribute( 'data-iso', countryData.iso );
				button.setAttribute( 'role', 'option' );
				button.setAttribute( 'aria-selected', countryData.iso === selected.iso ? 'true' : 'false' );

				if ( countryData.iso === selected.iso ) {
					button.classList.add( 'is-selected' );
				}

				button.appendChild( createFlagElement( countryData.iso ) );

				var name = document.createElement( 'span' );
				name.className = 'contact-phone-field__option-name';
				name.textContent = countryData.name;
				button.appendChild( name );

				var dial = document.createElement( 'span' );
				dial.className = 'contact-phone-field__option-dial';
				dial.textContent = countryData.dial;
				button.appendChild( dial );

				button.addEventListener( 'click', function () {
					selected = countryData;
					triggerFlag.replaceWith( createFlagElement( countryData.iso ) );
					triggerFlag = trigger.querySelector( '.contact-phone-field__flag' );
					triggerDial.textContent = countryData.dial;
					closeDropdown( dropdown, trigger );
					search.value = '';
					renderOptions( sortedCountries );
					telInput.focus();
				} );

				item.appendChild( button );
				list.appendChild( item );
			} );
		}

		renderOptions( sortedCountries );

		trigger.addEventListener( 'click', function () {
			if ( dropdown.classList.contains( 'is-open' ) ) {
				closeDropdown( dropdown, trigger );
				return;
			}

			openDropdown( dropdown, trigger );
			search.focus();
		} );

		search.addEventListener( 'input', function () {
			var query = search.value.trim().toLowerCase();
			var filtered = sortedCountries.filter( function ( countryData ) {
				return countryData.name.toLowerCase().indexOf( query ) !== -1;
			} );

			renderOptions( filtered );
		} );

		document.addEventListener( 'click', function ( event ) {
			if ( ! country.contains( event.target ) ) {
				closeDropdown( dropdown, trigger );
			}
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( 'Escape' === event.key && dropdown.classList.contains( 'is-open' ) ) {
				closeDropdown( dropdown, trigger );
				trigger.focus();
			}
		} );

		form.addEventListener(
			'submit',
			function () {
				var localValue = stripDialCode( telInput.value, selected.dial );
				telInput.value = buildInternationalValue( selected.dial, localValue );
			},
			true
		);
	}

	function init() {
		var column = document.querySelector( '.contact-form-column' );

		if ( ! column ) {
			return;
		}

		column.querySelectorAll( 'input[type="tel"]' ).forEach( enhancePhoneField );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}

	document.addEventListener( 'wpcf7submit', init );
	document.addEventListener( 'wpcf7invalid', init );
} )();

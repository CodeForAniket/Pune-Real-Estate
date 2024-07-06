( function( api ) {

	// Extends our custom "property-listing-elementor" section.
	api.sectionConstructor['property-listing-elementor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
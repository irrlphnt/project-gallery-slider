( function( blocks, element, blockEditor, components, i18n ) {
	var el   = element.createElement;
// Component fallbacks for NumberControl (WP versions differ)
var NumberControl = components.NumberControl || components.__experimentalNumberControl || components.TextControl;
var ToggleControl = components.ToggleControl || components.__experimentalToggleControl || components.ToggleControl;
var SelectControl = components.SelectControl || components.__experimentalSelectControl || components.SelectControl;
var PanelBody = components.PanelBody || components.__experimentalPanelBody || components.PanelBody;
var ColorPalette = components.ColorPalette || components.__experimentalColorPalette || components.ColorPalette;
var TextControl = components.TextControl || components.__experimentalTextControl || components.TextControl;
	var __   = i18n.__;

	blocks.registerBlockType( 'pgs/project-gallery-slider', {
		edit: function( props ) {
			return [
				el( blockEditor.InspectorControls, {},
					el( components.PanelBody, { title: __( 'Settings', 'pgs' ), initialOpen: true },
						el( components.TextControl, {
                            label: __( 'ACF Gallery field name', 'pgs' ),
                            value: props.attributes.fieldKey,
                            onChange: function( val ) { props.setAttributes( { fieldKey: val } ); }
                        } ),
                        el( NumberControl, {
                            label: __( 'Slider height (px, 0 = auto)', 'pgs' ),
                            value: props.attributes.height,
                            onChange: function( val ) { props.setAttributes( { height: parseInt( val, 10 ) || 0 } ); }
                        } ),
                        el( NumberControl, {
                            label: __( 'Autoplay delay (ms, 0 = off)', 'pgs' ),
                            value: props.attributes.autoplayDelay,
                            onChange: function( val ) { props.setAttributes( { autoplayDelay: parseInt( val, 10 ) || 0 } ); }
                        } ),
                        el( ToggleControl, {
                            label: __( 'Show navigation arrows', 'pgs' ),
                            checked: props.attributes.showNav,
                            onChange: function( val ) { props.setAttributes( { showNav: val } ); }
                        } ),
                        el( ToggleControl, {
                            label: __( 'Show caption overlay', 'pgs' ),
                            checked: props.attributes.showCaption,
                            onChange: function( val ) { props.setAttributes( { showCaption: val } ); }
                        } ),
                        el( components.PanelBody, {
                            title: __( 'Caption Style', 'pgs' ),
                            initialOpen: false
                        },
                            el( components.SelectControl, {
                                label: __( 'Caption Position', 'pgs' ),
                                value: props.attributes.captionPos,
                                options: [
                                    { value: 'bottom', label: __( 'Bottom', 'pgs' ) },
                                    { value: 'top', label: __( 'Top', 'pgs' ) },
                                    { value: 'center', label: __( 'Center', 'pgs' ) }
                                ],
                                onChange: function( val ) { props.setAttributes( { captionPos: val } ); }
                            }),
                            el( components.ColorPalette, {
                                label: __( 'Background Color', 'pgs' ),
                                value: props.attributes.captionBg,
                                onChange: function( val ) { props.setAttributes( { captionBg: val } ); }
                            }),
                            el( components.ColorPalette, {
                                label: __( 'Text Color', 'pgs' ),
                                value: props.attributes.captionText,
                                onChange: function( val ) { props.setAttributes( { captionText: val } ); }
                            }),
                            el( NumberControl, {
                                label: __( 'Font Size (px)', 'pgs' ),
                                value: props.attributes.captionSize,
                                onChange: function( val ) { props.setAttributes( { captionSize: parseInt( val, 10 ) || 14 } ); }
                            }),
                            el( components.TextControl, {
                                label: __( 'Font Family', 'pgs' ),
                                value: props.attributes.captionFont,
                                onChange: function( val ) { props.setAttributes( { captionFont: val } ); }
                            })
                        )
					)
				),
				el( 'p', {}, __( 'Gallery slider will be rendered on the front-end.', 'pgs' ) )
			];
		},
		save: function() {
			return null; // Dynamic block rendered in PHP.
		}
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components, window.wp.i18n );

( function( $ ) {
	"use strict";

	// Tabs
	$( 'div#wmd-metabox ul.wp-tab-bar a').click( function() {
		var lis = $( '#wmd-metabox ul.wp-tab-bar li' ),
			data = $( this ).data( 'tab' ),
			tabs = $( '#wmd-metabox div.wp-tab-panel');
		$( lis ).removeClass( 'wp-tab-active' );
		$( tabs ).hide();
		$( data ).show();
		$( this ).parent( 'li' ).addClass( 'wp-tab-active' );
		return false;
	} );

	// Color picker
	$('div#wmd-metabox .wmd-mb-color-field').wpColorPicker();

	// Media uploader
	var _custom_media		= true,
	_orig_send_attachment	= wp.media.editor.send.attachment;

	$('div#wmd-metabox .wmd-mb-uploader').click(function(e) {
		var send_attachment_bkp	= wp.media.editor.send.attachment,
			button				= $(this),
			id					= button.prev();
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				$( id ).val( attachment.url );
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}
		wp.media.editor.open( button );
		return false;
	} );

	$( 'div#wmd-metabox .add_media' ).on('click', function() {
		_custom_media = false;
	} );

	// Reset
	$( 'div#wmd-metabox div.wmd-mb-reset a.wmd-reset-btn' ).click( function() {
		var confirm = $( 'div.wmd-mb-reset div.wmd-reset-checkbox' ),
			txt = confirm.is(':visible') ? wmdMetabox.reset : wmdMetabox.cancel;
		$( this ).text( txt );
		$( 'div.wmd-mb-reset div.wmd-reset-checkbox input' ).attr('checked', false);
		confirm.toggle();
	});

	$( document ).ready( function() {

		// Show hide title options
		( function wmdTitleSettings() {
			var field					= $( 'div#wmd-metabox select#wmd_post_title_style' ),
				value					= field.val(),
				backgroundImageElements	= $( '#wmd_post_title_background_color_tr, #wmd_post_title_background_redux_tr,#wmd_post_title_height_tr,#wmd_post_title_background_overlay_tr,#wmd_post_title_background_overlay_opacity_tr'),
				solidColorElements		= $( '#wmd_post_title_background_color_tr');
			if ( value === 'background-image' ) {
				backgroundImageElements.show();
			} else if ( value === 'solid-color' ) {
				solidColorElements.show();
			}
			field.change(function () {
				backgroundImageElements.hide();
				if ( $(this).val() == 'background-image' ) {
					backgroundImageElements.show();
				}
				else if ( $(this).val() === 'solid-color' ) {
					solidColorElements.show();
				}
			} );
		} ) ();

	} );

} ) ( jQuery );  
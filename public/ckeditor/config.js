/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'fa';
	// config.uiColor = '#AADC6E';

    // Define changes to default configuration here:
    config.contentsCss = 'public/ckeditor/Customfonts/Fonts.css';
    config.font_names =  'Byekan/BYekan;' + config.font_names;
    config.font_names =  'Bzar/BZar;' + config.font_names;
};


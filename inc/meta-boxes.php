<?php
$prefix = 'mb_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
// $meta_boxes[] = array(
// 	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
// 	'id' => 'standard',

// 	// Meta box title - Will appear at the drag and drop handle bar. Required.
// 	'title' => 'Standard Fields',

// 	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
// 	'pages' => array( 'post' ),

// 	// Where the meta box appear: normal (default), advanced, side. Optional.
// 	'context' => 'normal',

// 	// Order of meta box: high (default), low. Optional.
// 	'priority' => 'high',

// 	// List of meta fields
// 	'fields' => array(
// 		// TEXT
// 		array(
// 			// Field name - Will be used as label
// 			'name'  => 'Text',
// 			// Field ID, i.e. the meta key
// 			'id'    => "{$prefix}text",
// 			// Field description (optional)
// 			'desc'  => 'Text description',
// 			'type'  => 'text',
// 			// Default value (optional)
// 			'std'   => 'Default text value',
// 			// CLONES: Add to make the field cloneable (i.e. have multiple value)
// 			'clone' => true,
// 		),
// 		// CHECKBOX
// 		array(
// 			'name' => 'Checkbox',
// 			'id'   => "{$prefix}checkbox",
// 			'type' => 'checkbox',
// 			// Value can be 0 or 1
// 			'std'  => 1,
// 		),
// 		// RADIO BUTTONS
// 		array(
// 			'name'    => 'Radio',
// 			'id'      => "{$prefix}radio",
// 			'type'    => 'radio',
// 			// Array of 'value' => 'Label' pairs for radio options.
// 			// Note: the 'value' is stored in meta field, not the 'Label'
// 			'options' => array(
// 				'value1' => 'Label1',
// 				'value2' => 'Label2',
// 			),
// 		),
// 		// SELECT BOX
// 		array(
// 			'name'     => 'Select',
// 			'id'       => "{$prefix}select",
// 			'type'     => 'select',
// 			// Array of 'value' => 'Label' pairs for select box
// 			'options'  => array(
// 				'value1' => 'Label1',
// 				'value2' => 'Label2',
// 			),
// 			// Select multiple values, optional. Default is false.
// 			'multiple' => false,
// 		),
// 		// HIDDEN
// 		array(
// 			'id'   => "{$prefix}hidden",
// 			'type' => 'hidden',
// 			// Hidden field must have predefined value
// 			'std'  => 'Hidden value',
// 		),
// 		// PASSWORD
// 		array(
// 			'name' => 'Password',
// 			'id'   => "{$prefix}password",
// 			'type' => 'password',
// 		),
// 		// TEXTAREA
// 		array(
// 			'name' => 'Textarea',
// 			'desc' => 'Textarea description',
// 			'id'   => "{$prefix}textarea",
// 			'type' => 'textarea',
// 			'cols' => '20',
// 			'rows' => '3',
// 		),
// 	),
// 	'validation' => array(
// 		'rules' => array(
// 			"{$prefix}password" => array(
// 				'required'  => true,
// 				'minlength' => 7,
// 			),
// 		),
// 		// optional override of default jquery.validate messages
// 		'messages' => array(
// 			"{$prefix}password" => array(
// 				'required'  => 'Password is required',
// 				'minlength' => 'Password must be at least 7 characters',
// 			),
// 		)
// 	)
// );

$meta_boxes[] = array(
	'id'	=>	'cliente',
	'title'	=>	'Endereço',
	'pages'	=>	array('cliente'),
	'context'	=>	'side'
);

// CLIENTES
$meta_boxes[] = array(
	'id' => 'cliente',

	'title' => 'Campos Avançados',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Campos do Cliente',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'cliente' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(

		//DESTAQUE
		array(
			'name' => 'Marcar como Destaque',
			'id'   => "{$prefix}destaque",
			'type' => 'checkbox'
		),
		// DATE
		array(
			'name' => 'Data de Expiração',
			'id'   => "{$prefix}data_expira",
			'type' => 'date',

			// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
			'js_options' => array(
				'appendText'      => '(dd/mm/yyyy)',
				'dateFormat'      => 'dd/mm/yy',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
			'size'	=>	'15'
		),
		array(
			'name' => 'Logomarca',
			'desc' => 'Imagem com dimensão 150px X 150px',
			'id'   => "{$prefix}logo",
			'type' => 'image',
		),
		array(
			'name'  => 'Link para o Site.',
			'id'    => "{$prefix}site",
			'desc'  => 'Ex.: http://www.exemplodeurl.com.br',
			'type'  => 'text',
			'size'	=>	'50'
		),
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => 'Texto descritivo',
			'desc' => 'Escreva com clareza uma descrição sobre o cliente.',
			'id'   => "{$prefix}texto",
			'type' => 'wysiwyg',

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 16,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		// FILE UPLOAD
		array(
			'name' => 'Arquivo do cliente',
			'desc' => 'Arquivo para download. Por ex.: cardápio, folheto,etc...',
			'id'   => "{$prefix}arquivo",
			'type' => 'file',
		),
		
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => 'Galeria de Fotos do Cliente',
			'id'               => "{$prefix}galeria",
			'type'             => 'plupload_image',
			'max_file_uploads' => 10,
		),
		array(
			'name'  => 'Endereço',
			'id'    => "{$prefix}endereco",
			'desc'  => 'Ex.:Rua Jornalista Marista Medeiros, n 726 etc.',
			'type'  => 'text',
			'size'	=>	'50'
		),
		array(
			'name'  => 'Complemento',
			'id'    => "{$prefix}complemento",
			'desc'  => 'Ex.: Bloco A3',
			'type'  => 'text',
			'size'	=>	'50'
		),
		array(
			'name'  => 'CEP',
			'id'    => "{$prefix}cep",
			'desc'  => 'Ex.: 99999-999',
			'type'  => 'text',
			'size'	=>	'12'
		),
		array(
			'name'  => 'Bairro',
			'id'    => "{$prefix}bairro",
			'desc'  => 'Ex.: Jardim Cidade Universitária',
			'type'  => 'text',
			'size'	=>	'35'
		),
		array(
			'name'  => 'Cidade/Estado',
			'id'    => "{$prefix}cidade_estado",
			'desc'  => 'Ex.: João Pessoa / PB',
			'type'  => 'text',
			'size'	=>	'35'
		),
		array(
			// Field name - Will be used as label
			'name'  => 'Telefones',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}telefones",
			// Field description (optional)
			'desc'  => 'Adicione os telefones. Ex: (83) 9999-9999',
			'type'  => 'text',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true
		),
		array(
			'name' => 'Google Maps',
			'desc' => 'Cole aqui a tag "&ltiframe&gt" do google maps',
			'id'   => "{$prefix}google_maps",
			'type' => 'textarea',
			'cols' => '30',
			'rows' => '10',
		),
	)
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function mb_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'mb_register_meta_boxes' );
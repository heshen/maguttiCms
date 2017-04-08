<?php
return [
		'adminusers' => [
			'first_name' => 'required',
			'last_name'  => 'required',
			'email' => 'required|unique:adminusers|Between:3,64|Email',
			'role' => 'required',
			'password' => 'alpha_num|min:6|confirmed',
			'password_confirmation' => 'alpha_num|min:6',
		],
		'articles' => [
			'title' => 'required',
		],
		'contacts' => [
			'name'	  => 'required',
			'company' => 'required',
			'subject' => 'required',
			'message' => 'required',
			'email'   => 'required|Between:3,64|Email',
		],
		'categories' => [
			'title' => 'required',
	    ],
		'countries' => [
			'name' => 'required',
			'iso_code' => 'required|Between:1,3',
		],
		'domains' => [
			'title'  => 'required',
			'domain' => 'required',
		],
		'media' => [
			'title' => 'required',
     	],
		'hpsliders' => [
			'title' => 'required',
		],
		'news' => [
			'title'  => 'required',
		],
		'products' => [
			'title' => 'required',
		],
		'productmodels' => [
			'title' => 'required',
		],
		'provinces' => [
			'title' => 'required',
			'code' => 'required',
		],
		'tags' => [
			'title' => 'required',
		],
		'roles' => [
			'name' => 'required',
			'display_name' => 'required',
		],
		'socials' => [
			'title' => 'required',
			'link' => 'required',
			'icon' => 'required',
		],
		'settings' => [
			'value'  => 'required',
			'key' => 'required',
		],
		'states' => [
			'title' => 'required',
		],
		'users' => [
			'name' => 'required',
			'email' => 'required|unique:adminusers|Between:3,64|Email',
		    'password' => 'alpha_num|min:6|confirmed',
			'password_confirmation' => 'alpha_num|min:6',
		],
        'botanies' => [
            'name' => 'required|max:255',
            'alias' => 'max:255',
            'english_name' => 'max:255',
            'latin_name' => 'required|max:255',
            'taxon' => 'required|integer',
            'family' => 'max:50',
            'latin_family' => 'max:50',
            'genus' => 'max:50',
            'latin_genus' => 'max:50',
            'trait' => 'required|max:3000',
            'distribution' => 'max:1000',
            'growth_env' => 'max:1000',
            'purpose' => 'max:1000',
            'medical' => 'max:1000',

            'img_title1' => 'max:255',
            'img1' => 'max:255',
            'img_title2' => 'max:255',
            'img2' => 'max:255',
            'img_title3' => 'max:255',
            'img3' => 'max:255',
            'img_title4' => 'max:255',
            'img4' => 'max:255',
            'img_title5' => 'max:255',
            'img5' => 'max:255',
            'img_title6' => 'max:255',
            'img6' => 'max:255',

        ],




		
];
<?php
/* Theme Support */
function thb_theme_setup() {
	/* Text Domain */
	load_theme_textdomain('notio', THB_THEME_ROOT_ABS . '/inc/languages');
	
	/* Required Settings */
	if(!isset($content_width)) $content_width = 1170;
	add_theme_support( 'automatic-feed-links' );
	
	/* Background Support */
	add_theme_support( 'custom-background', array( 'default-color' => 'f9f9f9') );
	
	/* Title Support */
	add_theme_support( 'title-tag' );
	
	/* Editor Styling */
	add_editor_style();
	
	/* Image Settings */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 70, 60, true );
	add_image_size('notio-single', 1200, 600, true );
	add_image_size('notio-style1', 1200, 400, true );
	add_image_size('notio-style2', 400, 9999, false );
	add_image_size('notio-style3', 400, 340, true );
	add_image_size('notio-style4', 900, 600, true );
	add_image_size('notio-style4', 650, 600, true );
	
	/* HTML5 Galleries */
	add_theme_support( 'html5', array( 'gallery', 'caption' ) );
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	/* WooCommerce Support */
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'thb_theme_setup' );

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
			'' => '',
			'fa-adjust' => 'Adjust',
			'fa-adn' => 'Adn',
			'fa-align-center' => 'Align center',
			'fa-align-justify' => 'Align justify',
			'fa-align-left' => 'Align left',
			'fa-align-right' => 'Align right',
			'fa-ambulance' => 'Ambulance',
			'fa-anchor' => 'Anchor',
			'fa-android' => 'Android',
			'fa-angellist' => 'Angellist',
			'fa-angle-double-down' => 'Angle double down',
			'fa-angle-double-left' => 'Angle double left',
			'fa-angle-double-right' => 'Angle double right',
			'fa-angle-double-up' => 'Angle double up',
			'fa-angle-down' => 'Angle down',
			'fa-angle-left' => 'Angle left',
			'fa-angle-right' => 'Angle right',
			'fa-angle-up' => 'Angle up',
			'fa-apple' => 'Apple',
			'fa-archive' => 'Archive',
			'fa-area-chart' => 'Area chart',
			'fa-arrow-circle-down' => 'Arrow circle down',
			'fa-arrow-circle-left' => 'Arrow circle left',
			'fa-arrow-circle-o-down' => 'Arrow circle o down',
			'fa-arrow-circle-o-left' => 'Arrow circle o left',
			'fa-arrow-circle-o-right' => 'Arrow circle o right',
			'fa-arrow-circle-o-up' => 'Arrow circle o up',
			'fa-arrow-circle-right' => 'Arrow circle right',
			'fa-arrow-circle-up' => 'Arrow circle up',
			'fa-arrow-down' => 'Arrow down',
			'fa-arrow-left' => 'Arrow left',
			'fa-arrow-right' => 'Arrow right',
			'fa-arrow-up' => 'Arrow up',
			'fa-arrows' => 'Arrows',
			'fa-arrows-alt' => 'Arrows alt',
			'fa-arrows-h' => 'Arrows h',
			'fa-arrows-v' => 'Arrows v',
			'fa-asterisk' => 'Asterisk',
			'fa-at' => 'At',
			'fa-backward' => 'Backward',
			'fa-ban' => 'Ban',
			'fa-bar-chart' => 'Bar chart',
			'fa-barcode' => 'Barcode',
			'fa-bars' => 'Bars',
			'fa-bed' => 'Bed',
			'fa-beer' => 'Beer',
			'fa-behance' => 'Behance',
			'fa-behance-square' => 'Behance square',
			'fa-bell' => 'Bell',
			'fa-bell-o' => 'Bell o',
			'fa-bell-slash' => 'Bell slash',
			'fa-bell-slash-o' => 'Bell slash o',
			'fa-bicycle' => 'Bicycle',
			'fa-binoculars' => 'Binoculars',
			'fa-birthday-cake' => 'Birthday cake',
			'fa-bitbucket' => 'Bitbucket',
			'fa-bitbucket-square' => 'Bitbucket square',
			'fa-bold' => 'Bold',
			'fa-bolt' => 'Bolt',
			'fa-bomb' => 'Bomb',
			'fa-book' => 'Book',
			'fa-bookmark' => 'Bookmark',
			'fa-bookmark-o' => 'Bookmark o',
			'fa-briefcase' => 'Briefcase',
			'fa-btc' => 'Btc',
			'fa-bug' => 'Bug',
			'fa-building' => 'Building',
			'fa-building-o' => 'Building o',
			'fa-bullhorn' => 'Bullhorn',
			'fa-bullseye' => 'Bullseye',
			'fa-bus' => 'Bus',
			'fa-buysellads' => 'Buysellads',
			'fa-calculator' => 'Calculator',
			'fa-calendar' => 'Calendar',
			'fa-calendar-o' => 'Calendar o',
			'fa-camera' => 'Camera',
			'fa-camera-retro' => 'Camera retro',
			'fa-car' => 'Car',
			'fa-caret-down' => 'Caret down',
			'fa-caret-left' => 'Caret left',
			'fa-caret-right' => 'Caret right',
			'fa-caret-square-o-down' => 'Caret square o down',
			'fa-caret-square-o-left' => 'Caret square o left',
			'fa-caret-square-o-right' => 'Caret square o right',
			'fa-caret-square-o-up' => 'Caret square o up',
			'fa-caret-up' => 'Caret up',
			'fa-cart-arrow-down' => 'Cart arrow down',
			'fa-cart-plus' => 'Cart plus',
			'fa-cc' => 'Cc',
			'fa-cc-amex' => 'Cc amex',
			'fa-cc-discover' => 'Cc discover',
			'fa-cc-mastercard' => 'Cc mastercard',
			'fa-cc-paypal' => 'Cc paypal',
			'fa-cc-stripe' => 'Cc stripe',
			'fa-cc-visa' => 'Cc visa',
			'fa-certificate' => 'Certificate',
			'fa-chain-broken' => 'Chain broken',
			'fa-check' => 'Check',
			'fa-check-circle' => 'Check circle',
			'fa-check-circle-o' => 'Check circle o',
			'fa-check-square' => 'Check square',
			'fa-check-square-o' => 'Check square o',
			'fa-chevron-circle-down' => 'Chevron circle down',
			'fa-chevron-circle-left' => 'Chevron circle left',
			'fa-chevron-circle-right' => 'Chevron circle right',
			'fa-chevron-circle-up' => 'Chevron circle up',
			'fa-chevron-down' => 'Chevron down',
			'fa-chevron-left' => 'Chevron left',
			'fa-chevron-right' => 'Chevron right',
			'fa-chevron-up' => 'Chevron up',
			'fa-child' => 'Child',
			'fa-circle' => 'Circle',
			'fa-circle-o' => 'Circle o',
			'fa-circle-o-notch' => 'Circle o notch',
			'fa-circle-thin' => 'Circle thin',
			'fa-clipboard' => 'Clipboard',
			'fa-clock-o' => 'Clock o',
			'fa-cloud' => 'Cloud',
			'fa-cloud-download' => 'Cloud download',
			'fa-cloud-upload' => 'Cloud upload',
			'fa-code' => 'Code',
			'fa-code-fork' => 'Code fork',
			'fa-codepen' => 'Codepen',
			'fa-coffee' => 'Coffee',
			'fa-cog' => 'Cog',
			'fa-cogs' => 'Cogs',
			'fa-columns' => 'Columns',
			'fa-comment' => 'Comment',
			'fa-comment-o' => 'Comment o',
			'fa-comments' => 'Comments',
			'fa-comments-o' => 'Comments o',
			'fa-compass' => 'Compass',
			'fa-compress' => 'Compress',
			'fa-connectdevelop' => 'Connectdevelop',
			'fa-copyright' => 'Copyright',
			'fa-credit-card' => 'Credit card',
			'fa-crop' => 'Crop',
			'fa-crosshairs' => 'Crosshairs',
			'fa-css3' => 'Css3',
			'fa-cube' => 'Cube',
			'fa-cubes' => 'Cubes',
			'fa-cutlery' => 'Cutlery',
			'fa-dashcube' => 'Dashcube',
			'fa-database' => 'Database',
			'fa-delicious' => 'Delicious',
			'fa-desktop' => 'Desktop',
			'fa-deviantart' => 'Deviantart',
			'fa-diamond' => 'Diamond',
			'fa-digg' => 'Digg',
			'fa-dot-circle-o' => 'Dot circle o',
			'fa-download' => 'Download',
			'fa-dribbble' => 'Dribbble',
			'fa-dropbox' => 'Dropbox',
			'fa-drupal' => 'Drupal',
			'fa-eject' => 'Eject',
			'fa-ellipsis-h' => 'Ellipsis h',
			'fa-ellipsis-v' => 'Ellipsis v',
			'fa-empire' => 'Empire',
			'fa-envelope' => 'Envelope',
			'fa-envelope-o' => 'Envelope o',
			'fa-envelope-square' => 'Envelope square',
			'fa-eraser' => 'Eraser',
			'fa-eur' => 'Eur',
			'fa-exchange' => 'Exchange',
			'fa-exclamation' => 'Exclamation',
			'fa-exclamation-circle' => 'Exclamation circle',
			'fa-exclamation-triangle' => 'Exclamation triangle',
			'fa-expand' => 'Expand',
			'fa-external-link' => 'External link',
			'fa-external-link-square' => 'External link square',
			'fa-eye' => 'Eye',
			'fa-eye-slash' => 'Eye slash',
			'fa-eyedropper' => 'Eyedropper',
			'fa-facebook' => 'Facebook',
			'fa-facebook-official' => 'Facebook official',
			'fa-facebook-square' => 'Facebook square',
			'fa-fast-backward' => 'Fast backward',
			'fa-fast-forward' => 'Fast forward',
			'fa-fax' => 'Fax',
			'fa-female' => 'Female',
			'fa-fighter-jet' => 'Fighter jet',
			'fa-file' => 'File',
			'fa-file-archive-o' => 'File archive o',
			'fa-file-audio-o' => 'File audio o',
			'fa-file-code-o' => 'File code o',
			'fa-file-excel-o' => 'File excel o',
			'fa-file-image-o' => 'File image o',
			'fa-file-o' => 'File o',
			'fa-file-pdf-o' => 'File pdf o',
			'fa-file-powerpoint-o' => 'File powerpoint o',
			'fa-file-text' => 'File text',
			'fa-file-text-o' => 'File text o',
			'fa-file-video-o' => 'File video o',
			'fa-file-word-o' => 'File word o',
			'fa-files-o' => 'Files o',
			'fa-film' => 'Film',
			'fa-filter' => 'Filter',
			'fa-fire' => 'Fire',
			'fa-fire-extinguisher' => 'Fire extinguisher',
			'fa-flag' => 'Flag',
			'fa-flag-checkered' => 'Flag checkered',
			'fa-flag-o' => 'Flag o',
			'fa-flask' => 'Flask',
			'fa-flickr' => 'Flickr',
			'fa-floppy-o' => 'Floppy o',
			'fa-folder' => 'Folder',
			'fa-folder-o' => 'Folder o',
			'fa-folder-open' => 'Folder open',
			'fa-folder-open-o' => 'Folder open o',
			'fa-font' => 'Font',
			'fa-forumbee' => 'Forumbee',
			'fa-forward' => 'Forward',
			'fa-foursquare' => 'Foursquare',
			'fa-frown-o' => 'Frown o',
			'fa-futbol-o' => 'Futbol o',
			'fa-gamepad' => 'Gamepad',
			'fa-gavel' => 'Gavel',
			'fa-gbp' => 'Gbp',
			'fa-gift' => 'Gift',
			'fa-git' => 'Git',
			'fa-git-square' => 'Git square',
			'fa-github' => 'Github',
			'fa-github-alt' => 'Github alt',
			'fa-github-square' => 'Github square',
			'fa-glass' => 'Glass',
			'fa-globe' => 'Globe',
			'fa-google' => 'Google',
			'fa-google-plus' => 'Google plus',
			'fa-google-plus-square' => 'Google plus square',
			'fa-google-wallet' => 'Google wallet',
			'fa-graduation-cap' => 'Graduation cap',
			'fa-gratipay' => 'Gratipay',
			'fa-h-square' => 'H square',
			'fa-hacker-news' => 'Hacker news',
			'fa-hand-o-down' => 'Hand o down',
			'fa-hand-o-left' => 'Hand o left',
			'fa-hand-o-right' => 'Hand o right',
			'fa-hand-o-up' => 'Hand o up',
			'fa-hdd-o' => 'Hdd o',
			'fa-header' => 'Header',
			'fa-headphones' => 'Headphones',
			'fa-heart' => 'Heart',
			'fa-heart-o' => 'Heart o',
			'fa-heartbeat' => 'Heartbeat',
			'fa-history' => 'History',
			'fa-home' => 'Home',
			'fa-hospital-o' => 'Hospital o',
			'fa-html5' => 'Html5',
			'fa-ils' => 'Ils',
			'fa-inbox' => 'Inbox',
			'fa-indent' => 'Indent',
			'fa-info' => 'Info',
			'fa-info-circle' => 'Info circle',
			'fa-inr' => 'Inr',
			'fa-instagram' => 'Instagram',
			'fa-ioxhost' => 'Ioxhost',
			'fa-italic' => 'Italic',
			'fa-joomla' => 'Joomla',
			'fa-jpy' => 'Jpy',
			'fa-jsfiddle' => 'Jsfiddle',
			'fa-key' => 'Key',
			'fa-keyboard-o' => 'Keyboard o',
			'fa-krw' => 'Krw',
			'fa-language' => 'Language',
			'fa-laptop' => 'Laptop',
			'fa-lastfm' => 'Lastfm',
			'fa-lastfm-square' => 'Lastfm square',
			'fa-leaf' => 'Leaf',
			'fa-leanpub' => 'Leanpub',
			'fa-lemon-o' => 'Lemon o',
			'fa-level-down' => 'Level down',
			'fa-level-up' => 'Level up',
			'fa-life-ring' => 'Life ring',
			'fa-lightbulb-o' => 'Lightbulb o',
			'fa-line-chart' => 'Line chart',
			'fa-link' => 'Link',
			'fa-linkedin' => 'Linkedin',
			'fa-linkedin-square' => 'Linkedin square',
			'fa-linux' => 'Linux',
			'fa-list' => 'List',
			'fa-list-alt' => 'List alt',
			'fa-list-ol' => 'List ol',
			'fa-list-ul' => 'List ul',
			'fa-location-arrow' => 'Location arrow',
			'fa-lock' => 'Lock',
			'fa-long-arrow-down' => 'Long arrow down',
			'fa-long-arrow-left' => 'Long arrow left',
			'fa-long-arrow-right' => 'Long arrow right',
			'fa-long-arrow-up' => 'Long arrow up',
			'fa-magic' => 'Magic',
			'fa-magnet' => 'Magnet',
			'fa-male' => 'Male',
			'fa-map-marker' => 'Map marker',
			'fa-mars' => 'Mars',
			'fa-mars-double' => 'Mars double',
			'fa-mars-stroke' => 'Mars stroke',
			'fa-mars-stroke-h' => 'Mars stroke h',
			'fa-mars-stroke-v' => 'Mars stroke v',
			'fa-maxcdn' => 'Maxcdn',
			'fa-meanpath' => 'Meanpath',
			'fa-medium' => 'Medium',
			'fa-medkit' => 'Medkit',
			'fa-meh-o' => 'Meh o',
			'fa-mercury' => 'Mercury',
			'fa-microphone' => 'Microphone',
			'fa-microphone-slash' => 'Microphone slash',
			'fa-minus' => 'Minus',
			'fa-minus-circle' => 'Minus circle',
			'fa-minus-square' => 'Minus square',
			'fa-minus-square-o' => 'Minus square o',
			'fa-mobile' => 'Mobile',
			'fa-money' => 'Money',
			'fa-moon-o' => 'Moon o',
			'fa-motorcycle' => 'Motorcycle',
			'fa-music' => 'Music',
			'fa-neuter' => 'Neuter',
			'fa-newspaper-o' => 'Newspaper o',
			'fa-openid' => 'Openid',
			'fa-outdent' => 'Outdent',
			'fa-pagelines' => 'Pagelines',
			'fa-paint-brush' => 'Paint brush',
			'fa-paper-plane' => 'Paper plane',
			'fa-paper-plane-o' => 'Paper plane o',
			'fa-paperclip' => 'Paperclip',
			'fa-paragraph' => 'Paragraph',
			'fa-pause' => 'Pause',
			'fa-paw' => 'Paw',
			'fa-paypal' => 'Paypal',
			'fa-pencil' => 'Pencil',
			'fa-pencil-square' => 'Pencil square',
			'fa-pencil-square-o' => 'Pencil square o',
			'fa-phone' => 'Phone',
			'fa-phone-square' => 'Phone square',
			'fa-picture-o' => 'Picture o',
			'fa-pie-chart' => 'Pie chart',
			'fa-pied-piper' => 'Pied piper',
			'fa-pied-piper-alt' => 'Pied piper alt',
			'fa-pinterest' => 'Pinterest',
			'fa-pinterest-p' => 'Pinterest p',
			'fa-pinterest-square' => 'Pinterest square',
			'fa-plane' => 'Plane',
			'fa-play' => 'Play',
			'fa-play-circle' => 'Play circle',
			'fa-play-circle-o' => 'Play circle o',
			'fa-plug' => 'Plug',
			'fa-plus' => 'Plus',
			'fa-plus-circle' => 'Plus circle',
			'fa-plus-square' => 'Plus square',
			'fa-plus-square-o' => 'Plus square o',
			'fa-power-off' => 'Power off',
			'fa-print' => 'Print',
			'fa-puzzle-piece' => 'Puzzle piece',
			'fa-qq' => 'Qq',
			'fa-qrcode' => 'Qrcode',
			'fa-question' => 'Question',
			'fa-question-circle' => 'Question circle',
			'fa-quote-left' => 'Quote left',
			'fa-quote-right' => 'Quote right',
			'fa-random' => 'Random',
			'fa-rebel' => 'Rebel',
			'fa-recycle' => 'Recycle',
			'fa-reddit' => 'Reddit',
			'fa-reddit-square' => 'Reddit square',
			'fa-refresh' => 'Refresh',
			'fa-renren' => 'Renren',
			'fa-repeat' => 'Repeat',
			'fa-reply' => 'Reply',
			'fa-reply-all' => 'Reply all',
			'fa-retweet' => 'Retweet',
			'fa-road' => 'Road',
			'fa-rocket' => 'Rocket',
			'fa-rss' => 'Rss',
			'fa-rss-square' => 'Rss square',
			'fa-rub' => 'Rub',
			'fa-scissors' => 'Scissors',
			'fa-search' => 'Search',
			'fa-search-minus' => 'Search minus',
			'fa-search-plus' => 'Search plus',
			'fa-sellsy' => 'Sellsy',
			'fa-server' => 'Server',
			'fa-share' => 'Share',
			'fa-share-alt' => 'Share alt',
			'fa-share-alt-square' => 'Share alt square',
			'fa-share-square' => 'Share square',
			'fa-share-square-o' => 'Share square o',
			'fa-shield' => 'Shield',
			'fa-ship' => 'Ship',
			'fa-shirtsinbulk' => 'Shirtsinbulk',
			'fa-shopping-cart' => 'Shopping cart',
			'fa-sign-in' => 'Sign in',
			'fa-sign-out' => 'Sign out',
			'fa-signal' => 'Signal',
			'fa-simplybuilt' => 'Simplybuilt',
			'fa-sitemap' => 'Sitemap',
			'fa-skyatlas' => 'Skyatlas',
			'fa-skype' => 'Skype',
			'fa-slack' => 'Slack',
			'fa-sliders' => 'Sliders',
			'fa-slideshare' => 'Slideshare',
			'fa-smile-o' => 'Smile o',
			'fa-sort' => 'Sort',
			'fa-sort-alpha-asc' => 'Sort alpha asc',
			'fa-sort-alpha-desc' => 'Sort alpha desc',
			'fa-sort-amount-asc' => 'Sort amount asc',
			'fa-sort-amount-desc' => 'Sort amount desc',
			'fa-sort-asc' => 'Sort asc',
			'fa-sort-desc' => 'Sort desc',
			'fa-sort-numeric-asc' => 'Sort numeric asc',
			'fa-sort-numeric-desc' => 'Sort numeric desc',
			'fa-soundcloud' => 'Soundcloud',
			'fa-space-shuttle' => 'Space shuttle',
			'fa-spinner' => 'Spinner',
			'fa-spoon' => 'Spoon',
			'fa-spotify' => 'Spotify',
			'fa-square' => 'Square',
			'fa-square-o' => 'Square o',
			'fa-stack-exchange' => 'Stack exchange',
			'fa-stack-overflow' => 'Stack overflow',
			'fa-star' => 'Star',
			'fa-star-half' => 'Star half',
			'fa-star-half-o' => 'Star half o',
			'fa-star-o' => 'Star o',
			'fa-steam' => 'Steam',
			'fa-steam-square' => 'Steam square',
			'fa-step-backward' => 'Step backward',
			'fa-step-forward' => 'Step forward',
			'fa-stethoscope' => 'Stethoscope',
			'fa-stop' => 'Stop',
			'fa-street-view' => 'Street view',
			'fa-strikethrough' => 'Strikethrough',
			'fa-stumbleupon' => 'Stumbleupon',
			'fa-stumbleupon-circle' => 'Stumbleupon circle',
			'fa-subscript' => 'Subscript',
			'fa-subway' => 'Subway',
			'fa-suitcase' => 'Suitcase',
			'fa-sun-o' => 'Sun o',
			'fa-superscript' => 'Superscript',
			'fa-table' => 'Table',
			'fa-tablet' => 'Tablet',
			'fa-tachometer' => 'Tachometer',
			'fa-tag' => 'Tag',
			'fa-tags' => 'Tags',
			'fa-tasks' => 'Tasks',
			'fa-taxi' => 'Taxi',
			'fa-tencent-weibo' => 'Tencent weibo',
			'fa-terminal' => 'Terminal',
			'fa-text-height' => 'Text height',
			'fa-text-width' => 'Text width',
			'fa-th' => 'Th',
			'fa-th-large' => 'Th large',
			'fa-th-list' => 'Th list',
			'fa-thumb-tack' => 'Thumb tack',
			'fa-thumbs-down' => 'Thumbs down',
			'fa-thumbs-o-down' => 'Thumbs o down',
			'fa-thumbs-o-up' => 'Thumbs o up',
			'fa-thumbs-up' => 'Thumbs up',
			'fa-ticket' => 'Ticket',
			'fa-times' => 'Times',
			'fa-times-circle' => 'Times circle',
			'fa-times-circle-o' => 'Times circle o',
			'fa-tint' => 'Tint',
			'fa-toggle-off' => 'Toggle off',
			'fa-toggle-on' => 'Toggle on',
			'fa-train' => 'Train',
			'fa-transgender' => 'Transgender',
			'fa-transgender-alt' => 'Transgender alt',
			'fa-trash' => 'Trash',
			'fa-trash-o' => 'Trash o',
			'fa-tree' => 'Tree',
			'fa-trello' => 'Trello',
			'fa-trophy' => 'Trophy',
			'fa-truck' => 'Truck',
			'fa-try' => 'Try',
			'fa-tty' => 'Tty',
			'fa-tumblr' => 'Tumblr',
			'fa-tumblr-square' => 'Tumblr square',
			'fa-twitch' => 'Twitch',
			'fa-twitter' => 'Twitter',
			'fa-twitter-square' => 'Twitter square',
			'fa-umbrella' => 'Umbrella',
			'fa-underline' => 'Underline',
			'fa-undo' => 'Undo',
			'fa-university' => 'University',
			'fa-unlock' => 'Unlock',
			'fa-unlock-alt' => 'Unlock alt',
			'fa-upload' => 'Upload',
			'fa-usd' => 'Usd',
			'fa-user' => 'User',
			'fa-user-md' => 'User md',
			'fa-user-plus' => 'User plus',
			'fa-user-secret' => 'User secret',
			'fa-user-times' => 'User times',
			'fa-users' => 'Users',
			'fa-venus' => 'Venus',
			'fa-venus-double' => 'Venus double',
			'fa-venus-mars' => 'Venus mars',
			'fa-viacoin' => 'Viacoin',
			'fa-video-camera' => 'Video camera',
			'fa-vimeo-square' => 'Vimeo square',
			'fa-vine' => 'Vine',
			'fa-vk' => 'Vk',
			'fa-volume-down' => 'Volume down',
			'fa-volume-off' => 'Volume off',
			'fa-volume-up' => 'Volume up',
			'fa-weibo' => 'Weibo',
			'fa-weixin' => 'Weixin',
			'fa-whatsapp' => 'Whatsapp',
			'fa-wheelchair' => 'Wheelchair',
			'fa-wifi' => 'Wifi',
			'fa-windows' => 'Windows',
			'fa-wordpress' => 'Wordpress',
			'fa-wrench' => 'Wrench',
			'fa-xing' => 'Xing',
			'fa-xing-square' => 'Xing square',
			'fa-yahoo' => 'Yahoo',
			'fa-yelp' => 'Yelp',
			'fa-youtube' => 'Youtube',
			'fa-youtube-play' => 'Youtube play',
			'fa-youtube-square' => 'Youtube square'
		);
  return $icons;
}

/* Thb Header Search */
function thb_quick_search() {
 ?>
	<a href="#searchpopup" id="quick_search"><svg version="1.1" id="search_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
			<path d="M19.769,18.408l-5.408-5.357c1.109-1.364,1.777-3.095,1.777-4.979c0-4.388-3.604-7.958-8.033-7.958
				c-4.429,0-8.032,3.57-8.032,7.958s3.604,7.958,8.032,7.958c1.805,0,3.468-0.601,4.811-1.6l5.435,5.384
				c0.196,0.194,0.453,0.29,0.71,0.29c0.256,0,0.513-0.096,0.709-0.29C20.16,19.426,20.16,18.796,19.769,18.408z M2.079,8.072
				c0-3.292,2.703-5.97,6.025-5.97s6.026,2.678,6.026,5.97c0,3.292-2.704,5.969-6.026,5.969S2.079,11.364,2.079,8.072z"/>
	</svg></a>
<?php
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* THB Social Icons */
function thb_social() {
 ?>
	<?php if ($fb_link = ot_get_option('fb_link')) { ?>
	<a href="<?php echo esc_url($fb_link); ?>" target="_blank" class="facebook icon-1x"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if ($pin_link = ot_get_option('pinterest_link')) { ?>
	<a href="<?php echo esc_url($pin_link); ?>" target="_blank" class="pinterest icon-1x"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if ($tw_link = ot_get_option('twitter_link')) { ?>
	<a href="<?php echo esc_url($tw_link); ?>" target="_blank" class="twitter icon-1x"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if ($li_link = ot_get_option('linkedin_link')) { ?>
	<a href="<?php echo esc_url($li_link); ?>" target="_blank" class="linkedin icon-1x"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if ($ins_link = ot_get_option('instragram_link')) { ?>
	<a href="<?php echo esc_url($ins_link); ?>" target="_blank" class="instagram icon-1x"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if ($xing_link = ot_get_option('xing_link')) { ?>
	<a href="<?php echo esc_url($xing_link); ?>" target="_blank" class="xing icon-1x"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if ($tu_link = ot_get_option('tumblr_link')) { ?>
	<a href="<?php echo esc_url($tu_link); ?>" target="_blank" class="tumblr icon-1x"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if ($vk_link = ot_get_option('vk_link')) { ?>
	<a href="<?php echo esc_url($vk_link); ?>" target="_blank" class="vk icon-1x"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if ($gp_link = ot_get_option('googleplus_link')) { ?>
	<a href="<?php echo esc_url($gp_link); ?>" target="_blank" class="google-plus icon-1x"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if ($sc_link = ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url($sc_link); ?>" target="_blank" class="soundcloud icon-1x"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if ($dri_link = ot_get_option('dribbble_link')) { ?>
	<a href="<?php echo esc_url($dri_link); ?>" target="_blank" class="dribbble icon-1x"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if ($yt_link = ot_get_option('youtube_link')) { ?>
	<a href="<?php echo esc_url($yt_link); ?>" target="_blank" class="youtube icon-1x"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if ($sf_link = ot_get_option('spotify_link')) { ?>
	<a href="<?php echo esc_url($sf_link); ?>" target="_blank" class="spotify icon-1x"><i class="fa fa-spotify"></i></a>
	<?php } ?>
	<?php if ($be_link = ot_get_option('behance_link')) { ?>
	<a href="<?php echo esc_url($be_link); ?>" target="_blank" class="behance icon-1x"><i class="fa fa-behance"></i></a>
	<?php } ?>
	<?php if ($da_link = ot_get_option('deviantart_link')) { ?>
	<a href="<?php echo esc_url($da_link); ?>" target="_blank" class="deviantart icon-1x"><i class="fa fa-deviantart"></i></a>
	<?php } ?>
	<?php if ($vi_link = ot_get_option('vimeo_link')) { ?>
	<a href="<?php echo esc_url($vi_link); ?>" target="_blank" class="vimeo icon-1x"><i class="fa fa-vimeo"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_social', 'thb_social',3 );


/* Payment Icons */
function thb_payment() {
?>
	<?php if (ot_get_option('payment_visa') != 'off') { ?>
		<figure class="paymenttypes visa"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_mc') != 'off') { ?>
		<figure class="paymenttypes mc"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_pp') != 'off') { ?>
		<figure class="paymenttypes paypal"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_discover') != 'off') { ?>
		<figure class="paymenttypes discover"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_amazon') != 'off') { ?>
		<figure class="paymenttypes amazon"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_stripe') != 'off') { ?>
		<figure class="paymenttypes stripe"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_amex') != 'off') { ?>
		<figure class="paymenttypes amex"></figure>
	<?php } ?>
<?php
}
add_action( 'thb_payment', 'thb_payment',3 );

/* Product Categories Array */
function thb_productCategories(){
	if(class_exists('woocommerce')) {
		
		$args = array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => '0'
		);
		
		$product_categories = get_terms( 'product_cat', $args );
		$out = array();
		if ($product_categories) {
			foreach($product_categories as $product_category) {
				$out[$product_category->name] = $product_category->slug;
			}
		}
		return $out;
	}
	
}
/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}
/* Portfolio Categories Array */
function thb_portfolioCategories(){
	$portfolio_categories = get_categories(array('taxonomy'=>'project-category'));
	$out = array();
	foreach($portfolio_categories as $portfolio_category) {
		$out[$portfolio_category->cat_name] = $portfolio_category->term_id;
	}
	return $out;
}

/* Out of Stock Check */
function thb_out_of_stock() {
  global $post;
  $id = $post->ID;
  $status = get_post_meta($id, '_stock_status',true);
  
  if ($status == 'outofstock') {
  	return true;
  } else {
  	return false;
  }
}

/* Get WishList Count */
function thb_wishlist_count() {
	if ( is_user_logged_in() ) {
	    $user_id = get_current_user_id();
	}
	
	$count = array();
	if ( class_exists( 'YITH_WCWL_UI' ) )  {
		if( is_user_logged_in() ) {
		    $count = $wpdb->get_results( $wpdb->prepare( 'SELECT COUNT(*) as `cnt` FROM `' . YITH_WCWL_TABLE . '` WHERE `user_id` = %d', $user_id  ), ARRAY_A );
		    $count = $count[0]['cnt'];
		} elseif( yith_usecookies() ) {
		    $count[0]['cnt'] = count( yith_getcookie( 'yith_wcwl_products' ) );
		} else {
		    $count[0]['cnt'] = count( $_SESSION['yith_wcwl_products'] );
		}
		
		if (is_array($count)) {
			$count = 0;
		}
	}
	return $count;
}

/* WishList Button*/
function thb_wishlist_button() {

	global $product, $yith_wcwl; 
	
	if ( class_exists( 'YITH_WCWL_UI' ) )  {
		$url = $yith_wcwl->get_wishlist_url();
		$product_type = $product->product_type;
		$exists = $yith_wcwl->is_product_in_wishlist( $product->id );
		
		$classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'class="add_to_wishlist single_add_to_wishlist"' : 'class="add_to_wishlist"';
		
		$html  = '<div class="yith-wcwl-add-to-wishlist">'; 
	    $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row
	    
	    $html .= $exists ? ' hide" style="display:none;"' : ' show"';
	    
	    $html .= '><a href="' . htmlspecialchars($yith_wcwl->get_addtowishlist_url()) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><i class="fa fa-heart-o"></i><span class="text">'.__( "Add to wishlist", 'bronx' ).'</span></a>';
	    $html .= '</div>';
	
			$html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <a href="' . $url . '" class="add_to_wishlist"><i class="fa fa-heart"></i><span class="text">'.__( "Added to wishlist", 'bronx' ).'</span></a></div>';
			$html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . $url . '" class="add_to_wishlist"><i class="fa fa-heart"></i><span class="text">'.__( "Added to wishlist", 'bronx' ).'</span></a></div>';
		
		$html .= '</div>';
		
		return $html;
		
	}

}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'bronx'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}

	return $human_time;

}
/* Prev/Next Post Links - http://wordpress.org/plugins/previous-and-next-post-in-same-taxonomy/ */
function be_previous_post_link($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($in_same_cat, $excluded_categories, true, $taxonomy);
}
function be_next_post_link($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($in_same_cat, $excluded_categories, false, $taxonomy);
}
function be_adjacent_post_link($in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category') {
	
	$post = be_get_adjacent_post($in_same_cat, $excluded_categories, $previous, $taxonomy);

	if ( !$post )
		return;

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = $previous ? __('Previous Post', 'bronx') : __('Next Post', 'bronx');
	
	$dir = $previous ? __('PREVIOUS', 'bronx') : __('NEXT', 'bronx');
	if ( has_post_thumbnail() ) {
		$image_id = get_post_thumbnail_id($post->ID);
		$image_link = wp_get_attachment_image_src($image_id,'full');
		$image = aq_resize( $image_link[0], 600, 200, true, false);
		$image_title = esc_attr( get_the_title($post->ID) );
		$image = '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" title="'.$image_title.'" />';
	} else {
		$image = '';	
	}
	$date = mysql2date(get_option('date_format'), $post->post_date);
	$rel = $previous ? 'prev' : 'next';
	$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" data-id="'.$post->ID.'" class="'.$rel.'">'. $image.'<div class="overlay"></div><div class="text"><span class="dir">'.$dir.'</span><span class="hr"></span><span class="title">'. $title . '</span></div></a>';

	echo $string;
}
function be_get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category' ) {
	global $post, $wpdb;

	if ( empty( $post ) )
		return null;

	$current_post_date = $post->post_date;

	$join = '';
	$posts_in_ex_cats_sql = '';
	if ( $in_same_cat || ! empty( $excluded_categories ) ) {
		$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

		if ( $in_same_cat ) {
			$cat_array = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
			$join .= " AND tt.taxonomy = '$taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
		}

		$posts_in_ex_cats_sql = "AND tt.taxonomy = '$taxonomy'";
		if ( ! empty( $excluded_categories ) ) {
			if ( ! is_array( $excluded_categories ) ) {
				// back-compat, $excluded_categories used to be IDs separated by " and "
				if ( strpos( $excluded_categories, ' and ' ) !== false ) {
					_deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.', 'bronx' ), "'and'" ) );
					$excluded_categories = explode( ' and ', $excluded_categories );
				} else {
					$excluded_categories = explode( ',', $excluded_categories );
				}
			}

			$excluded_categories = array_map( 'intval', $excluded_categories );
				
			if ( ! empty( $cat_array ) ) {
				$excluded_categories = array_diff($excluded_categories, $cat_array);
				$posts_in_ex_cats_sql = '';
			}

			if ( !empty($excluded_categories) ) {
				$posts_in_ex_cats_sql = " AND tt.taxonomy = '$taxonomy' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
			}
		}
	}

	$adjacent = $previous ? 'previous' : 'next';
	$op = $previous ? '<' : '>';
	$order = $previous ? 'DESC' : 'ASC';

	$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

	$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
	$query_key = 'adjacent_post_' . md5($query);
	$result = wp_cache_get($query_key, 'counts');
	if ( false !== $result )
		return $result;

	$result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
	if ( null === $result )
		$result = '';

	wp_cache_set($query_key, $result, 'counts');
	return $result;
}

/* Portfolio Navigation */
function thb_post_navigation($arg) {
 ?>
	<div class="portfolio_nav row no-padding">
		<div class="small-12 medium-4 columns">
			<?php be_previous_post_link(false, '', $arg[0]); ?>
		</div>
		<div class="small-12 medium-4<?php if (!be_get_adjacent_post(false, '', $arg[0])) { ?> medium-push-4<?php } ?> columns">
			<a href="<?php echo $arg[1]; ?>" class="gotoportfolio"><?php echo $arg[2]; ?></a>
		</div>
		<div class="small-12 medium-4 columns">
			<?php be_next_post_link(false, '', $arg[0]); ?>
		</div>
	</div>
<?php
}
add_action( 'thb_post_navigation', 'thb_post_navigation', 3 );

/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function thb_admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'Fuelthemes.net', 'manage_options' , 'http://fuelthemes.net/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'thb_admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin () {  
  echo 'Thank you for choosing <a href="http://fuelthemes.net/?ref=wp_footer" target="blank">Fuel Themes</a>.';  
}
add_filter('admin_footer_text', 'thb_footer_admin'); 
?>
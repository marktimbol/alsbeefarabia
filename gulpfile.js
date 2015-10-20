var elixir = require('laravel-elixir');

var bowers = '../../../bower_components/';

elixir(function(mix) {

    /*=== PUBLIC SCRIPTS ===*/
    mix.sass('app.scss', 'resources/assets/css/app.css')

    	.styles([
            'app.css',
            bowers + 'font-awesome/css/font-awesome.css',
            bowers + 'wowjs/css/libs/animate.css'
    		], 'public/css/public.css')

        .styles([
            bowers + 'sweetalert/dist/sweetalert.css'
            ], 'public/css/sweetalert.css')

        .styles([
            bowers + 'owl-carousel/owl-carousel/owl.carousel.css',
            bowers + 'owl-carousel/owl-carousel/owl.theme.css'
            ], 'public/css/carousel.css')

        .styles([
            'libs/accordion.css'
            ], 'public/css/accordion.css')

    	.scripts([
    		bowers + 'jquery/dist/jquery.js',
    		bowers + 'bootstrap/dist/js/bootstrap.js',
            bowers + 'wowjs/dist/wow.js',
    		'app.js'
    		], 'public/js/public.js')

        .scripts([
            bowers + 'sweetalert/dist/sweetalert.min.js'
            ], 'public/js/sweetalert.js')

        .scripts([
            bowers + 'owl-carousel/owl-carousel/owl.carousel.js',
            'carousel.js'
            ], 'public/js/carousel.js')

        .scripts([
            'libs/jquery.cbpNTAccordion.js',
            'accordion.js'
            ], 'public/js/accordion.js')

        .scripts([
            'admin/filemanager.js',
            ], 'public/js/filemanager.js')


    /*=== ADMIN SCRIPTS ===*/

    mix.sass('admin.scss', 'resources/assets/css/admin/admin.css')

        .styles([
            'admin/admin.css',
            'admin/sb-admin.css',
            bowers + 'font-awesome/css/font-awesome.css',
            bowers + 'sweetalert/dist/sweetalert.css',
            bowers + 'dropzone/dist/dropzone.css'
            ], 'public/css/admin.css')

        .scripts([
            bowers + 'jquery/dist/jquery.js',
            bowers + 'bootstrap/dist/js/bootstrap.js',
            bowers + 'sweetalert/dist/sweetalert.min.js',
            bowers + 'dropzone/dist/dropzone.js',
            'admin/dropzone.js',
            'admin/admin.js'
            ], 'public/js/admin.js')

        .version([

            /*=== PUBLIC ===*/
            'css/public.css',
            'js/public.js',

            'css/carousel.css',
            'js/carousel.js',
            
            'css/accordion.css',
            'js/accordion.js',

            'css/sweetalert.css',
            'js/sweetalert.js',

            /*=== ADMIN ===*/

            'css/admin.css',
            'js/admin.js',
            'js/filemanager.js'

            ]);
});

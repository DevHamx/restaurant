const mix = require('laravel-mix');



/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |/
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.scripts([
   'resources/js/icheck.min.js',
   'resources/js/checkbox-radio.js',
], 'public/app-assets/js/checkboxes-radios.min.js')
.scripts([
   'resources/js/chart.min.js',
], 'public/app-assets/js/charts/chart.min.js')
.scripts([
   'resources/js/select2.full.min.js',
   'resources/js/form-select2.js',
], 'public/app-assets/js/select2/select2.min.js')
.scripts([
   'resources/js/vendors-test.min.js',
   'resources/js/datatables.min.js',
   'resources/js/application-menu.js',
   'resources/js/application.js',
   'resources/js/jsvalidation.min.js',
   'resources/sass/images/jquery-ui.js'
], 'public/app-assets/js/all.min.js')
   .sass('resources/sass/app.scss', 'public/app-assets/css')
   .sass('resources/sass/checkboxes-radios.scss', 'public/app-assets/css/checkboxes-radios.min.css')
   .styles('resources/css/select2.min.css', 'public/app-assets/css/select2/select2.min.css')
   .styles('resources/css/login.css', 'public/app-assets/css/pages/login.min.css')
   .styles('resources/css/bootstrap.css', 'public/app-assets/css/bootstrap.min.css')
   .styles('resources/css/fonts.css', 'public/app-assets/css/fonts.min.css')
   .styles('resources/css/bootstrap-extended.css', 'public/app-assets/css/bootstrap-extended.min.css')
   .styles('resources/css/style.css', 'public/app-assets/css/style.min.css')
   .scripts('resources/js/dashboard.js', 'public/app-assets/js/pages/dashboard.min.js')
   .scripts('resources/js/quittances.js', 'public/app-assets/js/pages/quittances.min.js')
   .scripts('resources/js/recus.js', 'public/app-assets/js/pages/recus.min.js')
   .scripts('resources/js/versements.js', 'public/app-assets/js/pages/versements.min.js')
   .scripts('resources/js/depenses.js', 'public/app-assets/js/pages/depenses.min.js')
   .scripts('resources/js/TPE.js', 'public/app-assets/js/pages/TPE.min.js')
   .scripts('resources/js/utilisateurs.js', 'public/app-assets/js/pages/utilisateurs.min.js')
   .scripts('resources/js/virements.js', 'public/app-assets/js/pages/virements.min.js')
   .scripts('resources/js/valeurs.js', 'public/app-assets/js/pages/valeurs.min.js')
   .scripts('resources/js/form-login.js', 'public/app-assets/js/pages/login.min.js')
   .copy('resources/lang/fr/datatable-fr.json','public/app-assets/languages/datatable-fr.json');



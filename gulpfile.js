/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
require('laravel-elixir-browsersync-official');
require('laravel-elixir-pug');

//Disable generating source.map files
elixir.config.sourcemaps = false;

//Elixir mixin function
elixir((mix) => {
    mix.sass('style.sass')
    	.pug({
       		blade: true,
       		pretty: true,
       		src: 'resources/assets/pug/**/*',
       		search: '**/*.pug',
       		dest: 'resources/views/**/*',
       })
       .webpack('app.js')
       .browserSync({
       		files: ["public/**/*", "resources/views/**/*"],
			proxy: 'http://192.168.1.3:8000',
		});
});
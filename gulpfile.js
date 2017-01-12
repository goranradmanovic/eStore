const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
require('laravel-elixir-pug')

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

elixir((mix) => {
    mix.sass('style.sass')
    	.pug({
       		blade: false,
       		pretty: true,
       		src: 'resources/assets/pug/**/*',
       		search: '**/*.pug',
       		dest: 'resources/views',
       })
       .webpack('app.js');
});
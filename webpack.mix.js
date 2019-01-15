let mix = require('laravel-mix');

mix
	// ### Starter
	// #### vue
    // .js('resources/assets/vue/js/app.js', 'public/starter/vue/js')
    .sass('resources/assets/vue/sass/app.scss', 'public/starter/vue/css')

    // #### element
    // .js('resources/assets/element/js/app.js', 'public/starter/element/js')
    // .sass('resources/assets/element/sass/app.scss', 'public/starter/element/css')

    // #### mint
    // .js('resources/assets/mint/js/app.js', 'public/starter/mint/js')
    // .sass('resources/assets/mint/sass/app.scss', 'public/starter/mint/css')

    // ### 项目
    // #### vue cms
    // .sass('resources/assets/sass/cms.scss', 'public/css')
    .sass('resources/assets/front/apps/link.scss', 'public/css')

    .sass('resources/assets/backend/apps/links.scss', 'public/backend/css')
;

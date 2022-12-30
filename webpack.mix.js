const mix = require("laravel-mix");
/*
    |-----------------------------------------------------------------------
    | Mix Asset Management
    |-----------------------------------------------------------------------
*/

var staticAssetsDir = "assets";

mix.webpackConfig({
  devtool: "inline-source-map",
});

mix
  .scripts(["src/js/starter.js"], `${staticAssetsDir}/js/starter.js`)
  .sass("src/scss/starter.scss", `${staticAssetsDir}/css/`)
  .options({
    processCssUrls: false,
  })
  .browserSync({
    proxy: "starter.localhost",
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map",
    })
    .sourceMaps();
}

/*
 * Mix Asset Management
 */

const mix = require("laravel-mix");

var staticAssetsDir = "assets";

mix.webpackConfig({
  devtool: "inline-source-map",
});

mix
  .js("src/js/apps/*.js", `${staticAssetsDir}/js/apps.js`) // concat, in order, all files in dir top to bottom
  .js(
    ["src/js/apps/jquery.touchSwipe.js", "src/js/apps/custom-select.js"],
    `${staticAssetsDir}/js/apps2.js`
  ) // concat in custom order, file choices
  .js(["src/js/starter.js"], `${staticAssetsDir}/js/starter.js`)
  .sass("src/scss/starter.scss", `${staticAssetsDir}/css/`)
  .options({
    processCssUrls: false,
  })
  .browserSync({
    proxy: "http://localhost:8888/Wordpress-Starter/",
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map",
    })
    .sourceMaps();
}

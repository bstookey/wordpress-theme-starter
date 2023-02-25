/*
 * Mix Asset Management
 */

const mix = require("laravel-mix");
require("laravel-mix-eslint");

var staticAssetsDir = "assets";

mix.webpackConfig({
  devtool: "inline-source-map",
});

mix
  .copy(
    "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
    `${staticAssetsDir}/js/`
  )
  //.js("src/js/apps/*.js", `${staticAssetsDir}/js/apps.js`) // concat, in order, all files in dir top to bottom
  .js(
    [
      //"src/js/apps/jquery.touchSwipe.js",
      "src/js/apps/custom-select.js",
      "node_modules/bootstrap/js/dist/collapse.js",
    ],
    `${staticAssetsDir}/js/apps2.js`
  ) // concat in custom order, file choices
  .js(["src/js/starter.js"], `${staticAssetsDir}/js/starter.js`)
  //.copy("node_modules/bootstrap/scss", "src/scss/bootstrap")
  .sass("src/scss/starter.scss", `${staticAssetsDir}/css/`)
  .options({
    processCssUrls: false,
  })
  .eslint({
    fix: true,
    extensions: ["js"],
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

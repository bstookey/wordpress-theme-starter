/*
 *
 * Webpack/ Laravel Mix Asset Management
 *
 */

const mix = require("laravel-mix");
require("laravel-mix-eslint");

const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");

var staticAssetsDir = "assets";

mix.webpackConfig({
  devtool: "inline-source-map",
  module: {
    rules: [
      {
        test: /\.svg$/,
        type: "asset/inline",
        use: "svg-transform-loader",
      },
    ],
  },
  plugins: [
    new SVGSpritemapPlugin("src/images/icons/*.svg", {
      output: {
        filename: "assets/images/icons/sprite.svg",
      },
      sprite: {
        prefix: false,
      },
    }),
  ],
});

mix
  .copy(
    "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
    `${staticAssetsDir}/js/`
  )
  .copy(
    "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map",
    `${staticAssetsDir}/js/`
  )
  .js("src/js/apps/*.js", `${staticAssetsDir}/js/apps.js`) // concat, in order, all files in dir top to bottom
  .js(
    ["src/js/apps/jquery.touchSwipe.js", "src/js/apps/custom-select.js"],
    `${staticAssetsDir}/js/apps2.js`
  ) // concat in custom order, file choices
  .js(["src/js/starter.js"], `${staticAssetsDir}/js/starter.js`)
  //.copy("node_modules/bootstrap/scss", "src/scss/bootstrap")
  .sass("src/scss/starter.scss", `${staticAssetsDir}/css/`)
  .options({
    processCssUrls: false,
  })
  .then(() => {
    // This code will run after the compilation has finished
    mix.version();
  })
  .eslint({
    fix: true,
    extensions: ["js"],
  })
  .browserSync({
    proxy: "http://localhost:8888/Wordpress-Starter/", // set to your local instance url
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map",
    })
    .sourceMaps();
}

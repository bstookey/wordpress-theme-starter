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
        filename: `${staticAssetsDir}/images/icons/sprite.svg`,
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
  // .copy(
  //   "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map",
  //   `${staticAssetsDir}/js/`
  // )
  // .copy("node_modules/js-cookie/dist/js.cookie.js", "src/js/apps/")
  // .copy(
  //   "node_modules/slick-carousel/slick/slick.css",
  //   `${staticAssetsDir}/slick-carousel/slick/`
  // )
  // .copy(
  //   "node_modules/slick-carousel/slick/slick-theme.css",
  //   `${staticAssetsDir}/slick-carousel/slick/`
  // )
  // .copy(
  //   "node_modules/slick-carousel/slick/slick.min.js",
  //   `${staticAssetsDir}/slick-carousel/slick/`
  // )
  // .copy(
  //   "node_modules/slick-carousel/slick/ajax-loader.gif",
  //   `${staticAssetsDir}/slick-carousel/slick/`
  // )
  // .scripts(
  //   [
  //     "src/js/apps/jquery.touchSwipe.js",
  //     "src/js/apps/js.cookie.js",
  //     "src/js/apps/header-search.js",
  //   ],
  //   `${staticAssetsDir}/js/apps.js`
  // ) // concat in custom order, file choices
  .scripts("src/js/apps/", `${staticAssetsDir}/js/apps.js`)
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
    proxy: "http://localhost:8888/wordpress/", // set to your local instance url
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map",
    })
    .sourceMaps();
}

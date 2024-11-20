/*
 *
 * Webpack/ Laravel Mix Asset Management
 *
 */

const mix = require("laravel-mix");
require("laravel-mix-eslint");
const fs = require("fs");
const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");

// Set variables
const localURL = "http://localhost:8888/wordpress/";
const staticAssetsPath = "assets";
const cssPath = staticAssetsPath + "/css/";
const jsPath = staticAssetsPath + "/js/";
const imagesPath = staticAssetsPath + "/images/";
const slickPath = staticAssetsPath + "/slick-carousel/slick/";

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
        filename: imagesPath + "/icons/sprite.svg",
      },
      sprite: {
        prefix: false,
      },
    }),
  ],
});

if (!fs.existsSync(slickPath + "ajax-loader.gif")) {
  mix.copy("node_modules/slick-carousel/slick/ajax-loader.gif", slickPath);
}
// .copy(
//   "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map",
//   `${staticAssetsPath}/js/`
// )
// .copy("node_modules/js-cookie/dist/js.cookie.js", "src/js/apps/")
// .copy(
//   "node_modules/slick-carousel/slick/slick.css",
//   `${staticAssetsPath}/slick-carousel/slick/`
// )
// .copy(
//   "node_modules/slick-carousel/slick/slick-theme.css",
//   `${staticAssetsPath}/slick-carousel/slick/`
// )
// .copy(
//   "node_modules/slick-carousel/slick/slick.min.js",
//   `${staticAssetsPath}/slick-carousel/slick/`
// )
// .copy(
//   "node_modules/slick-carousel/slick/ajax-loader.gif",
//   `${staticAssetsPath}/slick-carousel/slick/`
// )

mix
  // concat in custom order, file choices
  // .scripts(
  //   [
  //     "src/js/apps/jquery.touchSwipe.js",
  //     "src/js/apps/js.cookie.js",
  //     "src/js/apps/header-search.js",
  //   ],
  //   `${staticAssetsPath}/js/apps.js`
  // )

  .scripts("src/js/apps/", jsPath + "apps.js")
  .js(["src/js/starter.js"], jsPath)
  //.copy("node_modules/bootstrap/scss", "src/scss/bootstrap")
  .sass("src/scss/starter.scss", cssPath)
  .options({
    processCssUrls: false,
  })
  .eslint({
    fix: true,
    extensions: ["js"],
  })
  .browserSync({
    proxy: localURL, // set to your local instance url
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map",
    })
    .sourceMaps();
}

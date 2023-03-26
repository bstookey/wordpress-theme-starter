module.exports = {
  env: {
    browser: true,
    es2021: true,
    jquery: true,
  },
  extends: "eslint:recommended",
  overrides: [],
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
  },
  ignorePatterns: ["jquery.touchSwipe.js", "js.cookie.js"],
  rules: {
    "no-unused-vars": "off",
  },
  globals: {
    // Cookies variable from apps file is not recognized by eslint. So let's tell eslint to ignore it
    Cookies: "readonly",
    wt: false,
  },
};

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
  ignorePatterns: ["jquery.touchSwipe.js"],
  rules: {
    "no-unused-vars": "off",
  },
};

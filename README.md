# ip_dev <!-- omit in toc -->

A Wordpress Boilerplate theme from Inverse Paradox. <https://inverseparadox.com>

[![Inverse Paradox. From ideation to profitability.](https://www.inverseparadox.com/wp-content/uploads/2020/08/ip-icon.svg)](https://inverseparadox.com/contact/)

## Table of Contents <!-- omit in toc -->

- [Introduction](#introduction)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Quick Start](#quick-start)
  - [Advanced](#advanced)
- [Setup](#setup)
  - [Development](#development)
- [Documentation](#documentation)
  - [Theme Setup](#theme-setup)

## Introduction

This is a boilerplate theme domain `astrolab_master` based on the original IP Boilerplate theme, refactored, not redesigned, and upgraded to more modern technologies and simplified structure. This theme is currently under review and is meant to be evaluated and modified.

Support for multi-language is in progress as well as a review for meeting WCAG 2.1AA and Section 508 standards.

It features some of the web's most proven technologies like:, [npm](https://www.npmjs.com/), [webpack](https://webpack.js.org/), [LaravelMix](https://laravel-mix.com/docs/6.0/mixjs), and [Sass](http://sass-lang.com/). To help you write clean code (that meets [WordPress standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/)), we tap into [@wordpress/scripts](https://developer.wordpress.org/block-editor/packages/packages-scripts/) for linting CSS and JavaScript.

It also supports [Selective Refresh](https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/) and [Live Preview](https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29) in the Theme Customizer.

Not to mention, I use [Browsersync](https://www.browsersync.io/) so you can watch your project update in real-time while you work.

## Getting Started

### Prerequisites

This theme compiles and bundles assets via NPM scripts, basic knowledge of the command line and the following dependencies are required:

- [Node](https://nodejs.org) (v14+)
- [NPM](https://npmjs.com) (v7+)

Dependencies are installed from NPM via package.json.
Assets are compiled/processed via node.js using Webpack and Laravel Mix via webpack.mix.js and the linter config in the eslintrc.js.

## Setup

From the command line, change directories to your new theme directory:

```bash
cd /wp-content/themes/ip-nextgen
```

Install theme dependencies.

> Note: Node.js and NPM 7 installed first.

```bash
npm install
```

Dependencies are installed into the npm_modules directory and can then be copied accordingly via the webpack.mix.js file.

### Development

From the command line, type any of the following to perform an action: (Note: there is no need to use NVM)

| Command         | Action                                                       |
| :-------------- | :----------------------------------------------------------- |
| `npm run watch` | Builds assets and starts Live Reload and Browsersync servers |
| `npm run dev`   | Builds assets without minification                           |
| `npm run prod`  | Builds minified production-ready assets for a deployment     |

Generally it is good practice to run `npm run dev` first and once the required assets are copied from the node_modules folder, the .copy command can be commented in the webpack.mix.js file. Feel free to play around with this and get a feel for using this configuration.

Documentation can be found here.
[LaravelMix](https://laravel-mix.com/docs/6.0/mixjs)

## Documentation

Features/Plugins removed, or deactivated, from original boilerplate and moved or added to theme root > inc, or INC dir.

- Updated functions.php file for simpler management of dependency files. The theme INC dir will contain all theme core management files.
- IP Framework(plugin) - Custom Post Types and Taxonomies are managed in INC dir > post-types > cpt-models using a cpt-maker class.
- Hide Dashboard Notifications(plugin) - mangeged in INC dir > functions > disable-notices
- Fontawesome(plugin) - managed via src > scss > fontawesome using Fontawesome Pro 6.3.0 sass. The switch is 100% seemless.
- Temporarily does not generate the Languages Pot file.

Features added or updated.

- Updated customizer with new Announcement Banner, Header Customizations, Footer Customizations, Social Media, Default Images(currently only used in the custom cover block pattern), and Additional Scripts(I think these are a bad idea and should be removed)
- IP Block Patterns - sample registered block-patterns in INC dir ip-patterns.
- Custom Theme Options - Theme Options in the admin sidebar currently only being used for the org schema address. Can easily create new tabs and new fields in INC dir > theme-options.

### Theme setup

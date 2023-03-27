# fs_dev <!-- omit in toc -->

A Wordpress Starter theme from Inverse Paradox. <https://inverseparadox.com>

[![Inverse Paradox. From ideation to profitability.](https://www.inverseparadox.com/wp-content/uploads/2020/08/ip-icon.svg)](https://inverseparadox.com/contact/)

## Table of Contents <!-- omit in toc -->

- [Introduction](#introduction)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Quick Start](#quick-start)
  - [Advanced](#advanced)
- [Setup](#setup)
  - [Development](#development)
- [Contributing and Support](#contributing-and-support)

## Introduction

Hi. I'm a starter theme called `fs_dev`. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead, try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for!

I feature some of the web's most proven technologies like:, [npm](https://www.npmjs.com/), [webpack](https://webpack.js.org/), [Sass](http://sass-lang.com/), and [PostCSS](https://github.com/postcss/postcss). To help you write clean code (that meets [WordPress standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/)), we tap into [@wordpress/scripts](https://developer.wordpress.org/block-editor/packages/packages-scripts/) for linting CSS and JavaScript. Did I mention that I'm also accessible? Yup. I pass both WCAG 2.1AA and Section 508 standards out of the box.

I also support [Selective Refresh](https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/) and [Live Preview](https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29) in the Theme Customizer.

Not to mention, I use [Browsersync](https://www.browsersync.io/) so you can watch your project update in real-time while you work.

## Getting Started

### Prerequisites

Because I compile and bundle assets via NPM scripts, basic knowledge of the command line and the following dependencies are required:

- [Node](https://nodejs.org) (v14+)
- [NPM](https://npmjs.com) (v7+)
- [Composer](https://getcomposer.org/)

### Quick Start

If you want to keep it simple, head over to [https://wdunderscores.com](https://wdunderscores.com) and generate your `fs_dev` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme. Alternatively, you could download a pre-built [ZIP](http://wdunderscores.com/wp-content/themes/wdunderscores/inc/prototype/fs_dev.zip)

### Advanced

If you want to set me up manually:

1. [Download](http://wdunderscores.com/wp-content/themes/wdunderscores/inc/prototype/fs_dev.zip) and extract the zip into your `wp-content/themes` directory and rename `fs_dev` to fit your needs.

2. Find & Replace

You'll need to change all instances of the name: `fs_dev`.

- Search for: `@package fs_dev` and replace with: `@package project_name` to capture the package name
- Update `"WebDevStudios\fs_dev,fs_dev"` to: `"CompanyName\project_name,project_name"` (with double quotes) in phpcs.xml.dist
- Search for: `WebDevStudios\fs_dev` and replace with: `CompanyName\project_name` to capture the namespaces
- Update `"webdevstudios/fs_dev"` to `"companyname/project_name"` (with double quotes) in composer.json
- Search for: `, 'fs_dev'` and replace with: `, 'project_name'` (inside backticks) to capture the text domain
- Update `Text Domain: fs_dev` to: `Text Domain: project_name` in style.css
- Update `"fs_dev"` to: `"project_name"` (with double quotes) in phpcs.xml.dist and package.json
- Update `'fs_dev'` to: `'project_name'` (with single quotes) in inc/setup/setup.php
- Search for: `fs_dev_` and replace with: `project_name_` to capture all the function names
- Search for: `'fs_dev-` and replace with: `'project_name-` to capture prefixed handles
- Search for `fs_dev.pot` and replace with: `project_name.pot` to capture translation files
- Search for `wdunderscores.test` and replace with: `project_name.test` to match your local development URL
- Edit the theme information in the header of style.scss to meet your needs

## Setup

From the command line, change directories to your new theme directory:

```bash
cd /wp-content/themes/your-theme
```

Install theme dependencies and trigger an initial build.

> Note: You will need to have Composer and NPM 7 installed first.

```bash
npm i --legacy-peer-deps
```

### Development

From the command line, type any of the following to perform an action:

| Command          | Action                                                       |
| :--------------- | :----------------------------------------------------------- |
| `npm run watch`  | Builds assets and starts Live Reload and Browsersync servers |
| `npm run start`  | Builds assets and starts Live Reload server                  |
| `npm run build`  | Builds production-ready assets for a deployment              |
| `npm run lint`   | Check all CSS, JS, MD, and PHP files for errors              |
| `npm run format` | Fix all CSS, JS, MD, and PHP formatting errors automatically |

## Contributing and Support

Your contributions and [support tickets](https://github.com/WebDevStudios/fs_dev/issues) are welcome. Please see our [contributing guidelines](https://github.com/WebDevStudios/fs_dev/blob/main/CONTRIBUTING.md) before submitting a pull request.

fs_dev is free software, and is released under the terms of the GNU General Public License version 2 or any later version. See [LICENSE.md](https://github.com/WebDevStudios/fs_dev/blob/main/LICENSE.md) for complete license.

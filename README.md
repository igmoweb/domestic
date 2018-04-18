# Domestic WordPress Theme

This project is  based on [FoundationPress](https://github.com/olefredrik/FoundationPress)

## Development

### Requirements

[Node.js](http://nodejs.org). It's recommended to install [NVM](https://github.com/creationix/nvm) to switch between different Node versions:

`curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.9/install.sh | bash`
`nvm install 8.9.4 && nvm use 8.9.4`

### Quickstart

#### 1. Clone the repository into your themes folder

```bash
cd my-wordpress-folder/wp-content/themes
git clone https://github.com/igmoweb/domestic.git
```

#### 2. Run npm install

```bash
cd domestic
npm install
```

#### 3. Watch for changes and start Browsersync

[Browsersync](https://www.browsersync.io/): Automatically browser refresh when a file is saved.

- Change your development URL (that's your local WordPress install URL) in `config.yml` in the `url` property under the `BROWSERSYNC` object
- Start watching changes with `npm start`


### Compile assets for production

When building for production, the CSS and JS will be minified. To minify the assets in your `/dist` folder, run

```bash
npm run build
```

### To create a .zip file of your theme, run:

```bash
npm run package
```

Running this command will build and minify the theme's assets and place a .zip archive of the theme in the `packaged` directory. This excludes the developer files/directories from your theme like `/node_modules`, `/src`, etc. to keep the theme lightweight for transferring the theme to a staging or production server.

### Styles and Sass Compilation

 * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

 * `src/assets/scss/app.scss`: Make imports for all your styles here
 * `src/assets/scss/global/*.scss`: Global settings
 * `src/assets/scss/components/*.scss`: Buttons etc.
 * `src/assets/scss/modules/*.scss`: Topbar, footer etc.
 * `src/assets/scss/templates/*.scss`: Page template styling
 
 * `src/assets/scss/gutenberg.scss`: Gutenberg styling

 * `dist/assets/css/app.css`: This file is loaded in the `<head>` section of your document, and contains the compiled styles for your project.
 * `dist/assets/css/gutenberg.css`: Compiled Gutenberg styles.

### JavaScript Compilation

All JavaScript files, including Foundation's modules, are imported through the `src/assets/js/app.js` file. The files are imported using module dependency with [webpack](https://webpack.js.org/) as the module bundler.

If you're unfamiliar with modules and module bundling, check out [this resource for node style require/exports](http://openmymind.net/2012/2/3/Node-Require-and-Exports/) and [this resource to understand ES6 modules](http://exploringjs.com/es6/ch_modules.html).

Foundation modules are loaded in the `src/assets/js/app.js` file. By default all components are loaded. You can also pick and choose which modules to include. Just follow the instructions in the file.

## Demo

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)
* [WordPress Codex](http://codex.wordpress.org/)
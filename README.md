# Domestic WordPress Theme

## Development

### Requirements

[Node.js](http://nodejs.org). 

It's recommended to install [NVM](https://github.com/creationix/nvm) to switch between different Node versions:

[Docker Desktop](https://www.docker.com/products/docker-desktop)

### Quickstart

#### 1. Clone the repository into your themes folder

```bash
cd my-wordpress-folder/wp-content/themes
git clone https://github.com/igmoweb/domestic.git
```

#### 2. Run npm install

Make sure that Docker Desktop is running

```bash
cd domestic
npm install
```

#### 3. Watch for changes

[webpack](https://webpack.js.org/) will watch changes in PHP, JS and CSS files for you and it will reload the browser automatically.

- Start watching changes with `npm start` and open your local development WordPress site with Domestic theme activated.

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
 * `src/assets/scss/style.scss`: The main styles file for the Theme.
 * `src/assets/scss/editor-styles.scss`: Gutenberg editor styles
 * `src/assets/scss/owl.carousel.scss`: Owl carousel styles.
  
 * `src/assets/js/app.js`: The main Theme JS file. Loads Foundation scripts and initializes Owl Carousel.
 * `src/assets/js/customize.js`: JS loaded in WP Customizer.
 
### JavaScript Compilation

All JavaScript files, including Foundation's modules, are imported through the `src/assets/js/app.js` file. The files are imported using module dependency with [webpack](https://webpack.js.org/) as the module bundler.

If you're unfamiliar with modules and module bundling, check out [this resource for node style require/exports](http://openmymind.net/2012/2/3/Node-Require-and-Exports/) and [this resource to understand ES6 modules](http://exploringjs.com/es6/ch_modules.html).

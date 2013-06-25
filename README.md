# wordpress-haml-sass
## Easy WordPress theme development in HAML, PHP, & SASS with closure compiled JavaScript

The purpose of this project is to string together a ton of great tools to make creating a WordPress theme a little more 2013 and a little less 2004, without any fancy plugins. Just a simple, compiled WordPress theme from HAML, PHP, SASS, and JavaScript.

Views like index.php, single.php, header.php, footer.php, etc are all created using the HAML files located in the app/views directory.

Styles are compiled from SASS files found in the `app/assets/stylesheets` directory.

JavaScript inside of the `app/assets/scripts_to_compile` directory will be compiled into one manifest file, with jQuery placed before anything else. Scripts inside of `app/assets/scripts_uncompiled` will just be copied to the `/scripts` folder in the theme.

All other assets are copied from their respective assets folder to the appropriate theme directory. 

After compilation, the theme is stored in the `/theme` directory. You can change this directory by editing the `make` file. See the "Usage" section for a better way - symbolic linking the /theme directory to your local server `wp-content/themes` folder.


## Dependencies, Installation, Usage


### Dependencies

We are using the amazing [Multi-Target HAML](https://github.com/arnaud-lb/MtHaml) compiler to render PHP along with some custom regexes to strip out anything that would normally be compiled at runtime.

You'll also need [SASS](http://www.hongkiat.com/blog/getting-started-saas/) installed. [Bourbon](https://github.com/thoughtbot/bourbon) is included by default as well.

[PHP](http://php.net/manual/en/install.macosx.php) and [Java](http://www.java.com/en/download/help/mac_install.xml) are also required to render your PHP and JavaScript with [Closure Compiler](https://developers.google.com/closure/compiler/).

### Installation

Run `./install` to install fswatcher, which the package uses to watch the /app directory for changes and recompile the theme. You may need to run `chmod +x install` to give it the correct permissions before you run it.

### Usage

Start the watcher by typing `./watch`. You may need to run `chmod +x watch` to give it the correct permissions before you run it. Edit HAML, SASS, and PHP files and save them to recompile the theme.

You may want to symbolic link the /theme directory to wherever your serving your blog from locally. For instance, if you're using MAMP:

`sudo ln -s ~/dev/wordpress-haml-sass/theme/ /Applications/MAMP/htdocs/wp-content/themes/theme`


## Contributions, Authors, Props

### Contributions

Are happily accepted if they're in the general spirit of the project. Just send a pull request. Also file an issue if you notice any weirdness!

### Authors

Zach Feldman [@zachfeldman](https://twitter.com/zachfeldman)

Ian Jennings (Watcher Implementation) [@sw1tch](https://twitter.com/sw1tch)

### Props

Props to [@contently](http://contently.com) for letting us build awesome stuff like this while developing the digital version of our print magazine, [The Content Strategist](http://contently.com/strategist/)!

[![githalytics.com alpha](https://cruel-carlota.pagodabox.com/fd135d42e687d99d4edfc47a5261e934 "githalytics.com")](http://githalytics.com/zachfeldman/wordpress-haml-sass)
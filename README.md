# Sitesauce CraftCMS Integration

This plugin allows you to integrate your CraftCMS site with Sitesauce by pinging the Sitesauce build hook every time your content is updated. To use this plugin, you’ll first need a [Sitesauce account](https://sitesauce.app).

## Requirements

This plugin requires Craft CMS 3.1.19 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Sitesauce”. Then click on the “Install” button in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require sitesauce/craftcms

# tell Craft to install the plugin
./craft install/plugin sitesauce
```

## Setting your Build Hook

To set your Sitesauce build hook, you must go to Settings → Sitesauce in your project’s Control Panel.
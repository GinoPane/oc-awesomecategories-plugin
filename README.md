# Awesome Categories

A simple extension for [RainLab Blog](https://octobercms.com/plugin/rainlab-blog) plugin.

[![GitHub tag](https://img.shields.io/github/tag/ginopane/oc-awesomecategories-plugin.svg)](https://github.com/GinoPane/oc-awesomecategories-plugin)
[![Maintainability](https://api.codeclimate.com/v1/badges/9b3a5f1646b75c43976e/maintainability)](https://codeclimate.com/github/GinoPane/oc-awesomecategories-plugin/maintainability)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GinoPane/oc-awesomecategories-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GinoPane/oc-awesomecategories-plugin/?branch=master)

[_Awesome Categories_](https://octobercms.com/plugin/ginopane-awesomecategories) adds some awesomeness to your blog categories.

## Description

Awesome Categories plugin adds a few new fields to the Category model, so you could customize a look and feel for your categories even more when showing them on the frontend. New fields are:
* `awesome_icon` (e.g. ```{{ category.awesome_icon }}```, ```{{ category.awesomeIcon }}```) - powered by [Awesome Icons List](https://octobercms.com/plugin/ginopane-awesomeiconslist), adds ability to select an icon for a category;
* `awesome_color` (e.g. ```{{ category.awesome_color }}```, ```{{ category.awesomeColor }}```) - a color-picker field which simply adds ability to attach a color to a category, the color is stored as hex color;
* `awesome_class` (e.g. ```{{ category.awesome_class }}```, ```{{ category.awesomeClass }}```) - if it is not enough, a dedicated field for custom CSS style is ready for you.

> No components or widgets are provided by this plugin

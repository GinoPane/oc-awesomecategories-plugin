<?php

namespace GinoPane\AwesomeCategories;

use System\Classes\PluginBase;
use RainLab\Blog\Models\Category as CategoryModel;
use RainLab\Blog\Controllers\Categories as CategoriesController;

/**
 * Class Plugin
 *
 * @package GinoPane\AwesomeCategories
 */
class Plugin extends PluginBase
{
    const DEFAULT_ICON = 'icon-magic';

    const LOCALIZATION_KEY = 'ginopane.awesomecategories::lang.';

    public $require = [
        'RainLab.Blog',
        'GinoPane.AwesomeIconsList'
    ];

    /**
     * Returns information about this plugin
     *
     * @return  array
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => self::LOCALIZATION_KEY . 'plugin.name',
            'description' => self::LOCALIZATION_KEY . 'plugin.description',
            'author'      => 'Siarhei <Gino Pane> Karavai',
            'icon'        => self::DEFAULT_ICON,
            'homepage'    => 'https://github.com/ginopane/oc-awesomecategories-plugin'
        ];
    }

    /**
     * Boot method, called right before the request route
     */
    public function boot()
    {
        $this->extendCategories();
    }

    /**
     * Extend RainLab Category model
     */
    private function extendCategories()
    {
        CategoriesController::extendFormFields(function ($form, $model) {
            if (!$model instanceof CategoryModel) {
                return;
            }

            $form->addFields([
                'awesome_section' => [
                    'label'         => self::LOCALIZATION_KEY . 'form.awesome_section.label',
                    'type'          => 'section',
                    'comment'       => self::LOCALIZATION_KEY . 'form.awesome_section.comment'
                ]
            ]);

            $form->addFields([
                'awesome_icon' => [
                    'label'         => self::LOCALIZATION_KEY . 'form.awesome_icon.label',
                    'type'          => 'awesomeiconslist',
                    'unicodeValue'  => false,
                    'emptyOption'   => true,
                    'placeholder'   => self::LOCALIZATION_KEY . 'form.awesome_icon.placeholder',
                    'span'          => 'left'
                ]
            ]);

            $form->addFields([
                'awesome_class' => [
                    'label'         => self::LOCALIZATION_KEY . 'form.awesome_class.label',
                    'type'          => 'text',
                    'span'          => 'right'
                ]
            ]);

            $form->addFields([
                'awesome_color' => [
                    'label'         => self::LOCALIZATION_KEY . 'form.awesome_color.label',
                    'type'          => 'colorpicker',
                    'allowEmpty'    => true,
                    'span'          => 'full'
                ]
            ]);
        });
    }
}

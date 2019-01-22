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

    const DB_PREFIX = 'ginopane_awesomecategories_';

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
     * Extend RainLab Categories
     */
    private function extendCategories()
    {
        $this->extendController();
        $this->extendModel();
    }

    /**
     * Extend Categories controller
     */
    private function extendController()
    {
        CategoriesController::extendFormFields(function ($form, $model) {
            if (!$model instanceof CategoryModel) {
                return;
            }

            $this->addSection($form);
            $this->addIcon($form);
            $this->addCssClass($form);
            $this->addColor($form);
        });
    }

    /**
     * Extend Category model
     */
    private function extendModel()
    {
        CategoryModel::extend(function ($model) {
            $model->addDynamicMethod('getAwesomeIconAttribute', function() use ($model) {
                return $model->{self::DB_PREFIX . 'awesome_icon'};
            });

            $model->addDynamicMethod('getAwesomeColorAttribute', function() use ($model) {
                return $model->{self::DB_PREFIX . 'awesome_color'};
            });

            $model->addDynamicMethod('getAwesomeClassAttribute', function() use ($model) {
                return $model->{self::DB_PREFIX . 'awesome_class'};
            });
        });
    }

    /**
     * @param $form
     */
    private function addSection($form)
    {
        $form->addFields([
            'awesome_section' => [
                'label' => self::LOCALIZATION_KEY . 'form.awesome_section.label',
                'type' => 'section',
                'comment' => self::LOCALIZATION_KEY . 'form.awesome_section.comment'
            ]
        ]);
    }

    /**
     * @param $form
     */
    private function addIcon($form)
    {
        $form->addFields([
            self::DB_PREFIX . 'awesome_icon' => [
                'label' => self::LOCALIZATION_KEY . 'form.awesome_icon.label',
                'type' => 'awesomeiconslist',
                'unicodeValue' => false,
                'emptyOption' => true,
                'placeholder' => self::LOCALIZATION_KEY . 'form.awesome_icon.placeholder',
                'span' => 'left'
            ]
        ]);
    }

    /**
     * @param $form
     */
    private function addColor($form)
    {
        $form->addFields([
            self::DB_PREFIX . 'awesome_color' => [
                'label' => self::LOCALIZATION_KEY . 'form.awesome_color.label',
                'type' => 'colorpicker',
                'allowEmpty' => true,
                'span' => 'full'
            ]
        ]);
    }

    /**
     * @param $form
     */
    private function addCssClass($form)
    {
        $form->addFields([
            self::DB_PREFIX . 'awesome_class' => [
                'label' => self::LOCALIZATION_KEY . 'form.awesome_class.label',
                'type' => 'text',
                'span' => 'right'
            ]
        ]);
    }
}

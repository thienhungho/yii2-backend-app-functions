<?php

if (!function_exists('grid_language_column')) {
    /**
     * @param string $attribute
     * @param array $data
     *
     * @return array
     */
    function grid_language_column($attribute = 'language', $data = [])
    {
        return
            [
                'format' => 'raw',
                'attribute' => $attribute,
                'value' => function ($model, $key, $index, $column) {
                    return \powerkernel\flagiconcss\Flag::widget([
                        'tag' => 'span',
                        'country' => get_country_code_from_language_code($model->language),
                        'squared' => false,
                        'options' => [],
                    ]);
                },
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\lajax\translatemanager\models\Language::find()
                    ->asArray()
                    ->all(), 'language_id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => [
                    'placeholder' => t('app', 'Language'),
                    'id' => 'grid-search-language',
                ],
                'vAlign' => \thienhungho\Widgets\models\GridView::ALIGN_MIDDLE,
            ];
    }
}

if (!function_exists('grid_hidden_column')) {
    /**
     * @param $attribute
     * @param array $data
     *
     * @return array
     */
    function grid_hidden_column($attribute, $data = [])
    {
        return [
            'attribute' => $attribute,
            'visible' => false,
        ];
    }
}


if (!function_exists('grid_checkbox_column')) {
    /**
     * @param array $data
     *
     * @return array
     */
    function grid_checkbox_column($data = [])
    {
        return ['class' => 'kartik\grid\CheckboxColumn'];
    }
}

if (!function_exists('grid_serial_column')) {
    /**
     * @param array $data
     *
     * @return array
     */
    function grid_serial_column($data = [])
    {
        return ['class' => 'yii\grid\SerialColumn'];
    }
}

if (!function_exists('grid_view_default_active_column_cofig')) {
    /**
     * @return array
     */
    function grid_view_default_active_column_cofig()
    {
        return [
            'class' => '\kartik\grid\ActionColumn',
            'width' => '200px',
            'template' => '{view} {save-as-new} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return \yii\helpers\Html::a('<span class="btn btn-xs purple"><span class="glyphicon glyphicon-copy"></span></span>', $url, ['title' => t('app', 'Save As New')]);
                },
            ],
            'deleteOptions' => ['label' => '<span class="btn btn-xs red" style="margin-bottom: 1px; margin-top: 1px"><span class="fa fa-times"></span></span>'],
            'updateOptions' => ['label' => '<span class="btn btn-xs blue" style="margin-bottom: 1px; margin-top: 1px"><span class="fa fa-edit"></span></span>'],
            'viewOptions' => ['label' => '<span class="btn btn-xs yellow" style="margin-bottom: 1px; margin-top: 1px"><span class="glyphicon glyphicon-eye-open"></span></span>'],
            'headerOptions' => ['style' => 'min-width:200px;'],
        ];
    }
}

if (!function_exists('grid_view_toolbar_config')) {
    /**
     * @param $dataProvider
     * @param $gridColumn
     *
     * @return array
     * @throws Exception
     */
    function grid_view_toolbar_config($dataProvider, $gridColumn)
    {
        return [
            [
                'content' => \yii\helpers\Html::a('<i class="glyphicon glyphicon-repeat"></i>', get_current_url(), [
                    'data-pjax' => 0,
                    'class' => 'btn btn-default',
                    'title' => Yii::t('app', 'Reset'),
                ]),
            ],
            '{toggleData}',
            '{export}',
            \kartik\export\ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => \kartik\export\ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => t('app', 'Full'),
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">' . t('app', 'Export All Data') . '</li>',
                    ],
                ],
            ]),
        ];
    }
}
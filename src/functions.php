<?php

require_once 'functions/grid-column.php';
require_once 'functions/form-field.php';

if (!function_exists('backend_per_page_form')) {
    /**
     * @throws Exception
     */
    function backend_per_page_form()
    { ?>
        <?= \yii\helpers\Html::beginForm('#', 'get', ['id' => 'per-page']) ?>
        <p>
            <?= \kartik\widgets\Select2::widget([
                'name' => 'per-page',
                'value' => request()->get('per-page', 20),
                'data' => [
                    5 => 5 . ' ' . t('app', 'Items Per Page'),
                    15 => 15 . ' ' . t('app', 'Items Per Page'),
                    25 => 25 . ' ' . t('app', 'Items Per Page'),
                    100 => 100 . ' ' . t('app', 'Items Per Page'),
                    200 => 200 . ' ' . t('app', 'Items Per Page'),
                    0 => t('app', 'All'),
                ],
                'theme' => \kartik\widgets\Select2::THEME_BOOTSTRAP,
                'options' => [
                    'multiple' => false,
                    'placeholder' => t('app', 'Per Page ...'),
                    'onchange' => 'this.form.submit()',
                ],
            ]); ?>
        </p>
        <?= \yii\helpers\Html::endForm() ?>
    <?php }
}

if (!function_exists('metronic_language_switch')) {
    function metronic_language_switch()
    { ?>
        <li class="dropdown dropdown-language">
            <a href="/vi-VN" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
               data-close-others="true">
                <img alt=""
                     src="https://cdn2.thecatdev.com/mtn/global/img/flags/<?= get_country_code_from_language_code(get_current_client_language()) ?>.png">
                <span class="langname"> </span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?= \yii\helpers\Url::base(true) . '/en-GB' ?>">
                        <img alt="" src="https://cdn2.thecatdev.com/mtn/global/img/flags/gb.png"> England </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::base(true) . '/en-US' ?>">
                        <img alt="" src="https://cdn2.thecatdev.com/mtn/global/img/flags/us.png"> United States of
                        America </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::base(true) . '/vi-VN' ?>">
                        <img alt="" src="https://cdn2.thecatdev.com/mtn/global/img/flags/vn.png"> Vietnam </a>
                </li>
            </ul>
        </li>
    <?php }
}
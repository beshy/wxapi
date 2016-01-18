<?php

// 
$container['view'] = function ($c) {
    $settings = $c['config']->get('view');
    $smarty = new \Smarty();
    $smarty->setTemplateDir($settings['template_dir']);
    $smarty->setCompileDir($settings['compile_dir']);
    $smarty->setCacheDir($settings['cache_dir']);

    $smarty->left_delimiter = '{%';
    $smarty->right_delimiter = '%}';

    return $smarty;
};
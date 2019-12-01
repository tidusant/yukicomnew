<?php

namespace Monoplane\Controller;

class Chips extends \LimeExtra\Controller {
public function t($data,$exit=1) {
    echo '<pre style="text-align:left;">';
    print_r($data);
    echo '</pre>';
    if($exit)exit;
}
    public function before() {

        $this->mp = array_replace_recursive([
            'id' => 'slug',
            '_id' => '',
            'pages' => 'chips',
            'site' => [],
        ],$this->retrieve('monoplane', []));

        $this->mp['nav'] = $this->nav();

        $this->trigger('monoplane.pages.before', [&$this->mp]);

    }

    // follow the naming convention of Cockpit and name it 'index'
    public function index($slug = '') {

        $options = [
            'filter' => [
                $this->mp['id'] => $slug,
                'published' => true,
            ],
        ];

        if (empty($slug)) { // start page
            return false;
        }
         // $page = $this->app->module('collections')->findOne($this->mp['pages'],$options['filter']);//One($this->mp['pages'], $options['filter'], null, false, ['lang' => $this('i18n')->locale]);
         // $this->t($page);
        $page = $this->app->module('collections')->findOne($this->mp['pages'], $options['filter'], null, false, ['lang' => $this('i18n')->locale]);
        

        return $this->render('views:chips.php', ['mp' => $this->mp, 'page' => $page]);

    }

    public function error($status = '') {

        // To do: 401, 500

        switch ($status) {
            case '404':
                return $this->render('views:errors/404.php', ['mp' => $this->mp]);
                break;
        }

    }

    

    protected function nav($collection = null, $options = null) {

        if (!$collection || !is_string($collection))
            $collection = 'pages';

        if (!$options) {

            $options = [
                'filter' => [
                    'published' => true,
                ],
                'fields' => [
                    $this->mp['id'] => true,
                    'title' => true,
                    'navigation' => true,
                ],
            ];

            // language filter doesn't work with fields projection
            // quick fix to make it work
            $lang = $this('i18n')->locale !== 'en' ? '_' . $this('i18n')->locale : '';
            if (!empty($lang)) {
                $options['lang'] = $this('i18n')->locale;
                $options['fields']['title'.$lang] = true;
            }

        }

        return $this->app->module('collections')->find($collection, $options);

    }

}

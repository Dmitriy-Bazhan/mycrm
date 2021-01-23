<?php

use Illuminate\Contracts\Routing\UrlGenerator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('captcha_url1')) {
    /**
     * Generate url of the captcha image source.
     *
     * @param string $type
     *
     * @return string
     */
    function captcha_url1($type = 'default')
    {
        return asset('/captcha/' . $type) . '/' . Zablose\Captcha\Random::string(12);
    }
}

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, $enc = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
            mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }
}

if (!function_exists('parse_string_of_parameters')) {
    function parse_string_of_parameters($string)
    {
        try {
            $parameters = null;
            if (isset($string)) {
                $explodeBySemicolon = explode(';', $string);
                foreach ($explodeBySemicolon as $value) {
                    $explodeByEqually = explode('=', $value);
                    $parameters[$explodeByEqually[0]] = explode(',', $explodeByEqually[1]);
                }
            }
            return $parameters;
        } catch (\Exception $e) {
            return abort(404);
        }
    }
}

if (!function_exists('generate_filter_string')) {
    function generate_filter_string($parameters)
    {
        try {
            $string = null;
            unset($parameters['_token']);
            unset($parameters['alias']);
            unset($parameters['category_id']);
            unset($parameters['parent_category_alias']);

//            if ($parameters['min_price'] == $parameters['price'][0] && $parameters['max_price'] == $parameters['price'][1]) {
//                unset($parameters['price']);
//            }
            unset($parameters['min_price']);
            unset($parameters['max_price']);
            foreach ($parameters as $k => $parameter) {
                $string .= $k . '=' . implode(',', $parameter) . ';';
            }
            return rtrim($string, ';');
        } catch (\Exception $e) {
            return abort(404);
        }
    }
}

if (!function_exists('cartesian')) {
    function cartesian($set)
    {
        if (!$set) return array(array());
        $subset = array_shift($set);
        $cartesianSubset = cartesian($set);
        $result = array();
        foreach ($subset as $value) {
            foreach ($cartesianSubset as $p) {
                array_unshift($p, $value);
                $result[] = $p;
            }
        }
        return $result;
    }
}

if (!function_exists('get_links_to_sort')) {
    function get_links_to_sort($parameters, $pageNumber)
    {
        $segment1 = request()->segment(1);
        $parametersData = [];
        if (isset($parameters['filters'])) array_push($parametersData, 'filters=' . implode(',', $parameters['filters']));
        if (isset($parameters['price'])) array_push($parametersData, 'price=' . implode(',', $parameters['price']));
        $page = $pageNumber > 1 ? '/page=' . $pageNumber : '';
        $parametersString = implode(';', $parametersData);
        $parametersString = $parametersString ? $parametersString . ';' : '';

        $links = [
            'price' => $segment1 . '/' . $parametersString . 'sort=price' . $page,
            '-price' => $segment1 . '/' . $parametersString . 'sort=-price' . $page,
            'name' => $segment1 . '/' . $parametersString . 'sort=name' . $page,
            '-name' => $segment1 . '/' . $parametersString . 'sort=-name' . $page
        ];
        return $links;
    }
}

if (!function_exists('url_with_locale')) {
    function url_with_locale($thisPath = null)
    {
        $locale = app()->getLocale() != 'ua' ? app()->getLocale() : '';
        return app(UrlGenerator::class)->to($locale . $thisPath);
    }

}
if (!function_exists('htmlBlock')) {
    function htmlBlock($blockId = null, $language = null, $showDisabledBlocks = false)
    {
        $block = '';
        $enabled = $showDisabledBlocks ? [0, 1] : [1];
        $content = \App\BlockHtml::Where('id', $blockId)->WhereIn('enabled', $enabled)->withData()->first();
        $languages = ['ua', 'ru'];
        if ($content) {
            if ($language == null) {
                $key = array_search(app()->getLocale(), $languages);
                $block = $content->data[$key]->content;
            } else {
                $block = $content->data[array_search($language, $languages)]->content;
            }
        }
        return $block;
    }
}

if (!function_exists('take_path')) {
    function take_path()
    {
        $locale = substr($_SERVER['REQUEST_URI'], 0, 3);

        if ($locale == '/ru') {
            $path = substr($_SERVER['REQUEST_URI'], 3, strlen($_SERVER['REQUEST_URI']) - 3);
            $locale = '';
        } else {
            $path = $_SERVER['REQUEST_URI'];
            $locale = 'ru';
        }
        return app(UrlGenerator::class)->to($locale . $path);
    }
}

if (!function_exists('get_prefix')) {
    function get_prefix()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $locale = substr($_SERVER['REQUEST_URI'], 0, 3);

            if ($locale == '/ru') {
                app()->setLocale('ru');
                $prefix = $locale;
            } else {
                app()->setLocale('ua');
                $prefix = '';
            }
            return $prefix;
        }
        return;
    }
}

if (!function_exists('lang_number')) {
    function lang_number()
    {
        if (app()->getLocale() == 'ua') {
            $number = 1;
        } elseif (app()->getLocale() == 'ru') {
            $number = 2;
        } else {
            $number = 0;
        }
        return $number;
    }
}

if (!function_exists('isSiteAvailible')) {
    function isSiteAvailible($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
        $curlInit = curl_init($url);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 1);
//        curl_setopt($curlInit, CURLOPT_HEADER, true);
//        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curlInit);
        curl_close($curlInit);
        return $response ? true : false;
    }
}

if (!function_exists('clearVar')) {
    function clearVar($value)
    {
        $value = str_replace('/', '', $value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        $value = htmlentities($value);
        $value = trim($value);
        return $value;
    }
}



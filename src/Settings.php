<?php

namespace craft\sitesauce;

use craft\base\Model;

class Settings extends Model
{
    public $build_hook;

    public function rules()
    {
        return [
            ['build_hook', 'required'],
            ['build_hook', 'url'],
            ['build_hook', function ($attribute, $params, $validator) {
                if (! strpos(parse_url($this->$attribute, PHP_URL_HOST), 'sitesauce') !== false) {
                    $this->addError($attribute, 'Please enter a valid build hook.');
                }
            }],
            // ...
        ];
    }
}

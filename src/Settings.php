<?php

namespace craft\sitesauce;

use craft\base\Model;

class Settings extends Model
{
    public function rules()
    {
        return [
            ['build_hook', 'required', 'string', 'url'],
            // ...
        ];
    }
}

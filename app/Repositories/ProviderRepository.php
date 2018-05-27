<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 12:34 PM
 */

namespace App\Repositories;

use App\Contracts\IProviderRepository;
use App\Models\Provider;

class ProviderRepository implements IProviderRepository
{
    public function getProviderDropDown()
    {
        $p = Provider::pluck('name', 'id')->toArray();

        return ['' => '-SELECT-'] + $p;
    }
}

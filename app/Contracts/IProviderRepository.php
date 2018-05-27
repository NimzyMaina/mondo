<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 5/27/2018
 * Time: 11:38 AM
 */

namespace App\Contracts;

use App\Models\Provider;

interface IProviderRepository
{

    public function getProviderDropDown();
}

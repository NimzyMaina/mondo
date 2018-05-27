<?php
/**
 * Created by PhpStorm.
 * User: Maina
 * Date: 8/22/2017
 * Time: 1:44 PM
 */

function standard($phone)
{
    return preg_replace('/^07/', '2547', $phone);
}

function local($phone)
{
    return preg_replace('/^254/', '0', $phone);
}

function seg($id)
{
    $val = request()->segment($id);

    if (is_numeric($val)) {
        return request()->segment((int) $id + 1)?:false;
    }
    return request()->segment($id)?:false;
}

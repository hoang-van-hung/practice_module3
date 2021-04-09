<?php



namespace App\Http\Service;


class BaseService
{
    function updateLoadFile($request, $key, $nameFolder)
    {
        return $request->file($key)->store($nameFolder, 'public');
    }

}


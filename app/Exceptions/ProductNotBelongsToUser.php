<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => 'Product not Belongs To user',
        ]);
    }
}

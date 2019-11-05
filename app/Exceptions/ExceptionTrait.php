<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait{



    public function apiException($request, $exception)
    {
        if ($exception instanceof ModelNotFoundException){
           return $this->ModelApiErrorException();
        }

        if ($exception instanceof  NotFoundHttpException){
           return $this->HttpApiErrorException();
        }

        return parent::render($request, $exception);

    }


    protected function ModelApiErrorException()
    {
        return  response()->json([
            'error' => 'model not found'
        ]);
    }

    protected function HttpApiErrorException()
    {
        return  response()->json([
            'error' => 'Incurret url'
        ]);
    }





}

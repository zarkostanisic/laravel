<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait{
	public function apiException($request, $exception){
	 if($this->isModel($exception)){
            return $this->modelResponse($exception);
        }

        if($this->isHttp($exception)){
            return $this->httpResponse($exception);
        }

        return parent::render($request, $exception);
	}

    protected function isModel($exception){
        return $exception instanceof ModelNotFoundException;
    }

    protected function isHttp($exception){
        return $exception instanceof NotFoundHttpException;
    }

    protected function modelResponse(){
        return response()->json([
            'errors' => 'Product Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    public function httpResponse($exception){
        return response()->json([
            'errors' => 'Incorect route'
        ], Response::HTTP_NOT_FOUND);
    }
}
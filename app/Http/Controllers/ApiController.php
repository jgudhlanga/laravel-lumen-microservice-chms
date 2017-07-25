<?php

namespace App\Http\Controllers;

/**
 * Description of ApiController
 *
 * @author james
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ApiController extends Controller {
    
    protected $statusCode = IlluminateResponse::HTTP_OK;
    
    private function manager()
    {
        $manager =  new Manager();
        $manager->setSerializer(new ArraySerializer());
        return $manager;
    }
    
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
    
    
    public function collection($data, $transformer)
    {
        
        $collection = new Collection($data, $transformer);
        $output = $this->manager()->createData($collection)->toArray();
        return response()->json($output);
    }
    
    public function item($data, $transformer)
    {
        $item = new Item($data, $transformer);
    }
    
}

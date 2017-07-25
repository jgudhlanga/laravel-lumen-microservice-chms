<?php


namespace App\Transformers;

/**
 * Description of TodoTransformer
 *
 * @author james
 */

use League\Fractal\TransformerAbstract;
use App\Models\Todo;

class TodoTransformer extends TransformerAbstract {
    
    public function transform(Todo $todo)
    {
        return [
            'id' => $todo->id,
            'todo' => $todo->todo,
            'category' => $todo->category,
            'desscription' => $todo->description,
            'createdAt' => $todo->created_at->toDateTimeString(),
            'updatedAt' => $todo->updated_at->toDateTimeString()
        ];
    }
    
}

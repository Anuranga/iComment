<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class PassengerConfigListTransformer extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'passengers_id' => $data->passengers_id,
            'passenger_name' => $data->name,
            'Reason' => $data->block_reason,
            'user_status' => $data->user_status,
            'created_time' => $data->created_time,
            'created_user_id' => $data->created_by,
            'created_by' => $data->email,
        ];
    }

}
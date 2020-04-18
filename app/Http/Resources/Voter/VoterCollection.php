<?php

namespace App\Http\Resources\Voter;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VoterCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'nid' => $this->nid,
            'relative_name' => $this->relative_name,
            'relative_nid' => $this->relative_nid,
            'phone' => $this->phone,
            'address' => $this->address,
            'href' => [
                'link' => route('voters.show', $this->id)
            ]
        ];
    }
}

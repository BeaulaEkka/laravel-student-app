<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'group' => GroupsResource::make($this->whenLoaded('group')),
            'section' => SectionResource::make($this->whenLoaded('section')),
            'email' => $this->email,
            'created_at' => $this->created_at->toFormattedDateString(),
        ];
    }
}

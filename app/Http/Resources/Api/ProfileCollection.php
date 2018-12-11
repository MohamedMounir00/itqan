<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->client->type =='personal'){
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'country'=>new CountryCollection($this->country),
                'city'=>new CityCollection($this->city),
                'house'=>$this->client->house,
                'image'=>url($this->image),
            ];
        }
        elseif ($this->client->type =='company'){
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'name_heade_personal'=>$this->client->name_of_head,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'country'=>new CountryCollection($this->country),
                'city'=>new CityCollection($this->city),
                'image'=>url($this->image),
                'company'=>new CompanyCollection($this->client->company),

            ];
        }
        elseif ($this->client->type =='government'){
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'name_heade_personal'=>$this->client->name_of_head,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'country'=>new CountryCollection($this->country),
                'city'=>new CityCollection($this->city),
                'image'=>url($this->image),
                'minstry'=>new CompanyCollection($this->client->minstry),

            ];
        }

        elseif ($this->technical->type =='technical'){
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'country'=>new CountryCollection($this->country),
                'city'=>new CityCollection($this->city),
                'image'=>url($this->image),
                'bio'=>$this->bio

            ];
        }

    }
}

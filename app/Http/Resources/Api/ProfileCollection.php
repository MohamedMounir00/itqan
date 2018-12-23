<?php

namespace App\Http\Resources\Api;

use App\Rating;
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
        if (isset($this->technical->type))
        {
            $rating= Rating::where('technical_id',$this->id)->get();
            $rating_time=floatval($rating->avg('rating_time'));
            $rating_clean_workspace=floatval($rating->avg('rating_clean_workspace'));
            $rating_skill_repairs=floatval($rating->avg('rating_skill_repairs'));
            $rating_explain_problems=floatval($rating->avg('rating_explain_problem'));
            $rating_stars=collect([$rating_time,$rating_clean_workspace,$rating_skill_repairs,$rating_explain_problems])->avg();

            //$comment=$rating->comment;
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'country'=>new CountryCollection($this->country),
                'city'=>new CityCollection($this->city),
                'image'=>url($this->image),
                'bio'=>$this->bio,
                'rating_stars'=>isset($rating)?$rating_stars:0,
                'rating_time'=>isset($rating)?$rating_time:0,
                'rating_clean_workspace'=>isset($rating)?$rating_clean_workspace:0,
                'rating_skill_repairs'=>isset($rating)?$rating_skill_repairs:0,
                'rating_explain_problems'=>isset($rating)?$rating_explain_problems:0,
                 'comments'=>CommentCollection::collection($rating),

            ];

        }
        else
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
                    'image'=>isset($this->image)?url($this->image):'',
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
                    'image'=>isset($this->image)?url($this->image):'',
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
                    'image'=>isset($this->image)?url($this->image):'',
                    'minstry'=>new CompanyCollection($this->client->minstry),

                ];
            }

        }



    }
}

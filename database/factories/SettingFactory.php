<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_name' => 'Afemai Association of Canada',
            'address' => 'canada',
            'email' => 'afemaiassociationofcanada@gmail.com',
            'phone' => '+1 (647) 769-9062',
            'image' => 'image.jpg',
            'meta_title' => 'Afemai Association of Canada',
            'meta_description' => 'The Afemai Association of Canada (AAC) is a non-profit, non-political social and cultural organization established to serve the interests of Afemai people residing in Canada.',
            'meta_tag_keywords' => 'Charity, Foundation , Canada',
            'alert_email' => 'afemaiassociationofcanada@gmail.com',
            'facebook_link' => 'Afemai',
            'instagram_link' => 'Afemai',
            'twitter_link' => 'Afemai',
            'youtube_link' => 'Afemai',
            'logo' => 'https://afemaiassociationofcanada.com/images/logo/afemia_logo.jpeg',
            'icon' => 'https://afemaiassociationofcanada.com/images/logo/afemia_logo.jpeg',

        ];
    }
}

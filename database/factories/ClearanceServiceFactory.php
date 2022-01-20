<?php

namespace Database\Factories;

use App\Models\ClearanceService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClearanceServiceFactory0 extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClearanceService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => Str::random(),
          'data' => '<h2>testtesttesttesttesttesttesttesttest&lt;\/h2&gt;"</h2>',
          'thumbnail' => 'public/shipment/images//OvyppWL1xLa2ZCHimr96MorEPDUKrpsVulKaYPc0.png',
          'user_id' => 45,
        ];
    }
}

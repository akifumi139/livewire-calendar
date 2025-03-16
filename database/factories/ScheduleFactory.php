<?php

namespace Database\Factories;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $now = CarbonImmutable::now();
        $startDate = $now->startOfMonth();
        $endDate = $now->endOfMonth();

        return [
            'user_id' => 1, // ユーザーID（必要に応じて変更）
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
        ];
    }
}

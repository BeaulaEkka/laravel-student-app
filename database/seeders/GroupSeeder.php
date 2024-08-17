<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()
            ->count(10)
            ->sequence(fn($sequence) => ['name' => 'group ' . ($sequence->index + 1)])
            ->has(
                Section::factory()
                    ->count(2)
                    ->state(new Sequence(
                        ['name' => 'Section A'],
                        ['name' => 'Section B']
                    ))
                    ->has(
                        Student::factory()
                            ->count(5)
                            ->state(function (array $attributes, Section $section) {
                                return ['group_id' => $section->group_id];
                            })
                    )
            )
            ->create();
    }
}

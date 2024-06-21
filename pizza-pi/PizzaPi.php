<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $nb_pizzas, int $nb_person_to_serve): int
    {
        return $nb_pizzas * (($nb_person_to_serve * 20) + 200);
    }

    public function calculateSauceRequirement(int $nb_pizzas, int $can_size): int
    {
        $sauce_per_pizza = 125;

        return $nb_pizzas * $sauce_per_pizza / $can_size;
    }

    public function calculateCheeseCubeCoverage(float $cheese_dimension, float $layer_thickness, float $pizza_diameter): int
    {
        return ($cheese_dimension ** 3) / ($layer_thickness * M_PI * $pizza_diameter);
    }

    public function calculateLeftOverSlices(int $pizza, int $friends): int
    {
        return ($pizza * 8) % $friends;
    }
}

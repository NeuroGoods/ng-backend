<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Auriculares con cancelación de ruido',
                'description' => 'Diseñados para reducir la estimulación auditiva y mejorar la concentración en entornos ruidosos.',
                'price' => 89.99,
                'stock' => 10,
                'image' => 'auriculares.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Manta con peso (5kg)',
                'description' => 'Manta terapéutica que proporciona una sensación de seguridad y calma mediante presión profunda.',
                'price' => 79.99,
                'stock' => 15,
                'image' => 'manta.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Juguete sensorial “Tangle”',
                'description' => 'Juguete de estimulación táctil para mejorar la autorregulación sensorial y el enfoque.',
                'price' => 12.99,
                'stock' => 30,
                'image' => 'tangle.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Agenda visual con pictogramas',
                'description' => 'Herramienta de planificación con pictogramas y códigos de color para facilitar la organización.',
                'price' => 19.99,
                'stock' => 20,
                'image' => 'agenda.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'App de gestión del tiempo “TimeBuddy”',
                'description' => 'Aplicación móvil con recordatorios visuales y seguimiento de tareas, adaptada a distintos estilos de organización.',
                'price' => 4.99,
                'stock' => 50,
                'image' => null,
                'category_id' => 2
            ],
            [
                'name' => 'Planificador táctil con relieve',
                'description' => 'Planificador con textura en las páginas para mejorar la gestión de tareas a través del sentido del tacto.',
                'price' => 24.99,
                'stock' => 18,
                'image' => 'planificador.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Tablero de comunicación con pictogramas',
                'description' => 'Herramienta visual para facilitar la comunicación en personas con dificultades verbales.',
                'price' => 29.99,
                'stock' => 12,
                'image' => 'tablero.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Libro “Neurodivergencia y Aprendizaje”',
                'description' => 'Libro especializado en estrategias de aprendizaje para personas neurodivergentes.',
                'price' => 14.99,
                'stock' => 25,
                'image' => 'libro.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Software de asistencia “SpeakEasy”',
                'description' => 'Aplicación que convierte texto en voz y facilita la comunicación para personas con dificultades de habla.',
                'price' => 39.99,
                'stock' => 40,
                'image' => null,
                'category_id' => 3
            ],
            [
                'name' => 'Lámpara de luz regulable',
                'description' => 'Lámpara con ajuste de temperatura y brillo para crear ambientes favorables para concentración o relajación.',
                'price' => 49.99,
                'stock' => 22,
                'image' => 'lampara.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Juguete de autocalma “Squishy Ball”',
                'description' => 'Bola de gel suave diseñada para aliviar el estrés y la ansiedad mediante la manipulación.',
                'price' => 9.99,
                'stock' => 35,
                'image' => 'squishy.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Suplemento natural “CalmPlus”',
                'description' => 'Mezcla de hierbas naturales para apoyar la relajación y el bienestar emocional.',
                'price' => 29.99,
                'stock' => 30,
                'image' => 'suplemento.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Camiseta sin etiquetas 100% algodón',
                'description' => 'Prenda sin etiquetas y de tela ultrasuave para evitar irritaciones sensoriales.',
                'price' => 19.99,
                'stock' => 25,
                'image' => 'camiseta.jpg',
                'category_id' => 5
            ],
            [
                'name' => 'Gafas de luz azul “BlueShield”',
                'description' => 'Gafas diseñadas para reducir la fatiga visual en entornos digitales.',
                'price' => 34.99,
                'stock' => 20,
                'image' => 'gafas.jpg',
                'category_id' => 5
            ],
            [
                'name' => 'Collar masticable de silicona',
                'description' => 'Collar de silicona segura para la estimulación oral y táctil.',
                'price' => 14.99,
                'stock' => 28,
                'image' => 'collar.jpg',
                'category_id' => 5
            ]
        ]);
}
}
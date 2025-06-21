<?php
/**
 * Recipe seeder with real Alaskan Seafood Recipes
 * File : database/seeders/AlaskanSeafoodSeeder.php
 *
 * PHP version 8.2
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/database/seeders/AlaskanSeafoodSeeder.php
 */
namespace Database\Seeders;

use App\Models\Author;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeStep;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

/**
 * Recipe seeder with real Alaskan Seafood Recipes
 *
 * @author Jason Turpin <jasonaturpin@gmail.com>
 * @link   https://github.com/JasonTurpin/skeleton-app/blog/main/database/seeders/AlaskanSeafoodSeeder.php
 */
class AlaskanSeafoodSeeder extends Seeder {
    protected static array $authors = [
        ['name' => 'Kodiak King', 'email' => 'kodiak.king@seafoodmail.com'],
        ['name' => 'Juneau Jane', 'email' => 'jane.juneau@oceanchef.org'],
        ['name' => 'Halibut Hank', 'email' => 'halibut.hank@fishmail.net'],
        ['name' => 'Bering Betty', 'email' => 'betty.bering@deepcatch.co'],
        ['name' => 'Sitka Sam', 'email' => 'sitka.sam@cookalaska.com'],
    ];

    protected static array $recipes = [
    [
        'name'        => 'Grilled Copper River Salmon',
        'description' => 'Rich and flavorful salmon grilled to perfection with fresh herbs.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Halibut Olympia',
        'description' => 'Baked Alaskan halibut with a creamy mayo-parmesan crust.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'King Crab Risotto',
        'description' => 'Creamy risotto infused with sweet chunks of Alaskan king crab.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Alaskan Seafood Stew',
        'description' => 'A hearty tomato-based stew loaded with shrimp, cod, and clams.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Black Cod with Miso Glaze',
        'description' => 'A sweet and savory Japanese-style black cod dish, baked until tender.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Beer-Battered Halibut',
        'description' => 'Crispy halibut pieces fried in a light beer batter.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Smoked Salmon Bagel Sandwich',
        'description' => 'Classic bagel sandwich layered with smoked Alaskan salmon and cream cheese.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Salmon Quinoa Bowl',
        'description' => 'Healthy and filling bowl with grilled salmon, quinoa, and seasonal veggies.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Seared Scallops with Lemon Butter',
        'description' => 'Golden-seared scallops topped with a light lemon butter sauce.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Alaskan Shrimp Fettuccine',
        'description' => 'Creamy pasta dish with garlic shrimp and parmesan.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Rockfish Tacos with Mango Salsa',
        'description' => 'Light and zesty tacos topped with fresh mango salsa.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Alaskan Cod Piccata',
        'description' => 'Pan-seared cod in a lemon-caper butter sauce.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Wild Salmon Cakes',
        'description' => 'Pan-fried cakes made with flaked salmon, herbs, and lemon.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Shrimp and Corn Chowder',
        'description' => 'Creamy chowder with sweet shrimp, potatoes, and corn.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Grilled Halibut with Herb Marinade',
        'description' => 'Marinated halibut grilled and served with herbed rice.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Snow Crab Pasta Primavera',
        'description' => 'Pasta tossed with vegetables and snow crab in a light garlic sauce.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Alaskan Pollock Fish Sandwich',
        'description' => 'Fried pollock fillet on a bun with tartar sauce and lettuce.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'King Salmon Teriyaki',
        'description' => 'Grilled king salmon with homemade teriyaki glaze.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Halibut Lettuce Wraps',
        'description' => 'Light and crunchy lettuce wraps filled with seared halibut and vegetables.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Seafood Pizza with Alaskan Crab',
        'description' => 'Thin crust pizza topped with cheese, sauce, and crab meat.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Lemon Dill Salmon Burgers',
        'description' => 'Savory salmon burgers served on a toasted bun with lemon-dill sauce.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Shrimp Scampi with Linguine',
        'description' => 'Garlic shrimp tossed in butter and wine sauce with pasta.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Crispy Cod Nuggets',
        'description' => 'Kid-friendly crispy cod bites served with dipping sauce.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Cold Poached Salmon with Cucumber Salad',
        'description' => 'Chilled salmon served over a fresh cucumber-dill salad.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Blackened Halibut Tacos',
        'description' => 'Spicy halibut fillets in warm tortillas with slaw.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Alaskan Seafood Paella',
        'description' => 'Saffron rice cooked with clams, shrimp, and cod.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Crab-Stuffed Mushrooms',
        'description' => 'Bite-sized mushrooms filled with cheesy crab mixture.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Baked Sockeye Salmon with Dijon Glaze',
        'description' => 'Oven-roasted salmon with a sweet mustard glaze.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Fisherman’s Breakfast Hash',
        'description' => 'Potato hash with smoked salmon and poached eggs.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Halibut Curry',
        'description' => 'Coconut curry with chunks of halibut and vegetables.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Crab Benedict',
        'description' => 'Toasted English muffin topped with crab, poached egg, and hollandaise.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Grilled Shrimp Skewers',
        'description' => 'Shrimp marinated and grilled on skewers.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Garlic Butter Snow Crab Claws',
        'description' => 'Tender crab claws tossed in garlic butter.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Seared Salmon with Pesto',
        'description' => 'Crispy salmon fillet topped with herbed pesto.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
    [
        'name'        => 'Chowder-Stuffed Bread Bowls',
        'description' => 'Creamy seafood chowder ladled into toasted bread bowls.',
        'ingredients' => [
            '1 pound rockfish, cut into chunks',
            '1 tablespoon butter',
            '1 onion, diced',
            '2 cups diced potatoes',
            '1 cup corn kernels',
            '2 cups fish stock',
            '1 cup heavy cream',
            'Salt, pepper, and thyme'
        ],
        'steps'       => [
            'Sauté onion in butter until soft.',
            'Add potatoes, corn, and stock; simmer until tender.',
            'Stir in rockfish and cook for 5-7 minutes.',
            'Add cream, season, and simmer gently.',
            'Serve with crusty bread.'
        ]
    ],
    [
        'name'        => 'Wild Cod in White Wine Sauce',
        'description' => 'Pan-seared cod with a white wine butter reduction.',
        'ingredients' => [
            '4 Alaskan salmon fillets',
            '2 tablespoons olive oil',
            '1 lemon, sliced',
            'Fresh dill sprigs',
            'Salt and pepper to taste'
        ],
        'steps'       => [
            'Preheat grill to medium-high heat.',
            'Brush salmon fillets with olive oil and season with salt and pepper.',
            'Place lemon slices and dill on top of each fillet.',
            'Grill salmon for 5-6 minutes per side or until cooked through.',
            'Serve hot with extra lemon wedges.'
        ]
    ],
    [
        'name'        => 'Shrimp and Avocado Toast',
        'description' => 'Toasted sourdough topped with avocado and sautéed shrimp.',
        'ingredients' => [
            '2 pounds Alaskan king crab legs',
            '1/2 cup butter',
            '3 cloves garlic, minced',
            '1 tablespoon lemon juice',
            'Chopped parsley for garnish'
        ],
        'steps'       => [
            'Steam crab legs for 5-7 minutes until heated through.',
            'In a saucepan, melt butter over medium heat.',
            'Add minced garlic and cook until fragrant.',
            'Stir in lemon juice and remove from heat.',
            'Serve crab legs with garlic butter and parsley.'
        ]
    ],
    [
        'name'        => 'Alaskan Crab Rangoon',
        'description' => 'Crispy wontons filled with crab and cream cheese.',
        'ingredients' => [
            '1 pound Alaskan halibut, cut into chunks',
            '1 cup flour',
            '1 teaspoon paprika',
            '1/2 teaspoon cayenne pepper',
            'Salt and pepper',
            'Vegetable oil for frying',
            '8 corn tortillas',
            '1 cup shredded cabbage',
            '1/4 cup sour cream',
            'Juice of 1 lime'
        ],
        'steps'       => [
            'Mix flour and spices in a bowl.',
            'Coat halibut pieces in the flour mixture.',
            'Fry until golden and cooked through.',
            'Combine sour cream and lime juice to make crema.',
            'Assemble tacos with halibut, cabbage, and crema.'
        ]
    ],
    [
        'name'        => 'Alaskan Seafood Nachos',
        'description' => 'Tortilla chips loaded with cheese, shrimp, and crab.',
        'ingredients' => [
            '1 cedar plank (soaked)',
            '4 sockeye salmon fillets',
            '1 tablespoon brown sugar',
            '1 tablespoon Dijon mustard',
            'Salt and black pepper'
        ],
        'steps'       => [
            'Preheat grill and soak cedar plank in water for at least 30 minutes.',
            'Mix brown sugar and mustard to create a glaze.',
            'Season salmon, place on plank, and coat with glaze.',
            'Grill on indirect heat for 15-20 minutes.',
            'Serve directly on the plank.'
        ]
    ],
];

    protected array $authorIds         = [];
    protected array $ingredientRecords = [];
    protected array $stepRecords       = [];

    /**
     * Run the database seeder
     *
     * @return void
     */
    public function run(): void {
        // Insert Authors
        Author::insert(static::$authors);
        $this->authorIds = Author::pluck('id')->all();

        // Process each recipe
        array_walk(static::$recipes, $this->processRecipe(...));

        // Run inserts
        Ingredient::insert($this->ingredientRecords);
        RecipeStep::insert($this->stepRecords);
    }

    /**
     * Processes a single recipe and prepares ingredient and step records
     *
     * @param array $recipe The recipe data
     *
     * @return void
     */
    protected function processRecipe($recipe) {
        // Insert recipe
        $recipeId = Recipe::insertGetId([
            'name'        => $recipe['name'],
            'slug'        => Str::slug($recipe['name']),
            'description' => $recipe['description'],
            'author_id'   => $this->authorIds[array_rand($this->authorIds)],
        ]);

        // Builds ingredient records
        $this->ingredientRecords = array_merge($this->ingredientRecords, array_map(function($ingredient) use ($recipeId) {
            return [
                'recipe_id' => $recipeId,
                'name'      => $ingredient,
            ];
        }, $recipe['ingredients']));

        // Builds step records
        $count = 0;
        $this->stepRecords = array_merge($this->stepRecords, array_map(function($step) use (&$count, $recipeId) {
            return [
                'recipe_id'    => $recipeId,
                'order_number' => ++$count,
                'content'      => $step,
            ];
        }, $recipe['steps']));
    }
}

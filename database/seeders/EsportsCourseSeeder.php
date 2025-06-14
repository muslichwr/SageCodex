<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EsportsCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Users
        $users = [
            // Mentors
            [
                'name' => 'Rizky "RizkCS" Pratama',
                'email' => 'rizky.csgo@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-rizky.jpg',
                'occupation' => 'Coach'
            ],
            [
                'name' => 'Sarah "ValoQueen" Indira',
                'email' => 'sarah.valorant@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-sarah.jpg',
                'occupation' => 'Professional Player'
            ],
            [
                'name' => 'Ahmad "DotaMaster" Fauzi',
                'email' => 'ahmad.dota@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-ahmad.jpg',
                'occupation' => 'Ex-Professional Player'
            ],
            [
                'name' => 'Jessica "LoLChamp" Tan',
                'email' => 'jessica.lol@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-jessica.jpg',
                'occupation' => 'Streamer'
            ],
            [
                'name' => 'Budi "TekkenKing" Santoso',
                'email' => 'budi.tekken@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-budi.jpg',
                'occupation' => 'Coach'
            ],
            [
                'name' => 'Maya "CardMaster" Sari',
                'email' => 'maya.hearthstone@sagecodex.id',
                'password' => bcrypt('password123'),
                'photo' => 'users/mentor-maya.jpg',
                'occupation' => 'Professional Player'
            ],
            
            // Sample Regular Users
            [
                'name' => 'Andi Setiawan',
                'email' => 'andi.student@gmail.com',
                'password' => bcrypt('password123'),
                'photo' => 'users/student-andi.jpg',
                'occupation' => 'Student'
            ],
            [
                'name' => 'Sinta Dewi',
                'email' => 'sinta.gamer@gmail.com',
                'password' => bcrypt('password123'),
                'photo' => 'users/student-sinta.jpg',
                'occupation' => 'Student'
            ],
            [
                'name' => 'Rafi Maulana',
                'email' => 'rafi.pro@gmail.com',
                'password' => bcrypt('password123'),
                'photo' => 'users/student-rafi.jpg',
                'occupation' => 'Student'
            ],
            [
                'name' => 'Dina Prastiwi',
                'email' => 'dina.esports@gmail.com',
                'password' => bcrypt('password123'),
                'photo' => 'users/student-dina.jpg',
                'occupation' => 'Student'
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
        
        // Categories
        $categories = [
            ['slug' => 'fps', 'name' => 'First Person Shooter (FPS)'],
            ['slug' => 'moba', 'name' => 'Multiplayer Online Battle Arena (MOBA)'],
            ['slug' => 'fighting', 'name' => 'Fighting Game'],
            ['slug' => 'strategy', 'name' => 'Real-Time Strategy (RTS)'],
            ['slug' => 'battle-royale', 'name' => 'Battle Royale'],
            ['slug' => 'sports', 'name' => 'Sports Game'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }

        // Courses
        $courses = [
            // FPS Games
            [
                'slug' => 'master-csgo-competitive',
                'name' => 'Master CS:GO Competitive Play',
                'thumbnail' => 'courses/csgo-master.jpg',
                'about' => 'Pelajari strategi advanced CS:GO dari basic aim training hingga team coordination. Tingkatkan skill shooting, map knowledge, dan game sense untuk mencapai rank Global Elite.',
                'is_popular' => true,
                'category_id' => 1,
            ],
            [
                'slug' => 'valorant-pro-tactics',
                'name' => 'Valorant Pro Tactics & Agent Mastery',
                'thumbnail' => 'courses/valorant-tactics.jpg',
                'about' => 'Kuasai semua agent Valorant dan pelajari meta strategy terbaru. Dari crosshair placement hingga site execution yang sempurna.',
                'is_popular' => true,
                'category_id' => 1,
            ],
            [
                'slug' => 'apex-legends-advanced',
                'name' => 'Apex Legends Advanced Movement & Positioning',
                'thumbnail' => 'courses/apex-advanced.jpg',
                'about' => 'Teknik movement advanced, positioning optimal, dan team play coordination untuk menguasai arena Apex Legends.',
                'is_popular' => false,
                'category_id' => 1,
            ],

            // MOBA Games
            [
                'slug' => 'dota2-immortal-guide',
                'name' => 'Dota 2 Immortal Rank Guide',
                'thumbnail' => 'courses/dota2-immortal.jpg',
                'about' => 'Panduan lengkap mencapai Immortal rank di Dota 2. Pelajari drafting, farming patterns, team fighting, dan decision making yang tepat.',
                'is_popular' => true,
                'category_id' => 2,
            ],
            [
                'slug' => 'lol-challenger-journey',
                'name' => 'League of Legends Challenger Journey',
                'thumbnail' => 'courses/lol-challenger.jpg',
                'about' => 'Roadmap menuju Challenger tier dengan fokus pada macro gameplay, champion mastery, dan mental game yang kuat.',
                'is_popular' => true,
                'category_id' => 2,
            ],
            [
                'slug' => 'mobile-legends-mythic',
                'name' => 'Mobile Legends Mythic Glory Strategy',
                'thumbnail' => 'courses/ml-mythic.jpg',
                'about' => 'Strategi khusus Mobile Legends untuk mencapai Mythic Glory. Hero meta analysis, rotation timing, dan team coordination.',
                'is_popular' => false,
                'category_id' => 2,
            ],

            // Fighting Games
            [
                'slug' => 'tekken8-tournament-prep',
                'name' => 'Tekken 8 Tournament Preparation',
                'thumbnail' => 'courses/tekken8-tournament.jpg',
                'about' => 'Persiapan komprehensif untuk turnamen Tekken 8. Frame data analysis, combo optimization, dan mental preparation.',
                'is_popular' => false,
                'category_id' => 3,
            ],
            [
                'slug' => 'street-fighter-6-fundamentals',
                'name' => 'Street Fighter 6 Fighting Fundamentals',
                'thumbnail' => 'courses/sf6-fundamentals.jpg',
                'about' => 'Fundamental solid Street Fighter 6 dari neutral game hingga advanced mixups. Cocok untuk pemula hingga intermediate.',
                'is_popular' => false,
                'category_id' => 3,
            ],

            // Strategy Games
            [
                'slug' => 'starcraft2-grandmaster',
                'name' => 'StarCraft 2 Grandmaster Strategies',
                'thumbnail' => 'courses/sc2-grandmaster.jpg',
                'about' => 'Strategi tingkat Grandmaster untuk ketiga race di StarCraft 2. Build orders, micro management, dan macro economics.',
                'is_popular' => false,
                'category_id' => 4,
            ],

            // Battle Royale
            [
                'slug' => 'pubg-mobile-conqueror',
                'name' => 'PUBG Mobile Conqueror Tactics',
                'thumbnail' => 'courses/pubgm-conqueror.jpg',
                'about' => 'Panduan mencapai tier Conqueror di PUBG Mobile. Zone management, looting strategy, dan clutch situations.',
                'is_popular' => false,
                'category_id' => 5,
            ],
            [
                'slug' => 'fortnite-competitive',
                'name' => 'Fortnite Competitive Building & Editing',
                'thumbnail' => 'courses/fortnite-competitive.jpg',
                'about' => 'Master building dan editing mechanics untuk competitive Fortnite. Dari basic builds hingga advanced retakes.',
                'is_popular' => false,
                'category_id' => 5,
            ],

            // Sports Games
            [
                'slug' => 'fifa-fut-champions',
                'name' => 'FIFA Ultimate Team Champions',
                'thumbnail' => 'courses/fifa-fut.jpg',
                'about' => 'Strategi menguasai FUT Champions weekend league. Squad building, trading tips, dan gameplay mechanics.',
                'is_popular' => false,
                'category_id' => 6,
            ],
        ];

        foreach ($courses as $index => $course) {
            DB::table('courses')->insert(array_merge($course, ['id' => $index + 1]));
        }

        // Course Benefits
        $courseBenefits = [
            // CS:GO Benefits
            ['name' => 'Peningkatan Aim Accuracy hingga 40%', 'course_id' => 1],
            ['name' => 'Pemahaman Map Control yang Mendalam', 'course_id' => 1],
            ['name' => 'Strategi Team Communication', 'course_id' => 1],
            ['name' => 'Analisis Demo Professional', 'course_id' => 1],

            // Valorant Benefits
            ['name' => 'Mastery Semua Agent Meta', 'course_id' => 2],
            ['name' => 'Crosshair Placement Optimization', 'course_id' => 2],
            ['name' => 'Site Execution Planning', 'course_id' => 2],
            ['name' => 'Retake Strategies', 'course_id' => 2],

            // Dota 2 Benefits
            ['name' => 'Advanced Last Hit Techniques', 'course_id' => 4],
            ['name' => 'Drafting Strategy Analysis', 'course_id' => 4],
            ['name' => 'Team Fight Positioning', 'course_id' => 4],
            ['name' => 'Macro Decision Making', 'course_id' => 4],

            // League of Legends Benefits
            ['name' => 'Lane Management Mastery', 'course_id' => 5],
            ['name' => 'Objective Control Strategy', 'course_id' => 5],
            ['name' => 'Champion Pool Optimization', 'course_id' => 5],
            ['name' => 'Mental Resilience Training', 'course_id' => 5],
        ];

        foreach ($courseBenefits as $benefit) {
            DB::table('course_benefits')->insert($benefit);
        }

        // Course Mentors (assuming user_id 1-10 are mentors)
        $courseMentors = [
            ['user_id' => 2, 'course_id' => 1, 'about' => 'Mantan pro player CS:GO dengan 5 tahun pengalaman turnamen internasional', 'is_active' => true],
            ['user_id' => 3, 'course_id' => 2, 'about' => 'Radiant player Valorant dan content creator dengan 100k+ subscribers', 'is_active' => true],
            ['user_id' => 4, 'course_id' => 4, 'about' => 'Immortal rank Dota 2 dengan specialisasi support dan captain role', 'is_active' => true],
            ['user_id' => 5, 'course_id' => 5, 'about' => 'Challenger tier LoL player dan profesional coach untuk tim esports', 'is_active' => true],
            ['user_id' => 6, 'course_id' => 7, 'about' => 'Tournament Tekken player dengan multiple major tournament wins', 'is_active' => true],
        ];

        foreach ($courseMentors as $mentor) {
            DB::table('course_mentors')->insert($mentor);
        }

        // Course Sections
        $courseSections = [
            // CS:GO Sections
            ['name' => 'Fundamental Aim Training', 'course_id' => 1, 'position' => 1],
            ['name' => 'Map Knowledge & Callouts', 'course_id' => 1, 'position' => 2],
            ['name' => 'Economy Management', 'course_id' => 1, 'position' => 3],
            ['name' => 'Advanced Strategies', 'course_id' => 1, 'position' => 4],

            // Valorant Sections
            ['name' => 'Agent Selection & Roles', 'course_id' => 2, 'position' => 1],
            ['name' => 'Crosshair & Aiming', 'course_id' => 2, 'position' => 2],
            ['name' => 'Site Execution', 'course_id' => 2, 'position' => 3],
            ['name' => 'Competitive Mindset', 'course_id' => 2, 'position' => 4],

            // Dota 2 Sections
            ['name' => 'Hero Drafting Strategy', 'course_id' => 4, 'position' => 1],
            ['name' => 'Laning Phase Mastery', 'course_id' => 4, 'position' => 2],
            ['name' => 'Mid Game Transitions', 'course_id' => 4, 'position' => 3],
            ['name' => 'Late Game Execution', 'course_id' => 4, 'position' => 4],

            // LoL Sections
            ['name' => 'Champion Mastery', 'course_id' => 5, 'position' => 1],
            ['name' => 'Macro Gameplay', 'course_id' => 5, 'position' => 2],
            ['name' => 'Team Fighting', 'course_id' => 5, 'position' => 3],
            ['name' => 'Mental & Consistency', 'course_id' => 5, 'position' => 4],
        ];

        foreach ($courseSections as $section) {
            DB::table('course_sections')->insert($section);
        }

        // Pricing Plans
        $pricingPlans = [
            ['name' => 'Basic Access', 'duration' => '1', 'price' => 99000],
            ['name' => 'Premium Access', 'duration' => '3', 'price' => 249000],
            ['name' => 'Ultimate Access', 'duration' => '6', 'price' => 449000],
            ['name' => 'Pro Coaching', 'duration' => '12', 'price' => 799000],
        ];

        foreach ($pricingPlans as $pricing) {
            DB::table('pricings')->insert($pricing);
        }

        // Section Contents
        $sectionContents = [
            // CS:GO Contents
            ['name' => 'Pengaturan Sensitivity & Crosshair Optimal', 'course_section_id' => 1, 'content' => 'Panduan lengkap mengatur sensitivity mouse dan crosshair untuk akurasi maksimal'],
            ['name' => 'Aim Training Routine Harian', 'course_section_id' => 1, 'content' => 'Routine training aim yang efektif untuk meningkatkan consistency'],
            ['name' => 'Recoil Control Master Class', 'course_section_id' => 1, 'content' => 'Teknik menguasai recoil pattern semua senjata populer'],
            
            ['name' => 'Callout Map Dust2', 'course_section_id' => 2, 'content' => 'Callout lengkap dan positioning optimal di map Dust2'],
            ['name' => 'Mirage Control Points', 'course_section_id' => 2, 'content' => 'Strategi menguasai area penting di map Mirage'],
            ['name' => 'Inferno Smoke Lineups', 'course_section_id' => 2, 'content' => 'Smoke lineups dan molotov setups untuk map Inferno'],

            // Valorant Contents
            ['name' => 'Duelist Agent Mastery', 'course_section_id' => 5, 'content' => 'Cara optimal memainkan agent duelist untuk entry fragging'],
            ['name' => 'Controller Smoke Strategies', 'course_section_id' => 5, 'content' => 'Placement smoke yang efektif untuk kontrol map'],
            ['name' => 'Initiator Timing', 'course_section_id' => 5, 'content' => 'Timing perfect untuk abilities initiator'],

            // Dota 2 Contents
            ['name' => 'Drafting Phase Analysis', 'course_section_id' => 9, 'content' => 'Analisis mendalam strategi drafting dan counter-picking'],
            ['name' => 'Meta Hero Breakdown', 'course_section_id' => 9, 'content' => 'Review hero-hero meta terkini dan cara optimal memainkannya'],
            
            ['name' => 'Last Hit Techniques', 'course_section_id' => 10, 'content' => 'Teknik last hit yang sempurna untuk maksimal gold'],
            ['name' => 'Creep Equilibrium', 'course_section_id' => 10, 'content' => 'Cara mengontrol creep wave untuk advantage maksimal'],

            // LoL Contents
            ['name' => 'Champion Pool Building', 'course_section_id' => 13, 'content' => 'Strategi membangun champion pool yang efektif untuk ranked'],
            ['name' => 'Mechanical Skill Training', 'course_section_id' => 13, 'content' => 'Latihan mechanical skill untuk execution yang sempurna'],
            
            ['name' => 'Objective Priority', 'course_section_id' => 14, 'content' => 'Prioritas objective dan timing yang tepat untuk setiap fase game'],
            ['name' => 'Wave Management', 'course_section_id' => 14, 'content' => 'Teknik mengelola minion wave untuk pressure maksimal'],
        ];

        foreach ($sectionContents as $content) {
            DB::table('section_contents')->insert($content);
        }
    }
}

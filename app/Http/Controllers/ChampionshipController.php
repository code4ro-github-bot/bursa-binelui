<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'content' => '11111 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.',
                'name' => 'Judith Black',
                'job' => 'CEO',
                'company' => 'Workcation'
            ],
            [
                'content' => '222222222 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.',
                'name' => 'Judith Black',
                'job' => 'CEO',
                'company' => 'Workcation'
            ]
        ];

        $links = [
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ],
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ],
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ]
        ];

        $editions = [
            [
                'href' => '1',
                'name' => 'Campionatul de bine 2020'
            ],
            [
                'href' => '2',
                'name' => 'Campionatul de bine 2019'
            ],
            [
                'href' => '3',
                'name' => 'Campionatul de bine 2018'
            ],
        ];

        $articles = [
            [
                'id' => 1,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
            [
                'id' => 2,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
            [
                'id' => 3,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
        ];

        $projects = Project::publish()->paginate(9)->withQueryString();
        $counties = County::whereHas('projects')->get(['name', 'id']);

        return Inertia::render('Public/Championship/Championship', [
            'query' => $projects,
            'counties' => $counties,
            'testimonials' => $testimonials,
            'links' => $links,
            'editions' => $editions,
            'articles' => $articles
        ]);
    }

    public function edition()
    {
        $testimonials = [
            [
                'content' => '11111 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.',
                'name' => 'Judith Black',
                'job' => 'CEO',
                'company' => 'Workcation'
            ],
            [
                'content' => '222222222 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.',
                'name' => 'Judith Black',
                'job' => 'CEO',
                'company' => 'Workcation'
            ]
        ];

        $links = [
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ],
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ],
            [
                'href' => "#",
                'label' => "Titlu Articol",
                'source' => "sursa.ro"
            ]
        ];

        $editions = [
            [
                'href' => '1',
                'name' => 'Campionatul de bine 2020'
            ],
            [
                'href' => '2',
                'name' => 'Campionatul de bine 2019'
            ],
            [
                'href' => '3',
                'name' => 'Campionatul de bine 2018'
            ],
        ];

        $articles = [
            [
                'id' => 1,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
            [
                'id' => 2,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
            [
                'id' => 3,
                'img' => '/images/project_img.png',
                'author' => 'Ion Popescu',
                'name' => 'Importanța educației remediare în România în timpul pandemiei',
                'team' => 'Echipa BCR',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                'date' => '15.02.2022'
            ],
        ];

        $statistics = [
            [
                'month' => 'Decembrie 2016',
                'donations' => '2210',
                'amount' => '188873,00'
            ],
            [
                'month' => 'Decembrie 2016',
                'donations' => '2210',
                'amount' => '188873,00'
            ],
            [
                'month' => 'Decembrie 2016',
                'donations' => '2210',
                'amount' => '188873,00'
            ],
            [
                'month' => 'Decembrie 2016',
                'donations' => '2210',
                'amount' => '188873,00'
            ]
        ];

        $projects = Project::publish()->paginate(9)->withQueryString();
        $counties = County::whereHas('projects')->get(['name', 'id']);
        return Inertia::render('Public/Championship/Edition', [
            'query' => $projects,
            'counties' => $counties,
            'testimonials' => $testimonials,
            'links' => $links,
            'editions' => $editions,
            'articles' => $articles,
            'statistics' => $statistics
        ]);
    }

    public function projects(Request $request)
    {
        $offset = ($request->page - 1) * 8;
        return Project::publish()->offset($offset)->limit(8)->get();
    }
}
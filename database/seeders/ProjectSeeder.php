<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\Report;
use App\Models\Company;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\SavedCompany;
use App\Models\CompanyGallery;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fake data for testing in development environment
        $company = [
            [
                'name' => 'Company 1',
                'street' => 'Street 1',
                'city' => 'City 1',
                'district' => 'District 1',
                'commune' => 'Commune 1',
                'village' => 'Village 1',
                'logo' => 'Logo 1',
                'email' => 'Email 1',
                'website' => 'Website 1',
                'description' => 'Description 1',
                'company_user_id' => 2,
                'category_id' => 1,
            ],
            [
                'name' => 'Company 2',
                'street' => 'Street 2',
                'city' => 'City 2',
                'district' => 'District 2',
                'commune' => 'Commune 2',
                'village' => 'Village 2',
                'logo' => 'Logo 2',
                'email' => 'Email 2',
                'website' => 'Website 2',
                'description' => 'Description 2',
                'company_user_id' => 2,
                'category_id' => 2,
            ],
            [
                'name' => 'Company 3',
                'street' => 'Street 3',
                'city' => 'City 3',
                'district' => 'District 3',
                'commune' => 'Commune 3',
                'village' => 'Village 3',
                'logo' => 'Logo 3',
                'email' => 'Email 3',
                'website' => 'Website 3',
                'description' => 'Description 3',
                'company_user_id' => 1,
                'category_id' => 1,
            ],
        ];

        $category = [
            [
                'name' => 'Category 1',
                'logo_url' => 'Logo 1',
                'add_by_admin_id' => '1',
            ],
            [
                'name' => 'Category 2',
                'logo_url' => 'Logo 2',
                'add_by_admin_id' => '1',
            ],
            [
                'name' => 'Category 3',
                'logo_url' => 'Logo 3',
                'add_by_admin_id' => '1',
            ],
        ];

        $gallery = [
            [
                'photo_url' => 'Photo 1',
                'company_id' => 1,
            ],
            [
                'photo_url' => 'Photo 2',
                'company_id' => 1,
            ],
            [
                'photo_url' => 'Photo 3',
                'company_id' => 2,
            ]
        ];

        $feedback = [
            [
                'feedback' => 'Feedback 1',
                'company_id' => 1,
                'normal_user_id' => 1,
            ],
            [
                'feedback' => 'Feedback 2',
                'company_id' => 1,
                'normal_user_id' => 3,
            ],
            [
                'feedback' => 'Feedback 3',
                'company_id' => 2,
                'normal_user_id' => 1,
            ],
            [
                'feedback' => 'Feedback 4',
                'company_id' => 3,
                'normal_user_id' => 3,
            ]
        ];

        $star = [
            [
                'star_number' => 1,
                'company_id' => 1,
                'normal_user_id' => 1,
            ],
            [
                'star_number' => 2,
                'company_id' => 1,
                'normal_user_id' => 3,
            ],
            [
                'star_number' => 3,
                'company_id' => 1,
                'normal_user_id' => 2,
            ]
        ];

        $report = [
            [
                'reason' => 'Reason 1',
                'company_id' => 1,
                'report_by_normal_user_id' => 1,
            ],
            [
                'reason' => 'Reason 2',
                'company_id' => 1,
                'report_by_normal_user_id' => 3,
            ],
            [
                'reason' => 'Reason 3',
                'company_id' => 2,
                'report_by_normal_user_id' => 1,
            ]
        ];

        $savedCompany = [
            [
                'company_id' => 1,
                'normal_user_id' => 1,
            ],
            [
                'company_id' => 1,
                'normal_user_id' => 3,
            ],
            [
                'company_id' => 2,
                'normal_user_id' => 1,
            ]
        ];

        $service = [
            [
                'name' => 'Service 1',
                'photo_url' => 'Photo 1',
                'company_id' => 1,
            ],
            [
                'name' => 'Service 2',
                'photo_url' => 'Photo 2',
                'company_id' => 1,
            ],
            [
                'name' => 'Service 3',
                'photo_url' => 'Photo 3',
                'company_id' => 2,
            ],
            [
                'name' => 'Service 4',
                'photo_url' => 'Photo 4',
                'company_id' => 3,
            ]
        ];

        foreach ($company as $key => $value) {
            Company::create($value);
        }

        foreach ($category as $key => $value) {
            Category::create($value);
        }

        foreach ($gallery as $key => $value) {
            CompanyGallery::create($value);
        }

        foreach ($feedback as $key => $value) {
            Feedback::create($value);
        }

        foreach ($star as $key => $value) {
            Rate::create($value);
        }

        foreach ($report as $key => $value) {
            Report::create($value);
        }

        foreach ($savedCompany as $key => $value) {
            SavedCompany::create($value);
        }

        foreach ($service as $key => $value) {
            Service::create($value);
        }
    }
}

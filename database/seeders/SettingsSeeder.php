<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'blog_name' => 'الهيئة الأوروبية للمراكز الإسلامية',
            'blog_name_en' => 'European Organization of the Islamic Centers',
            'blog_name_fr' => 'Organisation Européenne des Centres Islamiques',
            'blog_description' => 'هي هيئة متخصصة في العناية بشؤون المراكز الإسلامية في أوروبا.
أُسست وفقاً للمادة (60) وما يتلوها من المواد المتعلقة بتأسيس الجمعيات، من القانون المدني السويسري، بمبادرة من شخصيات دعوية من عدة أقطار أوروبية. وهي جمعية خيرية تطوعية، غير حكومية، مستقلة، وتسعى للعمل وفق رؤية واضحة وأهداف مرسومة وخطوات مدروسة، ووسائل معلنه.',
            'blog_description_en' => 'It is an Organization specialized within caring of the Islamic Centers affairs in Europe.

Through the initiative of some imminent religious personalities from Europe, the Organization was established in accordance with the Article 60 and all what follows from the Swiss Civil Code, related to the establishment of associations. It is an independent and nongovernmental voluntary charitable association that leads to work according to a clear vision and previously established aims and steps, and declared means.',
            'blog_description_fr' => 'L’Organisation Européenne des Centres Islamiques (OECI) a été fondée en décembre 2015 à Genève conformément à l’article 60 et aux articles relatifs à la création d’associations du code civil Suisse. C’est une organisation de bienfaisance, non gouvernementale, apolitique et indépendante qui œuvre dans le cadre de l’Union Européenne. Son siège social est à Genève. ',
            'phone' => '0041225027500',
            'email' => 'info@eoic.org',
            'address' => 'CP 355, 1213 Petit Lancy 1 Geneve Suisse',

        ]);
    }
}

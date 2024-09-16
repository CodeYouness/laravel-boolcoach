<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                "name" => "League of Legends",
                "genre" => "MOBA",
                "img" => "https://s3-alpha-sig.figma.com/img/8a9a/b436/cfb21689e2dba2768a2644e9e998a40b?Expires=1727049600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=IKyJ53PvjIeCWwpE2fd45jhoxFHUXTg39hA9iP3YZHB6qe7lxQmLjKm0fEXjqf6NQbMZzXjPXowqgpPfK6fifwJvHbkVFYqGpTgmFoakepUlq~EQEmQzV~ckuK-64C-2zmFLn0ICRCA4bZzfT1t2R9ClU6hHk4u8bwEooVTEZwfHfSV1wrr6pYdKcfSheFAXMne119svG2XAD6DD~5wnwRD9il0blyqv3v1MHTs99fZQAAG32WylhYbQVaj5wrvITtqD8CG-domUdOsLbkeCLZS5iv2mlZZNkgfSNWs0a3I0Gr~eR7FYKWlXoSHTQnHciwymdMqE1fI81WpfPgB1bQ__"
            ],
            [
                "name" => "Tom Clancy's Rainbow Six Siege",
                "genre" => "Tactical Shooter",
                "img" => "https://s3-alpha-sig.figma.com/img/86c1/98ba/e588a0b75bcbaaa3e197d187fd159912?Expires=1727049600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=D7hNrwkIuyt7t1tKD3zelJXj365CKjWUfgHBkH1bIY6AFzqonRkAyf9rAsSeJJJE9~BR63CpQGnl-Nnvud4FHfYCgqGrZ1b9kqX26-yBB8PGtv1O5fqIqHWZ27h9KvqBisRHCe4NJ6Yy9IVkc6riIHBfBf~0vz3TH70~Hun8Lu3UbyCDXEaMsMJqG8OWDLD-UWhk2SimSV2aNQNALLUt4NI9uKwTaJ8i6Wy~ykBwYgyNEbmqvsc8u~f3lrz1CvjNRJDfn~8g5Qj74PH7O-KBOzrvgRyY0WD~7UkNnriU1UdrcBvZYAAfRwLA0fO7inKVXuwT~I49j0Ebh6hUrshhqQ__"
            ],
            [
                "name" => "FIFA 25",
                "genre" => "Sports",
                "img" => "https://s3-alpha-sig.figma.com/img/a751/3cfa/9c68bb3547fe84c442fbe86d703f5f9a?Expires=1727049600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Rt9wI5rwhlP14wDjMmfa0JbeFhI6NzORgcoqY3Pf7OynWA7ZelIsi40KJyfNo4wkSo01ckW20UhdeuNTo~P23HF9mJDKpjIxtPCCQbyAuN6LKit14ngqWyKkbN1482LGmMwwJD6rG79FgrQYEfGslPenIpr587~U2CmXyytrZW66GBMIgeR7FGfgkJMYmQipmerFOEF2mg6rTev2nMDuvRPhYuPPF~cuj27LB6qb0mQlAE0zrFBXyNnejo9j-Zt2gA4u6uscKmwgoN0TyrcC6Ufl2kSUWOaeSlwSW~YsZcooufsOMapaVce4DSgMcfKMYf3dtAimM0e-zboD3klv~A__"
            ],
            [
                "name" => "Overwatch",
                "genre" => "Hero Shooter",
                "img" => "https://s3-alpha-sig.figma.com/img/6ecc/1d5d/74240ceb07688ef9becef6875f1b4ed3?Expires=1727049600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=WllW4zKwyFZbWAtf6iqFY6YB7Be15Loftun4ztUC61bzZNmvOHyw-qjQ4O5egmXOVj33-XCb9EjPn-a3w9oOOZNd2yT4Gtc04Nr5VD-MjWEdJ-RBpdJdNLxaWBXzkJ4LdsNz7jov5mzzw~YPARfOp4aaDcFerRtHIWNee7b5XlMNw0Nq-4CK0ZWOZzcDeaMiSRHTv~PE~n6FwOKdDAa2mPmuDull~p74fdkvb~ohsiO5DTcTnsaBiF0Y8qORNXVpEeBQV-JHNpRQ14DBA8kkQ6nG~UnopXIlDudAFaQzSAE0AhyK1yAzBQqe-Pptd06Mq2HW0OTWvf1aYRNzEvLXdw__"
            ],
            [
                "name" => "Rocket League",
                "genre" => "Sports/Car Soccer",
                "img" => "https://s3-alpha-sig.figma.com/img/7cb7/7783/4f8fcfbbd7b7168aea9d8e93dbdc2788?Expires=1727049600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ph8JAxi4cc7pE-WiNja5TSdEFLs8UK6qkCgS9kLqWvgimm5IMiKDyjVkeVHD2JKxa9rz8bzgZoLSzVUP0G3RYyVh47nsHZ0CPcC0PRVRmryq4p95T8yPPbT3EAPePZmQCm2fuN2WFmeuuuiErfnLozDMeoDMiWbFTxFVIOM35pqaGB6fN6X6n33IZ4pMHJhmA6tk6mfwrb36C2GwtDx85p0Gyxg1icehUvg~WMFXcNCRxcaW7N1jo7P8ByX36cBYfnVJA6Y9cG4CWwNooBwOR6sAe2OXKpXbNbQ8naROEOWuNM47hnPulrubCnpniWVwBp~zVhRHIhMkM3nd2x0lew__"
            ]
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}

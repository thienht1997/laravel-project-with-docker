<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\Competition;
use App\Models\Team;
use App\Models\Matches;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $countryEngland = Country::create([
            'id' => (string) Str::uuid(),
            'name' => 'England',
            'logo' => 'england_logo.png',
        ]);

        $countryGermany = Country::create([
            'id' => (string) Str::uuid(),
            'name' => 'Germany',
            'logo' => 'germany_logo.png',
        ]);

        $premierLeague = Competition::create([
            'id' => (string) Str::uuid(),
            'name' => 'Premier League',
            'country_id' => $countryEngland->id,
            'logo' => 'premier_league_logo.png',
        ]);

        $bundesliga = Competition::create([
            'id' => (string) Str::uuid(),
            'name' => 'Bundesliga',
            'country_id' => $countryGermany->id,
            'logo' => 'bundesliga_logo.png',
        ]);

        $teamsEngland = [
            ['name' => 'Manchester United', 'logo' => 'man_utd_logo.png'],
            ['name' => 'Manchester City', 'logo' => 'man_city_logo.png'],
            ['name' => 'Liverpool', 'logo' => 'liverpool_logo.png'],
            ['name' => 'Chelsea', 'logo' => 'chelsea_logo.png'],
            ['name' => 'Arsenal', 'logo' => 'arsenal_logo.png'],
        ];

        foreach ($teamsEngland as $teamData) {
            Team::create([
                'id' => (string) Str::uuid(),
                'competition_id' => $premierLeague->id,
                'country_id' => $countryEngland->id,
                'name' => $teamData['name'],
                'logo' => $teamData['logo'],
            ]);
        }

        $teamsGermany = [
            ['name' => 'Bayern Munich', 'logo' => 'bayern_munich_logo.png'],
            ['name' => 'Borussia Dortmund', 'logo' => 'dortmund_logo.png'],
            ['name' => 'RB Leipzig', 'logo' => 'leipzig_logo.png'],
            ['name' => 'Bayer Leverkusen', 'logo' => 'leverkusen_logo.png'],
            ['name' => 'Wolfsburg', 'logo' => 'wolfsburg_logo.png'],
        ];

        foreach ($teamsGermany as $teamData) {
            Team::create([
                'id' => (string) Str::uuid(),
                'competition_id' => $bundesliga->id,
                'country_id' => $countryGermany->id,
                'name' => $teamData['name'],
                'logo' => $teamData['logo'],
            ]);
        }

        $teamsPremierLeague = Team::where('competition_id', $premierLeague->id)->get();
        $teamsBundesliga = Team::where('competition_id', $bundesliga->id)->get();

        $this->createRandomMatches($teamsPremierLeague, $premierLeague);
        $this->createRandomMatches($teamsBundesliga, $bundesliga);
    }

    /**
     * Function to create random matches between teams.
     *
     * @param $teams
     * @param $competition
     */
    private function createRandomMatches($teams, $competition)
    {
        $teamIds = $teams->pluck('id')->toArray();
        $numMatches = 5;
        $startTime = now()->minute(0)->second(0);

        for ($i = 0; $i < $numMatches; $i++) {
            $randomTeams = array_rand($teamIds, 2);
            $homeTeamId = $teamIds[$randomTeams[0]];
            $awayTeamId = $teamIds[$randomTeams[1]];

            Matches::create([
                'id' => (string) Str::uuid(),
                'competition_id' => $competition->id,
                'home_team_id' => $homeTeamId,
                'away_team_id' => $awayTeamId,
                'status_id' => 1,
                'match_time' => $startTime->format('Y-m-d H:i:s'),
                'home_scores' => ([rand(0, 5), 0, 0, 0, 1, 0, 0]),
                'away_scores' => ([rand(0, 5), 0, 0, 0, 1, 0, 0]),
            ]);

            $startTime->addMinutes(15);
        }
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) \Str::uuid();
            }
        });
    }

    protected $casts = [
        'home_scores' => 'array',
        'away_scores' => 'array',
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function getHomeTeamRegularScore()
    {
        return $this->home_scores[0] ?? 0;
    }

    public function getHomeTeamHalfTimeScore()
    {
        return $this->home_scores[1] ?? 0;
    }

    public function getHomeTeamRedCards()
    {
        return $this->home_scores[2] ?? 0;
    }

    public function getHomeTeamYellowCards()
    {
        return $this->home_scores[3] ?? 0;
    }

    public function getHomeTeamCorners()
    {
        return $this->home_scores[4] ?? 0;
    }

    public function getHomeTeamOvertimeScore()
    {
        return $this->home_scores[5] ?? 0;
    }

    public function getHomeTeamPenaltyShootoutScore()
    {
        return $this->home_scores[6] ?? 0;
    }

    public function getAwayTeamRegularScore()
    {
        return $this->away_scores[0] ?? 0;
    }

    public function getAwayTeamHalfTimeScore()
    {
        return $this->away_scores[1] ?? 0;
    }

    public function getAwayTeamRedCards()
    {
        return $this->away_scores[2] ?? 0;
    }

    public function getAwayTeamYellowCards()
    {
        return $this->away_scores[3] ?? 0;
    }

    public function getAwayTeamCorners()
    {
        return $this->away_scores[4] ?? 0;
    }

    public function getAwayTeamOvertimeScore()
    {
        return $this->away_scores[5] ?? 0;
    }

    public function getAwayTeamPenaltyShootoutScore()
    {
        return $this->away_scores[6] ?? 0;
    }
}
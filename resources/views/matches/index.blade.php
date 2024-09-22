@extends('app')

@section('content')
<div class="matches-list">
    @foreach($competition_with_matches as $competition)
    @if ($competition->matches()->count() == 0)
        @continue
    @endif
    <div class="match">
        <div class="match-header">
            <span class="flag">
                <img class="country-logo" src="{{ asset('logo/' . $competition->country->logo) }}" alt="Country Logo">
            </span>
            <span class="competition">{{ $competition->country->name }}: {{ $competition->name }}</span>
        </div>
        <table border="0" cellpadding="10" cellspacing="0">
            <thead>
            </thead>
            <tbody>
                @foreach($competition->matches()->get() as $match)
                <tr>
                    <td class="time">{{ date('H:i', strtotime($match->match_time)) }}</td>
                    <td class="status">{{ \Carbon\Carbon::parse($match->match_time)->diff(now())->format('%I') }}'</td>
                    <td class="home-name">
                        {{ $match->homeTeam->name }}
                        <img class="team-logo" src="{{ asset('logo/' . $match->homeTeam->logo) }}">
                    </td>
                    <td class="match-score">
                        <span class="home-score">{{ $match->getHomeTeamRegularScore() }}</span>
                        -
                        <span class="away-score">{{ $match->getAwayTeamRegularScore() }}</span>
                    </td>
                    <td class="away-name">
                        <img class="team-logo" src="{{ asset('logo/' . $match->awayTeam->logo) }}">
                        {{ $match->awayTeam->name }}
                    </td>
                    <td class="half-time-score">
                        HT {{ $match->getHomeTeamHalfTimeScore() }}-{{ $match->getAwayTeamHalfTimeScore() }}
                    </td>
                    <td class="corner-score">
                    <img class="team-logo" src="{{ asset('logo/corner.png') }}">
                    {{ $match->getHomeTeamCorners() }}-{{ $match->getAwayTeamCorners() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection
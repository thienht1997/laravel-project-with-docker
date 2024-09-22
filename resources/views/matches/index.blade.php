@extends('app')

@section('content')
<div class="matches-list">
    @foreach($matches as $match)
    <div class="match">
        <div class="match-header">
            <span class="flag">
                🇩🇿 <!-- Biểu tượng quốc gia (có thể thay thế bằng hình ảnh cờ quốc gia) -->
            </span>
            <span class="competition">{{ $match->competition->name }}</span>
        </div>
        <div class="match-details">
            <div class="time">{{ date('H:i', strtotime($match->match_time)) }}</div>
            <div class="status">{{ $match->status_id }}</div>
            <div class="teams">
                <div class="home-team">
                    {{ $match->homeTeam->name }}
                </div>
                <div class="score">
                    <span class="home-score">{{ $match->homeTeam->score ?? '-' }}</span>
                    -
                    <span class="away-score">{{ $match->awayTeam->score ?? '-' }}</span>
                </div>
                <div class="away-team">
                    {{ $match->awayTeam->name }}
                </div>
            </div>
            <div class="half-time">HT {{ $match->half_time_score ?? '-' }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection
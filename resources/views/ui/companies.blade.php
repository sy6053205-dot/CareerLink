@extends('ui.layout')

@section('title')
Companies
@endsection

@section('content')
<header class="ui-nav">
    <div class="ui-nav-in">
        <a class="ui-brand" href="/ui/companies">
            <span class="ui-brand-mark">W</span>
            Wazify
        </a>
        <a class="ui-link" href="#">Find Jobs</a>
        <a class="ui-link active" href="/ui/companies">Companies</a>
        <a class="ui-link" href="#">Career Resources <i class="fa-solid fa-chevron-down"></i></a>
        <a class="ui-link" href="#">For Employers</a>
        <span class="ui-spacer"></span>
        <a class="ui-link" href="#">Log in</a>
        <a class="ui-btn-green" href="#">Sign up</a>
    </div>
</header>

<div class="c-hero">
    <div class="c-hero-in">
        <h1 class="c-title">Companies</h1>
        <p class="c-sub">Discover great companies and explore open opportunities.</p>
    </div>
</div>

<div class="c-tools">
    <div class="c-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search companies by name, industry, or keyword...">
    </div>
    <button class="c-drop">
        <i class="fa-solid fa-location-dot"></i>
        Location
        <i class="fa-solid fa-chevron-down"></i>
    </button>
    <button class="c-drop">
        <i class="fa-solid fa-building"></i>
        Industry
        <i class="fa-solid fa-chevron-down"></i>
    </button>
    <button class="c-drop">
        <i class="fa-solid fa-sliders"></i>
        Filters
    </button>
</div>

<div class="c-grid">
    @foreach ($companies as $company)
    <div class="c-card">
        <div class="c-top">
            <span class="c-logo {{ $company['logo_class'] }}">
                @if ($company['logo_icon'])
                <i class="{{ $company['logo_icon'] }}"></i>
                @endif
                @if ($company['logo_letter'])
                {{ $company['logo_letter'] }}
                @endif
            </span>
            <h3>{{ $company['name'] }}</h3>
        </div>
        <div class="c-loc">
            <i class="fa-solid fa-location-dot"></i>
            {{ $company['location'] }}
        </div>
        <p class="c-about">{{ $company['about'] }}</p>
        <span class="c-jobs">
            <i class="fa-solid fa-briefcase"></i>
            {{ $company['open_jobs'] }} Open Jobs
        </span>
        <div class="c-btn-row">
            <a class="c-btn" href="#">
                View Jobs
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection

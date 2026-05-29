@extends('layouts.app')

@section('content')
<section class="section projets-page">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">Travaux</span>
            <h2 class="section-title">Tous les projets</h2>
        </div>

        <!-- Filtres -->
        <div class="portfolio-tabs-wrapper">
            <div class="portfolio-tabs scroll-reveal">
                <a href="{{ route('projects.index') }}"
                    class="tab-btn {{ $filtre === 'all' ? 'active' : '' }}">
                    Tous
                </a>
                <a href="{{ route('projects.index', ['filtre' => 'design']) }}"
                    class="tab-btn {{ $filtre === 'design' ? 'active' : '' }}">
                    Design
                </a>
                <a href="{{ route('projects.index', ['filtre' => 'dev']) }}"
                    class="tab-btn {{ $filtre === 'dev' ? 'active' : '' }}">
                    Développement
                </a>
            </div>
        </div>

        <!-- Grille des projets -->
        <div class="portfolio-minimal-grid scroll-reveal fade-up">
            @foreach($projects as $project)
            <div class="project-card"
                data-category="{{ $project->filtre }}"
                data-project="{{ $project->id }}">
                <div class="project-img-box">
                    <img src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->titre }}"
                        class="project-img">
                </div>
                <div class="project-info">
                    <span class="project-cat">{{ $project->categorie }}</span>
                    <h3 class="project-title">{{ $project->titre }}</h3>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
        <div class="pagination-wrapper scroll-reveal fade-up">
            {{-- Précédent --}}
            @if($projects->onFirstPage())
                <button class="pagination-btn" disabled>
                    <i data-lucide="arrow-left"></i>
                </button>
            @else
                <a href="{{ $projects->previousPageUrl() }}" class="pagination-btn">
                    <i data-lucide="arrow-left"></i>
                </a>
            @endif

            {{-- Pages --}}
            <div class="pagination-pages">
                @for($i = 1; $i <= $projects->lastPage(); $i++)
                <a href="{{ $projects->url($i) }}"
                    class="pagination-page {{ $projects->currentPage() === $i ? 'active' : '' }}">
                    {{ $i }}
                </a>
                @endfor
            </div>

            {{-- Suivant --}}
            @if($projects->hasMorePages())
                <a href="{{ $projects->nextPageUrl() }}" class="pagination-btn">
                    <i data-lucide="arrow-right"></i>
                </a>
            @else
                <button class="pagination-btn" disabled>
                    <i data-lucide="arrow-right"></i>
                </button>
            @endif
        </div>
        @endif

        <!-- Retour accueil -->
        <div class="voir-plus-wrapper scroll-reveal fade-up">
            <a href="{{ route('home') }}" class="btn btn-primary-pill">
                <i data-lucide="arrow-left"></i>
                <span>Retour à l'accueil</span>
            </a>
        </div>

    </div>
</section>
@endsection
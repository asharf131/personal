@extends('personal.app')
@section('title', 'Projects | ' . ($settings['site_name'] ?? env('APP_NAME')))
@section('content')

            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            
                            @forelse($projects as $project)
                            <!-- Project Card -->
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center flex-column flex-md-row">
                                        <div class="p-5">
                                            <h2 class="fw-bolder">{{ $project->title }}</h2>
                                            <p>{{ $project->description }}</p>
                                            @if($project->link)
                                            <a href="{{ $project->link }}" target="_blank" class="text-decoration-none fw-bold text-primary mt-2 d-inline-block">
                                                View Project <i class="bi bi-arrow-right"></i>
                                            </a>
                                            @endif
                                        </div>
                                        @if($project->image)
                                        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 300px; height: 400px; object-cover" />
                                        @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 300px; height: 400px;">
                                            <i class="bi bi-image text-muted fs-1"></i>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-muted">No projects added yet.</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('personal.contact') }}">Contact me</a>
                    </div>
                </div>
            </section>
   
@endsection

@extends('personal.app')
@section('title', 'Resume | ' . ($settings['site_name'] ?? env('APP_NAME')))
@section('content')

            <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resume</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                                <a class="btn btn-primary px-4 py-3" href="#!">
                                    <div class="d-inline-block bi bi-download me-2"></div>
                                    Download Resume
                                </a>
                            </div>
                            
                            @forelse($experiences as $exp)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-2">
                                                    {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - 
                                                    {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}
                                                </div>
                                                <div class="small fw-bolder">{{ $exp->title }}</div>
                                                <div class="small text-muted">{{ $exp->company }}</div>
                                                <div class="small text-muted">{{ $exp->location }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8"><div>{{ $exp->description }}</div></div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-muted">No experience listed yet.</p>
                            @endforelse
                        </section>

                        <!-- Education Section-->
                        <section>
                            <h2 class="text-secondary fw-bolder mb-4">Education</h2>
                            @forelse($educations as $edu)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-secondary fw-bolder mb-2">
                                                    {{ \Carbon\Carbon::parse($edu->start_date)->format('Y') }} - 
                                                    {{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : 'Present' }}
                                                </div>
                                                <div class="mb-2">
                                                    <div class="small fw-bolder">{{ $edu->college }}</div>
                                                    <div class="small text-muted">{{ $edu->location }}</div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted">{{ $edu->degree }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8"><div>{{ $edu->description }}</div></div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-muted">No education listed yet.</p>
                            @endforelse
                        </section>

                        <!-- Divider-->
                        <div class="pb-5"></div>
                        
                        <!-- Skills & Languages Section-->
                        <section>
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Professional Skills</span></h3>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                            @forelse($skills as $skill)
                                            <div class="col">
                                                <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">
                                                    {{ $skill->title }}
                                                </div>
                                            </div>
                                            @empty
                                            <p class="text-muted italic">Add skills in dashboard.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <!-- Languages list-->
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-translate"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Languages</span></h3>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                            @forelse($languages as $lang)
                                            <div class="col">
                                                <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">
                                                    {{ $lang->title }}
                                                </div>
                                            </div>
                                            @empty
                                            <p class="text-muted italic">Add languages in dashboard.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    
 @endsection

@extends('personal.app')
@section('title', 'Contact | ' . ($settings['site_name'] ?? env('APP_NAME')))
@section('content')

            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                
                                @if(session('success'))
                                <div class="alert alert-success rounded-4 mb-4">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('personal.contact.store') }}" method="POST">
                                    @csrf
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter your name..." value="{{ old('name') }}" required />
                                        <label for="name">Full name</label>
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="name@example.com" value="{{ old('email') }}" required />
                                        <label for="email">Email address</label>
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" value="{{ old('phone') }}" required />
                                        <label for="phone">Phone number</label>
                                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Enter your message here..." style="height: 10rem" required>{{ old('message') }}</textarea>
                                        <label for="message">Message</label>
                                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Submit Button-->
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg rounded-4 shadow-sm" type="submit">Send Message</button>
                                    </div>
                                </form>
                                
                                <!-- Contact Details from Settings -->
                                <div class="mt-5 pt-5 border-top text-center">
                                    <div class="row g-4">
                                        @if(isset($settings['site_email']))
                                        <div class="col-md-6">
                                            <div class="fw-bold text-primary mb-1">Email</div>
                                            <div>{{ $settings['site_email'] }}</div>
                                        </div>
                                        @endif
                                        @if(isset($settings['site_phone']))
                                        <div class="col-md-6">
                                            <div class="fw-bold text-primary mb-1">Phone</div>
                                            <div>{{ $settings['site_phone'] }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
@endsection

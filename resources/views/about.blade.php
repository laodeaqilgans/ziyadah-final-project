@extends('template.template') <!-- Using the main template -->

@section('title', 'About Us') <!-- Page title -->

@section('content')
    <!-- Hero Section -->
    <div class="container-fluid py-5 bg-gradient" id="about-us">
        <div class="row align-items-center">
            <!-- Hero Text -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-center text-lg-start">
                <h1 class="display-4 text-primary mb-4 animated fadeInLeft"><i class="fas fa-users"></i> About Us</h1>
                <p class="lead mb-4 text-muted animated fadeInLeft delay-1s">We are committed to helping you grow in your spiritual journey with the Ziyadah app. Discover who we are and what we believe in.</p>
                <a href="#our-mission" class="btn btn-primary btn-lg shadow-lg rounded-pill animated bounceIn"><i class="fas fa-info-circle"></i> Learn More</a>
            </div>
            <!-- Hero Image -->
            <div class="col-lg-6 col-md-12 text-center">
                <img src="{{ asset('images/card.jpg') }}" class="img-fluid rounded-lg shadow-lg" alt="About Us Hero Image">
            </div>
        </div>
    </div>

    <!-- Section Mission & Vision -->
    <div class="container my-5" id="our-mission">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="text-primary"><i class="fas fa-bullseye"></i> Our Mission & Vision</h2>
                <p class="lead text-muted">Ziyadah was created to serve the global Muslim community by providing tools to strengthen faith and devotion. Our app aims to bring a more connected and fulfilling spiritual experience.</p>
            </div>
        </div>

        <div class="row">
            <!-- Mission Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-bullseye fa-4x text-primary mb-4"></i>
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text text-muted">We aim to inspire Muslims worldwide to maintain a strong spiritual connection with their faith, encouraging consistent worship and spiritual growth.</p>
                    </div>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-eye fa-4x text-primary mb-4"></i>
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text text-muted">To become the leading platform for Muslims to enhance their daily worship and spiritual connection, while offering a seamless, digital experience in tracking their ibadah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container my-5 bg-light py-5 rounded-lg">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="text-primary mb-4"><i class="fas fa-users-cog"></i> Meet Our Team</h2>
                <p class="lead text-muted mb-5">Our team is passionate about helping you grow spiritually. Get to know the people who bring Ziyadah to life.</p>
            </div>
        </div>

        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg hover-shadow-lg">
                    <img src="{{ asset('images/team-1.jpg') }}" class="card-img-top rounded-lg" alt="Team Member 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Muhammad Zeeshan</h5>
                        <p class="text-muted">Frontend Developer</p>
                        <p class="text-muted">Muhammad is the driving force behind Ziyadah, with a vision to help Muslims connect spiritually through technology.</p>
                        <a href="mailto:muhammad.zeeshan@example.com" class="btn btn-primary"><i class="fas fa-envelope"></i> Contact</a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg hover-shadow-lg">
                    <img src="{{ asset('images/team-2.jpg') }}" class="card-img-top rounded-lg" alt="Team Member 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laode Aqila Rafif A</h5>
                        <p class="text-muted">Fullstack Developer & Team Lead</p>
                        <p class="text-muted">Laode leads the product team, ensuring the app's user experience is intuitive and user-friendly.</p>
                        <a href="mailto:laode.aqila@example.com" class="btn btn-primary"><i class="fas fa-envelope"></i> Contact</a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg hover-shadow-lg">
                    <img src="{{ asset('images/team-3.jpg') }}" class="card-img-top rounded-lg" alt="Team Member 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Muhammad Isa Arifin</h5>
                        <p class="text-muted">UI UX Designer</p>
                        <p class="text-muted">Muhammad Isa focuses on building relationships with the community and spreading the message of Ziyadah across the globe.</p>
                        <a href="mailto:muhammad.isa@example.com" class="btn btn-primary"><i class="fas fa-envelope"></i> Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="text-primary"><i class="fas fa-headset"></i> Contact Us</h2>
                <p class="lead text-muted">Have questions? We’d love to hear from you. Reach out to us through the form below.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="mailto:support@ziyadah.com" method="post" enctype="text/plain">
                    <div class="mb-3">
                        <label for="name" class="form-label"><i class="fas fa-user"></i> Your Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fas fa-envelope"></i> Your Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label"><i class="fas fa-comments"></i> Your Message</label>
                        <textarea class="form-control" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg rounded-pill"><i class="fas fa-paper-plane"></i> Send Message</button>
                </form>
            </div>
        </div>
    </div>

@endsection

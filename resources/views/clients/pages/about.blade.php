@extends('layouts.client')

@section('title', 'Về chúng tôi')
@section('breadcrumb', 'About Us')

@section('content')
    {{-- Breadcrumb --}}
    @include('clients.partials.breadcrumb')

    <!-- About Section Start -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="wow fadeInUp" data-wow-delay="0.1s">Welcome to Our Store</h2>
            <p class="wow fadeInUp" data-wow-delay="0.2s">
                We specialize in high-quality electronics including iPads, laptops, and Apple Watches.
                Our goal is to bring you the latest technology at the best prices.
            </p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                <h4>Our Mission</h4>
                <p>To deliver a fast, secure, and enjoyable shopping experience for all technology lovers.</p>
                <h4>Our Vision</h4>
                <p>To be the leading online destination for premium electronics in the region.</p>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <img src="{{ asset('img/about-us.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Client Feedback Start -->
    <div class="container-fluid bg-light py-5 mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="wow fadeInUp" data-wow-delay="0.1s">What Our Clients Say</h2>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Customer satisfaction is our top priority</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="border rounded p-4 bg-white shadow-sm">
                        <p>"Great service and fast delivery. I bought an iPad Mini and it arrived within two days!"</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="{{ asset('img/testimonial-1.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="mb-0">John Smith</h6>
                                <small>New York, USA</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="border rounded p-4 bg-white shadow-sm">
                        <p>"I love the quality and packaging. Definitely recommend for Apple Watch fans!"</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="{{ asset('img/testimonial-2.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small>London, UK</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="border rounded p-4 bg-white shadow-sm">
                        <p>"Amazing support team! Helped me choose the perfect laptop for my work."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="{{ asset('img/testimonial-3.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Client">
                            <div>
                                <h6 class="mb-0">David Lee</h6>
                                <small>Singapore</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Feedback End -->

    <!-- Some Questions Start -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4 text-center text-lg-start">Some Questions</h2>

                <div class="accordion" id="faqAccordion">
                    <!-- Question 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="false" aria-controls="a1">
                                How to buy a product?
                            </button>
                        </h2>
                        <div id="a1" class="accordion-collapse collapse" aria-labelledby="q1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Simply browse our catalog, choose the item you like, add it to your cart, and proceed to checkout.
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q2">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a2" aria-expanded="true" aria-controls="a2">
                                How can I make a refund from your website?
                            </button>
                        </h2>
                        <div id="a2" class="accordion-collapse collapse show" aria-labelledby="q2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('img/video-thumbnail.jpg') }}" alt="Refund guide" class="img-fluid rounded me-3" style="width: 120px;">
                                    <p class="mb-0">If you're unsatisfied with your purchase, contact our support within 7 days and we’ll process your refund.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                                I am a new user. How should I start?
                            </button>
                        </h2>
                        <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Create an account using your email, verify it, and you’re ready to start shopping.
                            </div>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a4" aria-expanded="false" aria-controls="a4">
                                Returns and refunds
                            </button>
                        </h2>
                        <div id="a4" class="accordion-collapse collapse" aria-labelledby="q4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Returns are accepted within 7 days for most products. Read our return policy for more details.
                            </div>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a5" aria-expanded="false" aria-controls="a5">
                                Are my details secured?
                            </button>
                        </h2>
                        <div id="a5" class="accordion-collapse collapse" aria-labelledby="q5" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! All personal and payment data is protected using SSL encryption and secure payment gateways.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/questions-bg.jpg') }}" class="img-fluid rounded" alt="FAQ illustration">
            </div>
        </div>
    </div>
    <!-- Some Questions End -->

@endsection

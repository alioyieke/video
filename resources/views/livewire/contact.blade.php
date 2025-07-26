<div>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact us</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Widget Section Begin -->
    <section class="contact-widget spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Address</h4>
                            <p>Los Angeles Gournadi, 1230 Bariasl</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Hotline</h4>
                            <p>1-677-124-44227 • 1-688-356-66889</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                    <div class="contact__widget__item">
                        <div class="contact__widget__item__icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact__widget__item__text">
                            <h4>Email</h4>
                            <p>Support@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Widget Section End -->

    <!-- Call To Action Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.808665729454!2d36.81768231475388!3d-1.2830363990559995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d71dcf0e91%3A0x4e377d182abc4a0f!2sNairobi%20Central%2C%20Nairobi%2C%20Kenya!5e0!3m2!1sen!2ske!4v1623760123456!5m2!1sen!2ske"
                            height="450" style="border:0;"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <h3>Get in touch</h3>
                        @if(session()->has('message'))
                            <div class="alert alert-success mb-4">
                                {{ session('message') }}
                            </div>
                        @endif
                         <form wire:submit.prevent="submit">
                            <div class="input__item">
                                <input type="text" 
                                    wire:model="name" 
                                    placeholder="Name"
                                    class="@error('name') is-invalid @enderror" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="input__item">
                                <input type="email" 
                                    wire:model="email" 
                                    placeholder="Email"
                                    class="@error('email') is-invalid @enderror" required>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="input__item">
                                <input type="tel" 
                                    wire:model="phone" 
                                    placeholder="Phone (optional)">
                            </div>

                            <div class="input__item">
                                <input type="url" 
                                    wire:model="website" 
                                    placeholder="Website (optional)"
                                    class="@error('website') is-invalid @enderror">
                                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="input__item">
                                <textarea wire:model="message" 
                                        placeholder="Message"
                                        class="@error('message') is-invalid @enderror" required></textarea>
                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="site-btn">
                                <span wire:loading.remove>Send Message</span>
                                <span wire:loading>Sending...</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section End -->
</div>

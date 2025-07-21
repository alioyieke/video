<?php

use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\Portfolio;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

Route::get('/', Home::class)->name('home');

Route::get('/about', About::class)->name('about');

Route::get('/contact', Contact::class)->name('contact');

Route::get('/portfolio', Portfolio::class)->name('portfolio');

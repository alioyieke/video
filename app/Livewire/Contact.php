<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inquiry;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $website;
    public $message;

    protected $rules = [
        'name' => 'required|min:1',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'website' => 'nullable|url',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Save inquiry to database
        $inquiry = Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'message' => $this->message,
        ]);

        // Send notification email
        // Mail::to(config('mail.from.address'))->send(new InquiryReceived($inquiry));

        // Reset form fields
        $this->reset(['name', 'email', 'phone', 'website', 'message']);

        // Show success message
        // session()->flash('message', 'Thank you for your inquiry! We will contact you soon.');
        return redirect('/contact')->with('message', 'Thank you for your inquiry! We will contact you soon.');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MultiFormProfile extends Component
{
    use WithFileUploads;
    
    public $currentPage = 0;

    public $full_name;
    public $bio;
    public $profile_pic;
    public $linkedin_url;
    public $optional;
    
    public $pages = [
        0 => [
            'heading' => 'Hi, can I help you create a new Profile?',
            'subheading' => 'It seems as you don\'t have one yet'
        ],
        1 => [
            'heading' => 'What\'s your name?!',
            'subheading' => 'This should be displayed on the home page.',
        ],
        2 => [
            'heading' => 'Tell me something about yourself',
            'subheading' => 'Don\'t worry you can take your time.',
        ],
        3 => [
            'heading' => 'Upload a profile picture',
            'subheading' => 'Smile!',
        ],
        4 => [
            'heading' => 'Do you have a LinkedIn Profile?',
            'subheading' => 'It\'s fine if you don\'t, this is an optional field',
        ],
        5 => [
            'heading' => 'Any quote or mantra that you live by?',
            'subheading' => 'Also optional, can fill this in later.',
        ],
        6 => [
            'heading' => 'And you\'re done now!',
            'subheading' => 'Go get em!!',
        ]
    ];

    private $validationRules = [
        1 => [
            'full_name' => ['required', 'min:6']
        ],
        2 => [
            'bio' => ['required', 'min:10']
        ],
        3 => [
            'profile_pic' => ['required', 'image']
        ],
        4 => [
            'linkedin_url' => ['nullable', 'url']
        ],
        5 => [
            'optional' => ['nullable']
        ]
    ];

    public function nextPage()
    {   
        if (isset($this->validationRules[$this->currentPage]))
        {
            $this->validate($this->validationRules[$this->currentPage]);
        }
        
        $this->currentPage++;
    }

    public function previousPage()
    {
        $this->currentPage--;
    }

    public function submitForm()
    {   
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        $profile = Profile::create([
            'user_id' => Auth::user()->id,
            'full_name' => $this->full_name,
            'bio' => $this->bio,
            'profile_pic' => $this->profile_pic->store('profiles'),
            'linkedin_url' => $this->linkedin_url,
            'optional' => $this->optional
        ]);

        session()->flash('profile_created', 'You created the profile!');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.multi-form-profile');
    }
}

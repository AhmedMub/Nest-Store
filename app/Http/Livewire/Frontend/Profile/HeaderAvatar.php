<?php

namespace App\Http\Livewire\Frontend\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderAvatar extends Component
{
    public $user;

    protected $listeners = [
        'avatarAddedSuccess' => '$refresh',
        'avatarGotRemoved' => '$refresh'
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.profile.header-avatar');
    }
}

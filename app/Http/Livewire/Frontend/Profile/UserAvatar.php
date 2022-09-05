<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserAvatar extends Component
{
    use WithFileUploads;
    public $user;
    public $avatar;

    protected $rules = [
        'avatar' => ['required', 'image', 'max:10000'],
    ];

    protected $messages = [
        'avatar.required' => 'Avatar Image is required',
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function updateAvatar()
    {
        $this->validate();
        $this->user->addMedia($this->avatar->getRealPath())
            ->withResponsiveImages()
            ->toMediaCollection('userAvatar');

        $this->dispatchBrowserEvent('ResetImage');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Avatar Updated Successfully'
        ]);
        $this->emit('avatarAddedSuccess');
    }
    public function removeAvatar()
    {
        if ($this->user->getFirstMediaUrl('userAvatar')) {
            $this->user->clearMediaCollection('userAvatar');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Avatar removed Successfully'
            ]);
            $this->emit('avatarGotRemoved');
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => 'Profile Does not Have Avatar'
        ]);
    }
    public function render()
    {
        return view('livewire.frontend.profile.user-avatar');
    }
}

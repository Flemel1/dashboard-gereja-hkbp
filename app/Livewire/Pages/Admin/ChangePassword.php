<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Validate([
        'password' => 'required'
    ], message: [
        'password.required' => 'Password harus diisi.',
    ])]
    public $password;

    public function save()
    {
        $this->validate();

        try {
            $userId = auth()->user()->id;
            $user = User::findOrFail($userId);

            $passwordHash = Hash::make($this->password);

            $user->password = $passwordHash;

            $user->save();

            $this->dispatch('password-saved', [
                'title' => 'Sukses',
                'message' => 'Password berhasil diubah'
            ]);

            $this->reset();
        } catch (ValidationException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            $this->dispatch('password-saved', [
                'title' => 'Error',
                'message' => 'Gagal mengubah password'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.change-password');
    }
}

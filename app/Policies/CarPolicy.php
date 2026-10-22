<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;

class CarPolicy
{
    public function before(User $user): ?bool
    {
        return $user->role === 'admin' ? true : null;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function update(User $user, Car $car): bool
    {
        return $user->role === 'editor' && $car->user_id === $user->id;
    }

    public function delete(User $user, Car $car): bool
    {
        return $this->update($user, $car);
    }
}
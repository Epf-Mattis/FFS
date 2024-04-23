<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Autres propriétés et méthodes du modèle...

    /**
     * Détermine si l'utilisateur est un administrateur.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        // Mettez en œuvre la logique pour déterminer si l'utilisateur est un administrateur,
        // par exemple en vérifiant un champ de rôle dans la base de données.
        // Dans cet exemple, nous supposons qu'un champ 'role' contient le rôle de l'utilisateur,
        // et que 'admin' est le rôle d'administrateur.
        return $this->role === 'admin';
    }
}


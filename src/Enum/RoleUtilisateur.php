<?php

namespace App\Enum;

enum RoleUtilisateur: string
{
    case Enseignant = 'enseignant';
    case VieScolaire = 'vie_scolaire';
    case Direction = 'direction';
    case Administrateur = 'administrateur';
}

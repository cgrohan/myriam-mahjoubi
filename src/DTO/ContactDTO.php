<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 30,
        minMessage:'Merci de vérifier votre prénom.',
        maxMessage:'Nous trouvons que la limite de {{ limit }} caractères est déjà beaucoup trop élévé.'
    )]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Length(
        min: 20,
        max: 1000,
        minMessage:'Merci d\'écrire plus d\'un mot, au moins {{ limit }} caractères.',
        maxMessage:'Merci de ne pas dépasser {{ limit }} caractères.'
    )]
    public string $message;
}
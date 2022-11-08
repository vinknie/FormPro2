<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class IsValidPassword implements Rule
{
    /** 
     * Valide la longueur du mot de passe.
     * 
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Valide la presence de majuscule 
     * 
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Valide la presence de chiffre
     * 
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Valide la presence de caracteres speciaux
     * 
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Deterine les regles de validation
     * 
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->lengthPasses = (Str::length($value) >= 8);
        $this->uppercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool)preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool)preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->lengthPasses && $this->uppercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    /**
     * Message d'erreur.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case !$this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'Le :attribute doit au moins contenir 8 caractères et une majuscule.';

            case !$this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return 'Le :attribute doit au moins contenir 8 caractères et un chiffre.';

            case !$this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return 'Le :attribute doit au moins contenir 8 caractères et un caractère spécial.';

            case !$this->uppercasePasses
                && !$this->numericPasses
                && $this->specialCharacterPasses:
                return 'Le :attribute doit au moins contenir 8 caractères, une majuscule et un chiffre.';

            case !$this->uppercasePasses
                && !$this->specialCharacterPasses
                && $this->numericPasses:
                return 'Le :attribute doit au moins contenir 8 caractères, une majuscule et un caratère spécial.';

            case !$this->uppercasePasses
                && !$this->numericPasses
                && !$this->specialCharacterPasses:
                return 'Le :attribute doit au moins contenir 8 caractères, une majuscule,un chiffre et un caratère spécial.';

            default:
                return 'Le :attribute doit au moins contenir 8 caractères.';
        }
    }
}

<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;
use Ramsey\Uuid\Uuid;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public string|Optional $id,
        public string $name,
        public string $email,
        //public DateTime|Optional $email_verified_at,
        public string $password,
        //public DateTime|Optional $remember_token,
        public DateTime|Optional $created_at,
        public DateTime|Optional $updated_at
    ) {

    }
}

<?php

namespace Modules\User\DataTransferObjects;

readonly class UserDTO
{
    public function __construct(
        public string  $first_name,
        public string  $last_name,
        public string  $email,
        public string  $phone,
        public ?string $password = null
    )
    {
    }
}

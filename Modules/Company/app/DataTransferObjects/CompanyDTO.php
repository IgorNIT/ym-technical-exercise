<?php

namespace Modules\Company\DataTransferObjects;

readonly class CompanyDTO
{
    public function __construct(
        public string  $title,
        public string  $phone,
        public string  $description,
        public int     $author_user_id,
    )
    {
    }
}

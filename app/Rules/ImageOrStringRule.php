<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class ImageOrStringRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value instanceof UploadedFile) {
            $ext = $value->getClientOriginalExtension();
            if (!in_array($ext, ['png', 'jpg', 'jpeg', 'webp'])) $fail("file type:{$ext} not valid");
            if($attribute == 'seo_image') if($value->getSize() > 300000) $fail("file size must be less than 300 kb");
        } else if (is_string($value)) {
        } else {
            $fail("image must be file or string");
        }
    }
}

<?php

namespace App\Enums;

enum QuestionType : string {
    case Multiple = 'Multiple Choice';
    case Blanks = 'Fill In The Blanks';
    case Short = 'Short Answer';
}

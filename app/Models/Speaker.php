<?php

namespace App\Models;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Speaker extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'qualifications' => 'array',
    ];

    public function conferences(): BelongsToMany
    {
        return $this->belongsToMany(Conference::class);
    }

    public static function getForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Textarea::make('bio')
                ->required()
                ->columnSpanFull(),
            TextInput::make('twitter_handle')
                ->required()
                ->maxLength(255),
            CheckboxList::make('qualifications')
                ->columnSpanFull()
                ->searchable()
                ->bulkToggleable()
                ->options(
                    [
                        'business-leader' => 'Business Leader',
                        'charisma' => 'Charismatic Speaker',
                        'first-time' => 'First Time Speaker',
                        'hometown-hero' => 'Hometown Hero',
                        'humanitarian' => 'Works in Humanitarian Field',
                        'laracasts-contributor' => 'Laracasts Contributor',
                        'twitter-influencer' => 'Large Twitter Following'
                    ]
                )
                ->descriptions([
                    'business-leader' => 'A nice description to show'
                ])
                ->columns(3)
        ];
    }
}
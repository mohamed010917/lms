<?php

namespace App\Filament\Admin\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\course ;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User ;
use Filament\Forms\Components\Select;
 
use App\Models\course_user ;
use App\Actions\ResetStars;
use Filament\Forms\Components\Actions\Action;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('courses')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('courses')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('descrption')->words(10) 
                ->lineClamp(2)
                ->wrap(),
                Tables\Columns\TextColumn::make('discriper'),
                Tables\Columns\TextColumn::make('Reviews')
                ->label('Reviews') 
                ->getStateUsing(function ($record) {
                    return $record->recomendCount / $record->recomendNum; 
                }),
            ])
            ->filters([
                
            ])
            ->headerActions([
                Tables\Actions\Action::make("Create")
                ->form([
                    Select::make('courseId')
                        ->label('course')
                        ->options(course::query()->pluck('name', 'id'))
                        ->required(),
                ])->action(function (array $data): void {
                   course_user::create([
                    'course_id'=>$data['courseId'],
                    'user_id'=> $this->ownerRecord->id
                ]);
                })
            ])
            ->actions([
                Tables\Actions\Action::make("remove")
                ->action(fn (course $record,User $user) 
                => course_user::where("user_id",$this->ownerRecord->id)
            ->where("course_id" , $record->id)->delete())
            ->requiresConfirmation()
            ->color('danger')
            
            ])
            ->bulkActions([

            ]);
    }
}

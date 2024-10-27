<?php

namespace App\Filament\Admin\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\section;
use Filament\Forms\Components\group;
use App\Models\User ;
use App\Models\course ;
use Filament\Forms\Components\Select;
 
use App\Models\course_user ;
use App\Actions\ResetStars;
use Filament\Forms\Components\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make("id")->sortable(),
                ImageColumn::make("image")->label(__("all.image"))->circular(),
                TextColumn::make("name")->label(__("all.name"))->searchable()->sortable(),
                TextColumn::make("email")->label(__("all.email"))->searchable(),
                TextColumn::make("pay")->label(__("all.bay"))->dateTime()->since() ,
                TextColumn::make("phone")->label(__("all.phone"))->searchable(),
                TextColumn::make("pyrthDay")->label(__("all.pyrthDay"))->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make("Create")
                ->form([
                    Select::make('userId')
                        ->label('course')
                        ->options(User::query()->pluck('name', 'id'))
                        ->required()->searchable(),
                ])->action(function (array $data): void {
                   course_user::create([
                    'user_id'=>$data['userId'],
                    'course_id'=> $this->ownerRecord->id
                ]);
                })
            ])
            ->actions([
                Tables\Actions\Action::make("remove")
                ->action(function (User  $record) 
               { 
                $course = $this->ownerRecord;
                course_user::where("user_id",$record->id)
                ->where("course_id" , $course ->id)->delete();
            })
            ->requiresConfirmation()
            ->color('danger')
            ])
            ->bulkActions([
            
            ]);
    }
}

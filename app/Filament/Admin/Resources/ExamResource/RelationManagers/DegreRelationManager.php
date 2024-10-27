<?php

namespace App\Filament\Admin\Resources\ExamResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User ;

class DegreRelationManager extends RelationManager
{
    protected static string $relationship = 'degre';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('degre')
                ->label(__("all.degre"))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('full')
                ->label(__("all.full"))
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('user_id')
                ->label(__("all.user"))
                    ->required()
                    ->options(User::query()->pluck("name","id"))->searchable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('dgre')
            ->columns([
                Tables\Columns\TextColumn::make('full')->label(__("all.full")),
                Tables\Columns\TextColumn::make('degre')->label(__("all.degre")),
                Tables\Columns\TextColumn::make('user.name')->label(__("all.user")),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

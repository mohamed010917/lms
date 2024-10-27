<?php

namespace App\Filament\Admin\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\exam;
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
                Forms\Components\Select::make('exam_id')
                ->label(__("all.exam"))
                    ->required()
                    ->options(exam::query()->pluck("name","id"))->searchable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('degre')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('exam.name'),
                Tables\Columns\TextColumn::make('degre'),
                Tables\Columns\TextColumn::make('full'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                
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

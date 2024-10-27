<?php

namespace App\Filament\Admin\Resources\ExamResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QustionRelationManager extends RelationManager
{
    protected static string $relationship = 'qustion';

    public function form(Form $form): Form
    { 
        // 'q',
        // 'answr1',
        // 'answr2',
        // 'answr3',
        // 'answr4',
        // 'right',
        // 'degre',
        return $form
            ->schema([
          
                     Forms\Components\TextInput::make('q')->label(__("all.qustion")) 
                     ->required()
                    ->maxLength(255),
                     Forms\Components\TextInput::make('right')->label(__("all.right")) 
                     ->required()
                    ->maxLength(255),
                     Forms\Components\TextInput::make('degre')->label(__("all.degre")) 
                     ->required()
                    ->numeric(),
                     Forms\Components\TextInput::make('answr1')->label(__("all.answr1"))
                      ->required()
                    ->maxLength(255),
                     Forms\Components\TextInput::make('answr2')->label(__("all.answr2"))
                      ->required()
                    ->maxLength(255),
                     Forms\Components\TextInput::make('answr3')->label(__("all.answr3")) 
                     ->required()
                    ->maxLength(255),
                     Forms\Components\TextInput::make('answr4')->label(__("all.answr4")) 
                     ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('q')
         
            ->columns([
                Tables\Columns\TextColumn::make('q')->label(__("all.qustion")),
                Tables\Columns\TextColumn::make('right')->label(__("all.right")),
                Tables\Columns\TextColumn::make('degre')->label(__("all.degre")),
                Tables\Columns\TextColumn::make('answr1')->label(__("all.answr1")),
                Tables\Columns\TextColumn::make('answr2')->label(__("all.answr2")),
                Tables\Columns\TextColumn::make('answr3')->label(__("all.answr3")),
                Tables\Columns\TextColumn::make('answr4')->label(__("all.answr4")),
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

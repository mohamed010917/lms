<?php

namespace App\Filament\Admin\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpesideRelationManager extends RelationManager
{
    protected static string $relationship = 'opeside';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name.en')
                    ->required()
                    ->maxLength(255)
                    ->label(__("all.nameen")),
                Forms\Components\TextInput::make('name.ar')
                    ->required()
                    ->maxLength(255)->label(__("all.namear")),
                Forms\Components\TextInput::make('descrption.en')
                    ->required()
                    ->maxLength(255)
                    ->label(__("all.descrptionen")),
                Forms\Components\TextInput::make('descrption.ar')
                    ->required()
                    ->maxLength(255) 
                     ->label(__("all.descrptionar")),
                Forms\Components\FileUpload::make('image')
                    ->required()
                     ->label(__("all.image"))->image(),
                Forms\Components\FileUpload::make('video')
                    ->required()
                     ->label(__("all.video"))  ->maxSize(51200) // تحديد الحد الأقصى بحجم 50 ميجابايت
                     ->acceptedFileTypes(['video/mp4', 'video/mov', 'video/avi', 'video/flv']) // تحديد نوع الملفات المقبولة
                     ->directory('uploads/videos'), // تحديد مسار الحفظ
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('opeside')
            ->columns([                
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('descrption')->searchable()->words(5)->wrap(),
                Tables\Columns\TextColumn::make('viwes'),
                Tables\Columns\TextColumn::make('Reviews')
                ->label('Reviews') 
                ->getStateUsing(function ($record) {
                    return floor(($record->recomendCount == 0 ? 1 : $record->recomendCount)
                     / ($record->recomendNum == 0 ? 1 : $record->recomendNum)); 
                }),
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

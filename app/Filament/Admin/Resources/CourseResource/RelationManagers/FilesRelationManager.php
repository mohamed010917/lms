<?php

namespace App\Filament\Admin\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use App\Models\file ;
use Illuminate\Support\Facades\Storage;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('type')->options([
                    "image"=>"image",
                    "pdf"=>"pdf",
                    "video"=>"video",
                ])
                    ->required(),
                Forms\Components\FileUpload::make('url')->label("file")
                    ->required()->directory("uplodes"),
                Forms\Components\TextInput::make('name')->label("name")
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type')
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('show')
                ->url(fn (file $record): string =>  Storage::url($record->url))
                ->openUrlInNewTab()->color("primary"),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('donelowed')
                ->action(function (file $record) {
                    return response()->download( storage_path('app/public/' .$record->url));
                })
                ->openUrlInNewTab()->color("success"),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

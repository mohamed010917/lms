<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CourseResource\Pages;
use App\Filament\Admin\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns;
use Filament\Forms\Components;
use App\Filament\Admin\Resources\CourseResource\RelationManagers\OpesideRelationManager;
use App\Filament\Admin\Resources\CourseResource\RelationManagers\UsersRelationManager;
use App\Filament\Admin\Resources\CourseResource\RelationManagers\FilesRelationManager;
class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static ?int $navigationSort  = 2; 
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    public static function getNavigationLabel(): string
    {
        return __("all.courses");
    }
    public static function getModelLabel(): string
        {
            return __("all.course"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.courses'); // هذا سيظهر كجمع في القائمة
        }
        


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // {RichEditor, Section, TextInput, DateTimePicker, Select}
                Components\TextInput::make("name.en")->required()->label(__("all.nameen")),
                Components\TextInput::make("name.ar")->required()->label(__("all.namear")),
                Components\TextInput::make("descrption.en")->required()->label(__("all.descrptionen")),
                Components\TextInput::make("descrption.ar")->required()->label(__("all.descrptionar")),
                Components\FileUpload::make("image"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([        
                Columns\TextColumn::make("id")->sortable(),
                Columns\TextColumn::make("name")->searchable()->sortable()->translateLabel(),
                Columns\ImageColumn::make("image"),
                Columns\TextColumn::make("descrption")->translateLabel()->searchable()->words(5)->wrap(),
                Columns\TextColumn::make("discriper"),
                Columns\TextColumn::make('Reviews')
                ->label('Reviews') 
                ->getStateUsing(function ($record) {
                    return floor(($record->recomendCount == 0 ? 1 : $record->recomendCount)
                     / ($record->recomendNum == 0 ? 1 : $record->recomendNum)); 
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OpesideRelationManager::class ,
            UsersRelationManager::class ,
            FilesRelationManager::class ,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
            'view' => Pages\viewCourse::route('/{record}/view'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            \App\Filament\admin\Resources\CourseResource\Widgets\course::class,
        ];
    }

}

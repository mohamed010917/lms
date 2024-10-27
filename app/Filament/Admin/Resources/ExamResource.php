<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ExamResource\Pages;
use App\Filament\Admin\Resources\ExamResource\RelationManagers;
use App\Models\exam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use App\Models\opeside;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Admin\Resources\ExamResource\RelationManagers\QustionRelationManager;
use App\Filament\Admin\Resources\ExamResource\RelationManagers\DegreRelationManager;
class ExamResource extends Resource
{
    protected static ?string $model = exam::class;
    protected static ?int $navigationSort  = 4; 
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public static function getNavigationLabel(): string
    {
        return __("all.exams");
    }
    public static function getModelLabel(): string
        {
            return __("all.exam"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.exams'); // هذا سيظهر كجمع في القائمة
        }
        

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\Textarea::make('descrption')
                    ->required(),
                Forms\Components\TextInput::make('time')
                    ->required()->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->required()->image(),
                Forms\Components\Select::make('opeside')
                ->options(opeside::query()->pluck("name","id"))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("name")->searchable()->sortable()
                ->label(__("all.name")),
                Tables\Columns\ImageColumn::make("image")
                ->label(__("all.image")),
                Tables\Columns\TextColumn::make("descrption")
                ->words(20)->wrap()->searchable()->label(__("all.descrption")),
                Tables\Columns\TextColumn::make("time")->date()->label(__("all.time")),
                Tables\Columns\TextColumn::make("opaside.name")->label(__("all.opeside")),
            ])
            ->filters([
                SelectFilter::make('opeside')
                ->relationship('opeside', 'name')
                ->searchable()
                ->preload() ->multiple()
                
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
            QustionRelationManager::class,
            DegreRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExams::route('/'),
            'create' => Pages\CreateExam::route('/create'),
            'edit' => Pages\EditExam::route('/{record}/edit'),
            'view' => Pages\view::route('/{record}/view'),
        ];
    }
}

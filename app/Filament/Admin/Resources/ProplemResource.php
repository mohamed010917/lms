<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProplemResource\Pages;
use App\Filament\Admin\Resources\ProplemResource\RelationManagers;
use App\Models\Proplem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProplemResource extends Resource
{
    protected static ?string $model = Proplem::class;
    protected static ?int $navigationSort  = 6; 
    public static function getNavigationLabel(): string
    {
        return __("all.proplems");
    }
    public static function getModelLabel(): string
        {
            return __("all.proplem"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.proplems'); // هذا سيظهر كجمع في القائمة
        }
        
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id"),
                Tables\Columns\TextColumn::make("titel")->label(__("all.proplem"))->wrap(),
                Tables\Columns\TextColumn::make("user.name")->label(__("all.user")),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
           ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function canCreate(): bool
    {
        return false; // تعطيل زر الإضافة
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProplems::route('/'),
        ];
    }
}

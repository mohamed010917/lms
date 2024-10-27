<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SettingResource\Pages;
use App\Filament\Admin\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?int $navigationSort  = 10; 
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    public static function getNavigationLabel(): string
    {
        return __("all.setting");
    }
    public static function getModelLabel(): string
        {
            return __("all.setting"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.setting'); // هذا سيظهر كجمع في القائمة
        }
        
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\FileUpload::make('logo')
            ]);
    }
    public static function canCreate(): bool
    {
        return false; // تعطيل زر الإضافة
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('phone'),
                Tables\Columns\TextInputColumn::make('email'),
                Tables\Columns\TextInputColumn::make('icone'),
                Tables\Columns\TextInputColumn::make('prandname'),
                Tables\Columns\TextInputColumn::make('amout'),
                Tables\Columns\TextInputColumn::make('years'),
                Tables\Columns\TextInputColumn::make('facebook'),
                Tables\Columns\TextInputColumn::make('watsapp'),
                Tables\Columns\TextInputColumn::make('linkedin'),
                Tables\Columns\ImageColumn::make('logo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
             
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

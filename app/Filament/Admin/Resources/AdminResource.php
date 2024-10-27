<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AdminResource\Pages;
use App\Filament\Admin\Resources\AdminResource\RelationManagers;
use App\Models\admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = admin::class;
    protected static ?int $navigationSort  = 0; 
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    public static function getNavigationLabel(): string
    {
        return __("all.admins");
    }
    public static function getModelLabel(): string
        {
            return __("all.admin"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.admins'); // هذا سيظهر كجمع في القائمة
        }
        

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                ->label(__("all.name"))
                ->required(),
                Forms\Components\TextInput::make("email")
                ->label(__("all.email"))
                ->email()
                ->required(),
                Forms\Components\TextInput::make("password")
                ->label(__("all.password"))
                ->password()
                ->required(),
                Forms\Components\FileUpload::make("image")
                ->label(__("all.image"))
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id"),
                Tables\Columns\ImageColumn::make("image")->label(__("all.image")),
                Tables\Columns\TextColumn::make("name")->label(__("all.name"))
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make("email")->label(__("all.email"))
                ->searchable()->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}

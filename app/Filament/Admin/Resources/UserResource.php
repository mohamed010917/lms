<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;
use App\Filament\Admin\Resources\UserResource\RelationManagers\CoursesRelationManager;
use App\Filament\Admin\Resources\UserResource\RelationManagers\DegreRelationManager;
use App\Filament\Admin\Resources\UserResource\RelationManagers\PayRelationManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\section;
use Filament\Forms\Components\group;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;

class UserResource extends Resource
{
  
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort  = 1; 
    public static function getNavigationLabel(): string
    {
        return __("all.users");
    }
    public static function getModelLabel(): string
        {
            return __("all.user"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.users'); // هذا سيظهر كجمع في القائمة
        }
        

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                group::make()
                ->schema([
                    section::make(__("all.informtion"))->schema([
                    Forms\Components\TextInput::make('name')
                    ->label(__('all.name')) // استخدام الترجمة هنا
                    ->required()->string(),
                    Forms\Components\TextInput::make('email')->required()->email(),
                    Forms\Components\TextInput::make('password')->required()->password(),
                    ])
                ]),
                group::make()->schema(
                    [
                        section::make(__("all.more"))->schema([
                            Forms\Components\TextInput::make('phone')->required(),
                            Forms\Components\DatePicker::make('pyrthDay')->required(),
                            Forms\Components\FileUpload::make('image')->image()->required(),
                            ]),
                    ]
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id")->sortable(),
                ImageColumn::make("image")->label(__("all.image"))->circular(),
                TextColumn::make("name")->label(__("all.name"))->searchable()->sortable(),
                TextColumn::make("email")->label(__("all.email"))->searchable(),
                TextColumn::make("pay")->label(__("all.bay"))->dateTime()->since() ,
                TextColumn::make("phone")->label(__("all.phone"))->searchable(),
                TextColumn::make("pyrthDay")->label(__("all.pyrthDay"))->searchable(),
            ])
            ->filters([
                Filter::make(__('all.paying'))
                ->query(fn (Builder $query): Builder => $query->where('pay', "!=" , null))
                ->toggle()
                ,
                Filter::make(__("all.notpaying"))
                ->query(fn (Builder $query): Builder => $query->where('pay', "=" , null))
                ->toggle()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Action::make('pay')
                ->requiresConfirmation()
                ->action(fn (User $record) => $record->update(["pay" =>now()]))
                ->color("success")
             ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]) ;
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
            PayRelationManager::class,
            DegreRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\viwUser::route('/{record}/view'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            \App\Filament\admin\Resources\UserResource\Widgets\StatsOverview::class,
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OpesideResource\Pages;
use App\Filament\Admin\Resources\OpesideResource\RelationManagers;
use App\Models\Opeside;
use App\Models\course;
use Filament\Forms;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\OpesideResource\RelationManagers\FilesRelationManager;
use App\Filament\Admin\Resources\OpesideResource\RelationManagers\ExamsRelationManager;
use App\Filament\Admin\Resources\OpesideResource\RelationManagers\CommentRelationManager;
class OpesideResource extends Resource
{
    protected static ?string $model = Opeside::class;
    protected static ?int $navigationSort  = 3; 
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    public static function getNavigationLabel(): string
    {
        return __("all.opesides");
    }
    public static function getModelLabel(): string
        {
            return __("all.opeside"); // هذا سيظهر في أعلى الصفحة كاسم الصفحة
        }
        public static function getPluralModelLabel(): string
        {
            return __('all.opesides'); // هذا سيظهر كجمع في القائمة
        }

    public static function form(Form $form): Form
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
                 ->label(__("all.video")) ->maxSize(51200) // تحديد الحد الأقصى بحجم 50 ميجابايت
                 ->acceptedFileTypes(['video/mp4', 'video/mov', 'video/avi', 'video/flv']) // تحديد نوع الملفات المقبولة
                 ->directory('uploads/videos'),
                 Forms\Components\Select::make("course_id")->label(__("all.course"))
                 ->options(
                    course::query()->pluck('name', 'id')
                 )->required()->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('course.name')->searchable()
                ->label(__("course") ),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('view_video')
                ->label(__('عرض الفيديو'))
                ->url(fn ($record) => Pages\video::getUrl(['record' => $record]))
                ->icon('heroicon-o-video-camera')
                ->color('primary'),
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
            FilesRelationManager::class ,
            ExamsRelationManager::class ,
            CommentRelationManager::class ,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOpesides::route('/'),
            'create' => Pages\CreateOpeside::route('/create'),
            'edit' => Pages\EditOpeside::route('/{record}/edit'),
            'view' => Pages\view::route('/{record}/view'),
            'video' => Pages\video::route('/{record}/video'),
        ];
    }
}

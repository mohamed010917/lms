<?php

namespace App\Filament\Admin\Resources\CourseResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\opeside ;
use Filament\Tables\Columns;
class opesidTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                opeside::query()
            )
            ->columns([
                Columns\TextColumn::make("id")->sortable(),
                Columns\TextColumn::make("name")->searchable()->sortable()->translateLabel(),
                Columns\ImageColumn::make("image"),
            ]);
    }
}

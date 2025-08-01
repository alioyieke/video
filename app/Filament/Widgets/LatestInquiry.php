<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiry extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Inquiry::query()
                    ->latest()
                    ->take(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Client Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(60)
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ]);
    }
}

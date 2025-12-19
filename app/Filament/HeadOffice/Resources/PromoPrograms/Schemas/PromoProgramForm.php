<?php

namespace App\Filament\HeadOffice\Resources\PromoPrograms\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

class PromoProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Promo')
                    ->description('Pengaturan umum periode dan status promo')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Promo')
                            ->placeholder('Contoh: Promo Tutup Botol Q1')
                            ->required(),

                        DatePicker::make('starts_at')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->required(),

                        DatePicker::make('ends_at')
                            ->label('Tanggal Selesai')
                            ->native(false)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Status Promo')
                            ->inline(false)
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Promo Rate per Produk')
                    ->description('Nominal klaim untuk setiap produk dalam promo ini')
                    ->schema([
                        Repeater::make('promoRates')
                            ->relationship()
                            ->label('Daftar Produk & Nominal Klaim')
                            ->columns(3)
                            ->schema([
                                Select::make('product_id')
                                    ->label('Produk')
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->disableOptionWhen(function ($value, $state, $get) {
                                        $selectedProducts = collect($get('../../promoRates'))
                                            ->pluck('product_id')
                                            ->filter()
                                            ->toArray();

                                        return in_array($value, $selectedProducts) && $value !== $state;
                                    }),

                                TextInput::make('amount_per_item')
                                    ->label('Nominal / Item')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->placeholder('Contoh: 20.000')
                                    ->required(),
                            ])
                            ->addActionLabel('Tambah Produk Promo')
                            ->minItems(1)
                            ->required()
                            ->reorderable(false)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                $state['product_id']
                                    ? 'Produk ID: ' . $state['product_id']
                                    : 'Produk Baru'
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

<?php

namespace App\Filament\Admin1\Resources;

use App\Filament\Admin1\Resources\ResepResource\Pages;
use App\Filament\Admin1\Resources\ResepResource\RelationManagers;
use App\Models\Resep;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ResepResource extends Resource
{

    //  public static function getEloquentQuery(): Builder
    // {
    //     // Hanya tampilkan resep dengan status 'pending'
    //     // SELECT * from resep where status = 'pending';

    //     return parent::getEloquentQuery()->where('status', 'pending');
    // }
    protected static ?string $model = Resep::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama_resep')->required(),
            TextInput::make('deskripsi'),
            TextInput::make('bahan'),
            TextInput::make('langkah'),
            TextInput::make('waktu_pembuatan'),
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    
                ])
                ->required(),
            // Tambahkan field lain sesuai kebutuhan
        ]);
    }

    


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_resep')->label('Nama Resep'),
            Tables\Columns\TextColumn::make('deskripsi')->limit(30),
            Tables\Columns\TextColumn::make('bahan')->limit(30),
            Tables\Columns\TextColumn::make('status')->badge(),
        ])
        ->filters([

//             SELECT
//     id,
//     nama_resep,
//     deskripsi,
//     bahan,
//     langkah,
//     waktu_pembuatan,
//     status
// FROM resep
// WHERE status = 'pending' -- atau status = 'approved' jika filter diubah
// ORDER BY id DESC;
            
            Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    
                ])
                ->default('pending'),
        ])
        ->actions([

//             SELECT
//     id,
//     nama_resep,
//     deskripsi,
//     bahan,
//     langkah,
//     waktu_pembuatan,
//     status
// FROM resep
// ORDER BY id DESC;

            Tables\Actions\DeleteAction::make(),
            Tables\Actions\Action::make('approve')
                ->label('Approve')
                ->color('success')
                ->icon('heroicon-o-check')
                ->action(function ($record) {
                    $record->status = 'approved';
                    $record->save();
                }),
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
            'index' => Pages\ListReseps::route('/'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Pricing;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Costumer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Wizard::make([
                    Step::make('Product and Price')
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            Select::make('pricing_id')
                            ->relationship('pricing', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $pricing = Pricing::find($state);

                                $price = $pricing->price;
                                $duration = $pricing->duration;

                                $subTotal = $price * $state;
                                $totalPpn = $subTotal * 0.12;
                                $totalAmount = $subTotal + $totalPpn;

                                $set('total_tax_amount', $totalPpn);
                                $set('grand_total_amount', $totalAmount);
                                $set('sub_total_amount', $price);
                                $set('duration', $duration);
                            })
                            ->afterStateHydrated(function (callable $set, $state) {
                                $pricingId = $state;
                                if ($pricingId) {
                                    $pricing = Pricing::find($pricingId);
                                    $duration = $pricing->duration;
                                    $set('duration', $duration); 
                                }
                            }),

                            TextInput::make('duration')
                            ->required()
                            ->numeric()
                            ->readOnly()
                            ->prefix('Months'),
                        ]),

                        Grid::make(3)
                        ->schema([
                            TextInput::make('sub_total_amount')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->readOnly(),

                            TextInput::make('total_tax_amount')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->readOnly(),

                            TextInput::make('grand_total_amount')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->readOnly()
                            ->helperText('Harga sudah include PPN 12%'),
                        ]),

                        Grid::make(2)
                        ->schema([
                            DatePicker::make('started_at')
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $duration = $get('duration');
                                if ($duration) {
                                    if ($state && $duration) {
                                        $endedAt = Carbon::parse($state)->addMonth($duration);
                                        $set('ended_at', $endedAt->format('Y-m-d'));
                                    }
                                }
                            })
                            ->required(),

                            DatePicker::make('ended_at')
                            ->readOnly()
                            ->required(),
                        ]),
                    ]),


                    Step::make('Customer Information')
                    ->schema([
                        Select::make('user_id')
                        ->relationship('student', 'email')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $user = User::find($state);

                            $name = $user->name;
                            $email = $user->email;

                            $set('name', $name);
                            $set('email', $email);
                        })
                        ->afterStateHydrated(function (callable $set, $state) {
                            $userId = $state;
                            if ($userId) {
                                $user = User::find($userId);
                                $name = $user->name;
                                $email = $user->email;
                                $set('name', $name);
                                $set('email', $email);
                            }
                        }),

                        TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->readOnly(),

                        TextInput::make('email')
                        ->required()
                        ->maxLength(255)
                        ->readOnly(),
                    ]),

                    Step::make('Payment Information')
                    ->schema([
                        ToggleButtons::make('is_paid')
                        ->label('Apakah sudah dibayar?')
                        ->boolean()
                        ->grouped()
                        ->icons([
                            true => 'heroicon-o-check-circle',
                            false => 'heroicon-o-x-circle',
                        ])
                        ->required(),
                        
                        Select::make('payment_type')
                        ->options([
                            'Midtrans' => 'Midtrans',
                            'Manual' => 'Manual',
                        ])
                        ->required(),

                        FileUpload::make('proof')
                        ->image(),
                    ]),
                ])
                ->columnSpan('full')
                ->columns(1)
                ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                ImageColumn::make('student.photo')
                ->circular(),

                TextColumn::make('student.name')
                ->searchable(),

                TextColumn::make('booking_trx_id')
                ->searchable(),

                TextColumn::make('pricing.name'),

                IconColumn::make('is_paid')
                ->boolean()
                ->trueColor('success')
                ->falseColor('danger')
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->label('Status Pembayaran'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approve')
                ->label('Approve')
                ->action(function (Transaction $record) {
                    $record->is_paid = true;
                    $record->save();

                    Notification::make()
                    ->title('Pembayaran berhasil diapprove')
                    ->success()
                    ->body('Pembayaran untuk transaksi ' . $record->booking_trx_id . ' telah berhasil diapprove.')
                    ->send();
                })
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn (Transaction $record) => !$record->is_paid),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

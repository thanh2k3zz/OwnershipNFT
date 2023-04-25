@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row block-item">
            <div class="col-md-6 info-item">
                <h4>From Address (Inputs)</h4>
                <ul>

                    <?php
                    $i = 0;
                    ?>
                    @foreach ($view_detail_utxos->inputs as $itemOut)
                        <div class="utxo">

                            <li>
                                <h5>Address</h5>
                                <p>{{ $itemOut->address }}</p>
                            </li>
                            @foreach ($itemOut->amount as $itemIn)
                                @if ($itemIn->quantity == 1)
                                    <h5><span>{{ $token_names_input[$i] }}</span></h5>
                                    <?php
                                    $i++;
                                    ?>
                                @else
                                    <li>
                                        <h5>Quantity</h5>
                                        <h5><span>{{ $itemIn->quantity / 1000000 }} ADA</span></h5>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    @endforeach

                    <li>
                        <h5>Total Inputs</h5>
                        <p>{{ $total_input / 1000000 }} ADA</p>
                    </li>


                </ul>
            </div>
            <?php
            $j = 0;
            ?>

            <div class="col-md-6 info-item">
                <h4>To Address (Outputs)</h4>
                <ul>
                    @foreach ($view_detail_utxos->outputs as $itemOut)
                        <div class="utxo">

                            <li>
                                <h5>Address</h5>
                                <p>{{ $itemOut->address }}</p>
                            </li>
                            @foreach ($itemOut->amount as $itemIn)
                                @if ($itemIn->quantity == 1)
                                    <h5><span>{{ $token_names_output[$j] }}</span></h5>
                                    <?php
                                    $j++;
                                    ?>
                                @else
                                    <li>
                                        <h5>Quantity</h5>
                                        <h5><span>{{ $itemIn->quantity / 1000000 }} ADA</span></h5>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    @endforeach

                    <li>
                        <h5>Total Outputs</h5>
                        <p>{{ $total_output / 1000000 }} ADA</p>
                    </li>


                </ul>
            </div>



        </div>
    </div>
@endsection

@push('utxos')
    <link rel="stylesheet" href="{{ url('assets/css/utxos.css') }}">
@endpush

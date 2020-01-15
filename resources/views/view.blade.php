@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">INVENTORY</div>
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="index-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">DETAILS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> NAME:</td>
                                            <td>
                                                {{ $item->owner_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> EMAIL:</td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ITEM:</td>
                                            <td>
                                                {{ $item->item_type }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>S/N:</td>
                                            <td>
                                                {{ $item->item_serial }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ./ ROW -->

                    <div class="row">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">QR CODE TO BORROW</div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        {!! QrCode::size(250)->generate($item->email); !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- ./ ROW -->

            </div>
        </div>
    </div>
</div>
</div>
@endsection

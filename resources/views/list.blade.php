@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- DATA TABLE FOR LOGS -->
            <div class="row">
                <div class="container">
                    <h1>LOG</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="index-table" width="100%">
                            <thead>
                                <tr>
                                    <th>Owner Name</th>
                                    <th>Owner Email</th>
                                    <th>Item Borrowed</th>
                                    <th>Borrower Email</th>
                                    <th>Date Borrowed</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('content-extra')
<script>
    $(function () {

        var table = $('#index-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.log') }}",
            columns: [
                {data: 'history_email', name: 'history_email'},
                {data: 'owner_name', name: 'owner_name'},
                {data: 'owner_email', name: 'owner_email'},
                {data: 'item_type', name: 'item_type'},
                {data: 'item_serial', name: 'item_serial'}
            ]
        });

      });
</script>
@endsection

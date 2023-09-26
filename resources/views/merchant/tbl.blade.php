<table class="table table-hover">
    <thead>
        <tr role="row">
            <th class="sorting sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1"
                style="" aria-sort="ascending" aria-label="Order ID: activate to sort column descending">#</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Sender Name</th>

            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Ship Address: activate to sort column ascending">Amount</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Country: activate to sort column ascending"> Balance Before </th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Balance After</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Entered Deduction </th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Fixed Deduction </th>




            <th class="sorting " tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1"
                style="" aria-label="Company Name: activate to sort column ascending">Date</th>






        </tr>
    </thead>
    <tbody class="text-center">
        @forelse     ($transfers as $transfer)
            <tr>
                <td> {{ $loop->index + 1 }} </td>
                <td>{{ $transfer->user->full_name }}</td>
                <td>{{ $transfer->amount }}</td>
                <td>{{ $transfer->merchant_balance_before }}</td>
                <td>{{ $transfer->merchant_balance_after }}</td>
                <td>{{ $transfer->deduction_entered }} % </td>
                <td>{{ $transfer->deduction_fixed }} %</td>
                <td>{{ $transfer->created_at->diffforhumans() }} </td> 
            </tr>
        @empty
            <tr>
                <td colspan="8">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $transfers->links() }}

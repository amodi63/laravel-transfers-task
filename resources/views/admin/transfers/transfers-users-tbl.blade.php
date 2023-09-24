<table class="table table-hover">
    <thead>
        <tr role="row">
            <th class="sorting sorting_asc" tabindex="0" aria-controls="kt_datatable"
                rowspan="1" colspan="1" style="" aria-sort="ascending"
                aria-label="Order ID: activate to sort column descending">#</th>
                <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                    colspan="1" style=""
                    aria-label="Country: activate to sort column ascending">Merchant Name</th>
            
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Merchant  Acount</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Marchant B. Before</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Marchant B.  After</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Entered Deduction </th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Country: activate to sort column ascending">Fixed Deduction </th>
            
          
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Ship Address: activate to sort column ascending"> Wallet Before</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Ship Address: activate to sort column ascending"> Wallet After</th>
          
        
            <th class="sorting " tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Company Name: activate to sort column ascending">Code</th>
            <th class="sorting " tabindex="0" aria-controls="kt_datatable" rowspan="1"
                colspan="1" style=""
                aria-label="Company Name: activate to sort column ascending">Created</th>
            





        </tr>
    </thead>
    <tbody class="text-center">
        @forelse     ($transfers as $transfer)
        <tr>
            <td>{{ $transfer->id }}</td>
            <td>{{ $transfer->merchant->full_name }}</td>
            <td>{{ $transfer->amount }}</td>
            <td>{{ $transfer->wallet_balance_before }}</td>
            <td>{{ $transfer->wallet_balance_after }}</td>
            <td>
                    
                    <a href="javascript:;" data-id="{{ $transfer->id }}" data-url="{{ route('transfers.destroy', $transfer->id) }}" class="btn btn-sm btn-danger userDelBtn"><i class="fa fa-trash"></i></a>
                
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No data found</td>
        </tr>
       @endforelse
    </tbody>
</table>

{{ $transfers->links() }}
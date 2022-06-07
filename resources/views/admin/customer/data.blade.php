<table  class="table table-striped table-bordered table-hover">
    <thead>
        <tr role="row" class="heading">
            <th width="5%">
                    No
            </th>
            <th width="15%">
                    Name
            </th>
            <th width="35%">
                    Adddress
            </th>
            <th width="10%">
                    Phone Number
            </th>
            <th width="20%">
                    Date Registered
            </th>
            <th width="15%">
                    Action
            </th>
        </tr>
    </thead>
    <tbody>
    @if($customer->count() > 0)
        @foreach($customer as $item)
        <tr>
            <td>
                {{ $loop->iteration}}
            </td>
            <td>
                {{ $item->name}}
            </td>
            <td>
                {{ $item->address}}
            </td>
            <td>
                {{ $item->phone}}
            </td>
            <td>
                {{ $item->created_at }}
            </td>
            <td>
                <a class="btn btn-warning btn-sm" type="button" data-toggle="tooltip"  title="Edit"  href="{{ url('admin/customer/'.$item->id.'/edit') }}"><i class='fa fa-pencil'></i> </a>
                <a href='javascript:void(0);' data-toggle="tooltip"  title="Delete" onclick="hapusid(`{{ $item->id }}`)" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" align="center">Data Not Found</td>
        </tr>
    @endif
    </tbody>
</table>
{{ $customer->links() }}
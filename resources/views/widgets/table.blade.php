<table {!! $attributes !!}>
    <thead>
    <tr>
        @foreach($headers as $header)
            <th>{{ $header }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
    <tr>
        @foreach($row as $item)
        <td>{!! $item !!}</td>
        @endforeach
    </tr>
    @endforeach
    @if (empty($rows))
        <tr>
            <td valign="top" class="dataTables_empty" colspan="{!! count($headers) !!}">
                {{ trans('admin.no_data') }}
            </td>
        </tr>
    @endif
    </tbody>
</table>

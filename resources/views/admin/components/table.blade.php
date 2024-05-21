<div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-description text-capitalize text-center font-weight-bolder text-dark">
                    {{ $tableName }} List
                </div>
                <div class="table-responsive">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="20"
                        width="100%">
                        <thead>
                            <tr>
                                @foreach ($columns as $column)
                                    <th class="th-sm text-capitalize">{{ $column }}</th>
                                @endforeach
                                <th class="th-sm text-capitalize">Edit</th>
                                @if ($tableName != 'orders')
                                    <th class="th-sm text-capitalize">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    @for ($i = 0; $i < count($columns); $i++)
                                        <td style="max-width: 300px;" data-toggle="tooltip"
                                            title="{{ $content[$columns[$i]] }}" class="py-1 text-truncate">
                                            {{ $content[$columns[$i]] }}
                                        </td>
                                    @endfor
                                    <td class="th-sm"><a
                                            href="/{{ $loginType ?? 'admin' }}/{{ $tableName }}/{{ $content['id'] }}"><button
                                                class="btn btn-primary">Edit</button></a>
                                    </td>
                                    @if ($tableName != 'orders')
                                        <td class="th-sm"><a
                                                href="/{{ $loginType ?? 'admin' }}/{{ $tableName }}/delete/{{ $content['id'] }}"><button
                                                    class="btn btn-danger">Delete</button></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                @foreach ($columns as $column)
                                    <th class="th-sm text-capitalize">{{ $column }}
                                    </th>
                                @endforeach
                                <th class="th-sm text-capitalize">Edit</th>
                                @if ($tableName != 'orders')
                                    <th class="th-sm text-capitalize">Delete</th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($tableName == 'orders')
    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                destroy: true,
                order: [
                    [0, 'desc']
                ],
            })
        });
    </script>
@endif

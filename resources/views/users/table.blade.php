<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped default">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-7">
        </colgroup>
        <thead>
        <tr>
            <th><code>#</code></th>
            <th>Nama/Username</th>
            <th>Email</th>
            <th>Akses</th>
            <th style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($users as $items)
            <tr>
                <td>{!! $no++ !!}</td>
                <td>
                    <span class="text-bold-800 black">{!! $items->name !!}</span><br>
                    {!! $items->username !!}
                </td>
                <td>
                    {!! $items->email !!}
                </td>
                <td>
                    @foreach($items->roles as $item)
                        <span class="badge badge-primary" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                    @endforeach
                </td>
                <td>
                    @include('users.modal.detail')
                    {!! Form::open(['route' => ['users.destroy', $items->id], 'method' => 'delete']) !!}
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

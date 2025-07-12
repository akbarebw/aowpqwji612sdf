<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped default" id="pages-table">
            <thead>
            <tr>
                <th>Judul (Bahasa Indonesia)</th>
                <th>Content (Bahasa Indonesia)</th>
                <th>Custom Url</th>
                <th>Page Category</th>
                <th>Order</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->judul_id }}</td>
                    <td><p class="desc-p">{!! strip_tags($page->content_id,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') !!}</p></td>
                    <td>{{ $page->custom_url }}</td>
                    <td>{{ $page->pageCategory->name }}</td>
                    <td>{{ $page->order }}</td>
                    <td  style="width: 120px">
                        <div class='btn-group'>
                            <a href="{{ route('pages.show', [$page->id]) }}"
                               class='btn btn-info btn-sm'>
                                <i class="fa fa-eye"></i>
                            </a>
                            @can('pages.edit')
                            <a href="{{ route('pages.edit', [$page->id]) }}"
                                   class='btn btn-warning btn-sm'>
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('pages.destroy')
                            {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $pages])
        </div>
    </div>
</div>

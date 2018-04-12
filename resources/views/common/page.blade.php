@if ($paginator->hasPages())
    <ul class="pagination" style="width: 100%">
        <li style="margin-left: 30px;border: 0 " class="pull-left">
        @if( $paginator->onFirstPage() )
                <a href="javascript:;" rel="next">上一页</a></li>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="next">上一页</a></li>
        @endif

        @if ($paginator->hasMorePages() )
            <li style="margin-right: 30px;border: 0 " class="pull-right"><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
        @else
            <li style="margin-right: 30px;border: 0 " class="pull-right"><a href="javascript:;" rel="next">下一页</a></li>
        @endif
    </ul>
@endif
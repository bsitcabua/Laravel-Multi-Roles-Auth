
@if(!isset($paginator))
    @php
        $paginator = array();
    @endphp
@endif
{{-- {{ var_dump($paginator) }} --}}
@if ($paginator->hasPages())
    <div class="float-left">Total of {{ $paginator->total() }} entries</div>
    @php
    // maximum number of links (a little bit inaccurate, but will be ok for now)
    $link_limit = 7;
    @endphp
    <div class="float-right">
        <ul class="pagination">
            <li class="mr-2 page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}">First</a>
            </li>
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}"><em class="fa fa-caret-left"></em></a>
            </li>
            {{-- Put a dot --}}
            @if($paginator->currentPage() >= 4 && $paginator->lastPage() > $link_limit)
                <li class="page-item">
                    <a class="page-link disabled">...</a>
                </li>
            @endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                    $half_total_links = floor($link_limit / 2);
                    $from = $paginator->currentPage() - $half_total_links;
                    $to = $paginator->currentPage() + $half_total_links;
                    if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            {{-- Put a dots --}}
            @if($paginator->currentPage() <= $paginator->lastPage() - 4 && $paginator->lastPage() > $link_limit)
                <li class="page-item">
                    <a class="page-link disabled">...</a>
                </li>
            @endif
            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" disabled="true">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}"><em class="fa fa-caret-right"></em></a>
            </li>
            <li class="ml-2 page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
            </li>
        </ul>
    </div>
@endif
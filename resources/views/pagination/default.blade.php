@if ($paginator->lastPage() > 1)
<div class="paginateDivWrapper">
<div class="paginateDiv">
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}">Previous</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
        </li>
    </ul>
</div>
</div>
<script>
    $(".paginateDiv ul li.disabled a").removeAttr("href");
    $(".paginateDiv ul li.active a").removeAttr("href");
</script>
@endif
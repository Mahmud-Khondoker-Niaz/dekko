{{-- @if ($paginator->lastPage() > 1)

      <div class="pagination-box">
			<ul class="list-inline">
			    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
			        <a href="{{ $paginator->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
			    </li>
			    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
			        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
			            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
			        </li>
			    @endfor
			    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
			        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="fa fa-angle-double-right"></i></a>
			    </li>

                {{$paginator->onEachSide(1)->links()}}
			</ul>

	</div>




@endif --}}
{{--New version of pagination--}}

@if ($paginator->hasPages())
    <div class="pagination-box">
        <ul class="list-inline">


            <li class="{{ $paginator->currentPage() == 1 ? ' disabled' : '' }}">
                <a href="{{ $paginator->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
            </li>

            @if ($paginator->currentPage() > 3)
                <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            @if ($paginator->currentPage() > 4)
                <li><span>.......</span></li>
            @endif
            @foreach (range(1, $paginator->lastPage()) as $i)
                @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach
            @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                <li><span>...</span></li>
            @endif
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="hidden-xs"><a
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right"></i></a>
                </li>
            @else
                <li class="disabled"><span>»</span></li>
            @endif
        </ul>
    </div>
@endif

 
@if ($paginator->hasPages())
<div class="db-pagi">
  @if ($paginator->onFirstPage())
    <span class="db-pagi__btn db-pagi__btn--disabled">←</span>
  @else
    <a href="{{ $paginator->previousPageUrl() }}" class="db-pagi__btn">←</a>
  @endif

  @foreach ($elements as $element)
    @if (is_string($element))
      <span class="db-pagi__btn db-pagi__btn--disabled">{{ $element }}</span>
    @endif
    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <span class="db-pagi__btn db-pagi__btn--active">{{ $page }}</span>
        @else
          <a href="{{ $url }}" class="db-pagi__btn">{{ $page }}</a>
        @endif
      @endforeach
    @endif
  @endforeach

  @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="db-pagi__btn">→</a>
  @else
    <span class="db-pagi__btn db-pagi__btn--disabled">→</span>
  @endif
</div>
@endif

<div class="d-flex justify-content-end mt-3">
    <nav aria-label="Page navigation example">
        @if ($paginator->lastPage() > 1)
        <ul class="pagination justify-content-end">
          <li class="page-item {{ ($paginator->currentPage() == 1) ? 'd-none' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}">
              <i class="fa fa-angle-left"></i>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          @for ($i = 1; $i <= $paginator->lastPage(); $i++)
          <li class="page-item"><a href="{{ $paginator->url($i) }}" class="page-link {{ ($paginator->currentPage() == $i) ? 'active text-white' : '' }}"">{{ $i }}</a></li>
          @endfor
          <li class="page-item {{ $paginator->currentPage() === $paginator->lastPage() ? 'd-none' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}">
              <i class="fa fa-angle-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
        @endif
      </nav>
</div>

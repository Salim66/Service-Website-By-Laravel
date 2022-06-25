<div class="row">
    <div class="col">
        @if($paginator->hasPages())
        <ul class="clearfix">
        @if($paginator->onFirstPage())

        @else
          <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><span class="flaticon-back"></span> </a></li>
        @endif


          @foreach ($elements as $element)
            @if(is_array($element))
            @foreach ($element as $page => $url)
                @if($paginator->currentPage() == $page)
                <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
            @endif
          @endforeach

          @if($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><span class="flaticon-right-arrow"></span> </a></li>
          @endif
        </ul>

 @endif
    </div>
 </div>




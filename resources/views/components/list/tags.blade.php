
<ul class="list-group @if(count($transactionTags) >= 1) mb-2 @else mb-1 @endif">
    @isset($transactionTags)
        @foreach($transactionTags as $tag)
            <li class="list-group-item bg-dark border border-primary  @if($loop->odd && $loop->count >= 2) border-bottom-0 @endif">
                <div class="d-flex w-100 justify-content-between">
                    <span>{{ ucfirst($tag->name) }}</span>
                    <a class="btn btn-sm btn-danger" href="/transaction/delete/tag/{{ $tag->transaction_tag_id }}">Remove</a>
                </div>
            </li>
        @endforeach
    @endisset
</ul>

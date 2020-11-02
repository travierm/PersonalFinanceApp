<select
    class="form-control"
    name="tag_id"
    value="{{ (isset($tagId) ? $tagId : '') }}"

    @if(isset($submitOnChange) && $submitOnChange === true)
        onchange="this.form.submit()"
    @endif
>
    @if($tags)
        @foreach($tags as $tag)
            <option
                value="{{ $tag->id }}"
                @if($tag->id == @$tagId) selected @endif
            >
                {{ ucfirst($tag->name) }}
            </option>
        @endforeach
    @endif
</select>

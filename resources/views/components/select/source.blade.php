<select
    class="form-control"
    name="source_id"
    value="{{ (isset($sourceId) ? $sourceId : '') }}"

    @if(isset($submitOnChange) && $submitOnChange === true)
        onchange="this.form.submit()"
    @endif
>
    <option value="">None</option>
    @if($sources)
        @foreach($sources as $source)
            <option
                value="{{ $source->id }}"
                @if($source->id == $sourceId) selected @endif
            >
                {{ ucfirst($source->name) }}
            </option>
        @endforeach
    @endif
</select>

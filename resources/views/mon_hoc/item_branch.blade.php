@foreach($nganh as $item)
    <option value="{{ $item->id }}">{{  $item->ten_nganh }}</option>
@endforeach
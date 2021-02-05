
<h1>Invoice Details</h1>
<a href="{{ URL::to('/posIndex/pdf') }}">Export PDF</a>
<hr>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Phone</th>
    </tr>
  </thead>
  <tbody>
    {{-- @foreach($datas as $data) --}}
      <tr>
        <td>{{ $datas->name }}</td>
        <td>{{ $datas->phone }}</td>
      </tr>
    {{-- @endforeach --}}
  </tbody>
</table>
<table>
  <thead>
      <tr>
          <th>Product</th>
          <th>Quantity</th>
      </tr>
  </thead>
  <tbody>

    @foreach($datasDescriptions as $datasDescription)
      <tr>
      <td>{{$datasDescription->product}}</td>
      <td>{{$datasDescription->quantity}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
<table>
    <thead>
        <tr>
            <th>Total</th>
            <th>{{ $datas->total }}</th>
        </tr>

    </thead>
</table>
<script>
window.onload = function() {
    //considering there aren't any hashes in the urls already
    if(!window.location.hash) {
        //setting window location
        window.location = window.location + '#loaded';
        //using reload() method to reload web page
        window.location.reload();
    }
}
</script>

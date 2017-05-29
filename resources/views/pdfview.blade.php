<!DOCTYPE html>
<html>
<head>
  <title></title>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bulma.css">
</head>
<body>
<div class="box">
  @foreach($invoices as $invoice)
    <div>
        <p>
          <label class="label">Invoice Name</label>

            {{ $invoice->invoice_name }}
        </p>
    </div>
  @endforeach
  <div id="app">
    <table class="table">
      <thead>
        <tr>
          <th><strong>Item Name</strong></th>
          <th><strong># of items</strong></th>
          <th><strong>Price</strong></th>
          <th><strong>Total</strong></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>    
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->no_items }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->total }}</td>     
          </tr>
        @endforeach
      </tbody>
    </table>
      <div>
        <label class="label">Sub Total</label>
        {{ $item->sub_total }}
      </div>
      <div>
        <label class="label">Tax</label>
        {{ $item->tax }}
      </div>
      <div>
        <label class="label">Total</label>
        {{ $item->all_total }}
      </div>
    </div>
</div>
</body>
</html>

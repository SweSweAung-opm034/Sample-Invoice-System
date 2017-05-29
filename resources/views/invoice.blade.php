@extends('layout.master')

@section('content')
<div class="box">
  <form method="POST" action="<?= URL::to('/invoice') ?>" name="name">
      {{ csrf_field() }}
    <div class="field is-grouped">
      <p class="control">
        <input class="input" type="text" name="inv">
      </p>
      <p class="control">
        <input type="submit" class="button is-primary" value="Search">
      </p>
    </div>
  </form>
  <div class="field has-addons has-addons-right">
    <a href="{{ url('/index') }}" class="button is-primary">Add Invoice</a>
  </div>
  <table class="table is-bordered is-striped">
    <thead>
      <tr>
        <th><strong>Invoice name</strong></th>
        <th><strong># of Items</strong></th>
        <th><strong>Total</strong></th>
        <th><strong></strong></th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoice as $inv)
        <tr>
          <td><strong><a href="{{ URL::to('/edit/'.$inv->id) }}">{{ $inv->invoice_name }}</a></strong></td>
          <td>{{ $inv->total_items }}</td>
          <td>{{ $inv->price_total }}</td>
          <td><a href="{{ URL::to('/pdfview/'.$inv->id) }}">PDF</a> <a href="{{ URL::to('/del/'.$inv->id) }}">Remove</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="width:70px;">
    {{ $invoice->links() }}
  </div>
</div>

@endsection
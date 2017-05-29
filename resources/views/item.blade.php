@extends('layout.master')


@section('content')
<div class="box">
  <form method="POST" action="<?= URL::to('/create') ?>" name="name">
      {{ csrf_field() }}
    <div class="field is-horizontal">
        <p class="control">
            <label class="label">Invoice Name</label>
        </p>
        <p class="control">
           <input class="input control" type="text" placeholder="Enter Invoice Name" id="invoice_name" name="invoice_name" required>
        </p>
    </div>
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
          <tr v-for="row in rows">
            <td><input type="text" class="input control" v-model="row.name" id="name" name="item_name[]" required></td>
            <td><input type="number" class="input control" v-model.number="row.items" id="items" name="no_items[]" required></td>
            <td><input type="number" class="input control" v-model.number="row.price" id="price" name="price[]" required></td>
            <td><input type="number" class="input control" v-model.number="row.items * row.price" id="total" name="total[]" readonly></td>
            <td><span class="tag is-light">Remove<a @click="removeRow(row)" class="delete"></a></span></td>
          </tr>
        </tbody>
      </table>
      <div>
        <input type="button" class="button is-primary" @click="addRow" value="Add row">
      </div> 
      <div class="is-clearfix">
        <div class="is-pulled-right">
          <div class="field is-horizontal">
            <div class="field-label is-normal">  
              <label class="label">Sub Total</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
               <input class="input control" type="number" name="sub_total" value='@{{ subtotal }}' readonly>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Tax</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
               <input class="input control" type="number" id="tax" name="tax" v-model="tax" required>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Total</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
               <input class="input control" type="number" name="all_total" value='@{{ subtotal + (tax * 0.01) }}' readonly>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="block">
        <input type="submit" class="button is-primary" value="Create">
    </div>
  </form>
</div>
<script>
var app  = new Vue({
  el: "#app",
  data: {

    rows: [
      {
        name: "", 
        items: "",
        price: ""
      }, 
      {
        name : "", 
        items : "", 
        price : ""
      }
    ],
  },
  computed: {
    
          amount:function(){
            return this.rows.row.items * this.rows.row.price;
          },
          
        subtotal: function(){
                return this.rows.reduce(function(amount, row){
                return amount + (row.items * row.price);
              },0);
            }
          },    

  methods:{
    addRow: function(){
      this.rows.push({});
    },
    removeRow: function(row){
      this.rows.$remove(row);
    }
  }
});
</script>

@endsection
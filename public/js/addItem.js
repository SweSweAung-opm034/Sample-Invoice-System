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
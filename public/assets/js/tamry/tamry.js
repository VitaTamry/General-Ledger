
//
//dynamic table
//

$(document).ready(function () {
  $('input.tableflat').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
  });
});

var asInitVals = new Array();
$(document).ready(function () {
  var oTable = $('#example').dataTable({
      "oLanguage": {
          "sSearch": "Search all columns:"
      },
      "aoColumnDefs": [
          {
              'bSortable': false,
              'aTargets': [0]
          } //disables sorting for column one
],
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
          "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
  });
  $("tfoot input").keyup(function () {
      /* Filter on the column based on the index of this element's parent <th> */
      oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
  });
  $("tfoot input").each(function (i) {
      asInitVals[i] = this.value;
  });
  $("tfoot input").focus(function () {
      if (this.className == "search_init") {
          this.className = "";
          this.value = "";
      }
  });
  $("tfoot input").blur(function (i) {
      if (this.value == "") {
          this.className = "search_init";
          this.value = asInitVals[$("tfoot input").index(this)];
      }
  });
});
////
////
//change the user privilege in /user
$("body").on('click','#foo',function(e) {
          e.preventDefault();
        var token= $(this).data('token');
        var userid = $(this).data('userid');
        var btn = $(this);
        var roleid = $(this).prev().val();
       console.log('User: '+ userid+ " role: "+roleid );
       var url = "user/"+userid; 
        $.ajax({
           type: "PUT",
           url: url,
           data:  { role_id : roleid, _token : token },// serializes the form's elements.
           success: function(data)
           {
            btn.removeClass('btn-info').addClass('btn-success').val('Done');
          //  btn;
            //btn;
            console.log(data);
           }});
    }); 




// load customers in customers search for invoice in /newinvoice

$(".select_customer").select2({
  language: "ar",
  dir:"rtl",
	 ajax: {
	 	url: function(params) {
	 		return "/getcustomer/"+params.term
	 	},
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;
      return {

        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1,
  templateResult: formatCustomers, // omitted for brevity, see the source of this page
  templateSelection: formatCustomersSelection // omitted for brevity, see the source of this page
});
function formatCustomers (items) {
    if (items.loading) return items.text;

    var markup = '<div class="clearfix">' +
    '<div class="col-sm-1">' +
    '</div>' +
    '<div clas="col-sm-10">' +
    '<div class="clearfix">' +
    '<div class="col-sm-6">' + items.name + '</div>' +
    '<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + items.id + '</div>' +
    '<div class="col-sm-2"><i class="fa fa-star"></i> ' + items.account + '</div>' +
    '</div>';

    if (items.description) {
      markup += '<div>' + items.description + '</div>';
    }

    markup += '</div></div>';


    return markup;
  }
   function formatCustomersSelection (items) {
    return items.name || items.text;
  }
  $('.select_customer').on('select2:select',function () {
  	var foo = $('.select_customer').select2('data');
  	$.each(foo,function(key,val) {
  		console.log(val.name);
  		var acc = 'الحساب: '+val.account+' ج.م';
  		console.log(acc);
  		$('#account').html(acc);

  	});	
  });

//
//load Items for /newinvoice
//

  $(".select_item").select2({   
  language: "ar",
  dir:"rtl",
   ajax: {
    url: function(params) {
      return "/getitem/"+params.term
    },
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;
      return {

        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1,
  templateResult: formatItems, // omitted for brevity, see the source of this page
  templateSelection: formatItemsSelection // omitted for brevity, see the source of this page
});
function formatItems (items) {
    if (items.loading) return items.text;

    var markup = 
    '<div>' + items.name + '</div>';

    if (items.description) {
      markup += '<div>' + items.description + '</div>';
    }

    //markup += '</div></div>';


    return markup;
  }
   function formatItemsSelection (items) {
    return items.name || items.text;
  }
  $('.select_item').on('select2:select',function () {
    var lastRow =$("#table tr:last");
    var clone = lastRow.clone(); 
    lastRow.after(clone);
    console.log('added');
    newRow =$("#table tr:last");
    var cells =newRow[0].cells;
    if (document.getElementById('del') != null) {
      rRow = document.getElementById('del');
    rRow.parentNode.remove();
    };
    cells[0].removeAttribute('id');
    cells[0].innerHTML = newRow[0].rowIndex;
    var itemData = $('.select_item').select2('data');
    $.each(itemData,function(key,val) {
      cells[1].firstChild.value = val.name;
      var unite = cells[2].firstChild.nextSibling.selectedIndex;
      cells[2].getElementsByTagName('option')[0].value =val.unite_price ;
      cells[2].getElementsByTagName('option')[1].value =val.package_price ;
      if (unite == 0) {
        cells[3].firstChild.value= val.unite_price;
      }else{
       cells[3].firstChild.value= val.package_price;
      };
      cells[4].firstChild.setAttribute('max',val.instock);
      cells[4].firstChild.setAttribute('value',1);

      console.log(cells[4].firstChild.getAttribute('max'));
      console.log(val.name,val.instock,val.unite_price);
     $('#qny').attr('max',val.instock);
     $('#unite_price').html(val.unite_price);
     cells[6].firstChild.value= cells[3].firstChild.value;
    }); 
  });

///
/// change unite and unite price
///
function changeUnite () {
  $('tr').on('click','#unite_select',function(){


 var x= document.activeElement.selectedIndex;
 var unitePrice = document.activeElement.closest('tr').childNodes[7].firstChild;
 
 unitePrice.value = document.activeElement.getElementsByTagName('option')[x].value;
 console.log(unitePrice.value);
   var s = $(this).parent().parents('tr');
    setPrice(s);
 
  });
}

///
/// on unite price change
///
$('#table').on('keyup','#unite_price',function  () {
    var s = $(this).parent().parents('tr');
    setPrice(s);
  })

///
/// validate the quantity input for Invoice
///

  $('#table').on('keyup','#qty',function  () {
    var val = parseInt($(this).val());
    var max = parseInt($(this).attr('max'));
    if (val > max) {
      alert("أقصى عدد متاح: "+max);
      $(this).val(max) ;
    }else if(val <= 0 ||  isNaN(val)){
      $(this).val(1);
    }
    var s = $(this).parent().parents('tr');
    setPrice(s);
  })


///
/// set unite price for invoice
///

function setPrice (ele) {
 var cel = ele[0].cells;
 var uniteprice =  parseFloat(cel[3].firstChild.value);
 var qnty = parseInt(cel[4].firstChild.value);
 var amount = qnty * uniteprice 
 cel[6].innerHTML = amount.toFixed(2);
 var name = cel[1].innerHTML;
  console.log(name, uniteprice, qnty);
}

///
/// remove item from invoice
///
$('body').on('click','#removeItem',function () {

  var $r = $(this).closest('#itemRow');
 $r.remove();
 var table = document.getElementById("table");
 var t = document.getElementById("table").rows.length;
 t = t-1;
 for (var i = t; i >= 0; i--) {
   table.rows[i].cells[0].innerHTML= table.rows[i].rowIndex;
 };
  });

        //
        // Dynamic Table
        //
  $(document).ready(function () {
      $('input.tableflat').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
      });
  });

  var asInitVals = new Array();
  $(document).ready(function () {
      var oTable = $('#example').dataTable({
          "oLanguage": {
              "sSearch": "Search all columns:"
          },
          "aoColumnDefs": [
              {
                  'bSortable': false,
                  'aTargets': [0]
              } //disables sorting for column one
  ],
          'iDisplayLength': 12,
          "sPaginationType": "full_numbers",
          "dom": 'T<"clear">lfrtip',
          "tableTools": {
              "sSwfPath": "{{URL::asset('assets/Datatables/tools/swf/copy_csv_xls_pdf.swf')}}"
          }
      });
      $("tfoot input").keyup(function () {
          /* Filter on the column based on the index of this element's parent <th> */
          oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
      });
      $("tfoot input").each(function (i) {
          asInitVals[i] = this.value;
      });
      $("tfoot input").focus(function () {
          if (this.className == "search_init") {
              this.className = "";
              this.value = "";
          }
      });
      $("tfoot input").blur(function (i) {
          if (this.value == "") {
              this.className = "search_init";
              this.value = asInitVals[$("tfoot input").index(this)];
          }
      });
  });
//
//check out
//
 $("#checkout").on('click',function(){

    // set the invoice to an array of objects
    var table = document.getElementById("table");

        for (var i = 0, row; row = table.rows[i]; i++) {

            for (var j = 0, col; col = row.cells[j]; j++) {
            console.log(document.getElementById("table").rows[i].cells.item(j).firstChild.value) ;
              
              }
            }
 })


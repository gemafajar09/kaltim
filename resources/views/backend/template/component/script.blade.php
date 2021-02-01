<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="js/calendar.js"></script>
<script src="{{asset('js/excanvas.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/base.js')}}"></script>

<script>
	$(document).ready(function(e){
		calendar = new CalendarYvv("#calendar", moment().format("Y-M-D"), "Monday");
		// calendar.funcPer = function(ev){
		// 	console.log(ev)
		// };
		calendar.diasResal = [{{date('d')}}]
		calendar.createCalendar();

    setInterval(function(){ real() }, 3000);
	});

  function real()
  {
    $.ajax({
      url: '<?= url('real-count') ?>',
      type: 'GET',
      dataType: 'JSON',
      success: function(data)
      {
        console.log(data);
        $('#ab').html(data.abaru);
        $('#aub').html(data.aumumbaru);
        $('#b1b').html(data.b1baru);
        $('#b2b').html(data.b2baru);
        $('#cb').html(data.cbaru);
        $('#db').html(data.dbaru);
        // perpanjang
        $('#ap').html(data.aperpanjang);
        $('#aup').html(data.aumumperpanjang);
        $('#b1p').html(data.b1perpanjang);
        $('#b2p').html(data.b2perpanjang);
        $('#cp').html(data.cperpanjang);
        $('#dp').html(data.dperpanjang);

      }
    })
  }

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
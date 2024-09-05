@include('layouts.header')
<body style="height: 100%; font-family: Arial, Helvetica, sans-serif;">
  
  <section class="course-pay" style="display: flex; flex-direction: column; gap: 20px;align-items: center; justify-content-center; width: 20%;color: white; background-color: #702228; height: 270px; padding: 30px; border-radius: 10px; margin-left: auto; margin-right: auto; margin-top: 12%; ">
    <h1 style="text-align: center;">Billing Summary</h1>
    <div class="p" style="display: flex; justify-content: space-between; width: 100%">
      <span>Nama Pelanggan</span><span>{{ Auth::user()->name }}</span>
    </div>
    <div class="p" style="width: 100%; display: flex; justify-content: space-between">
      <span>Nama Course</span><span style="text-align: left">{{ $course->name }}</span>
    </div>
    <div class="p" style="display: flex; justify-content: space-between; width: 100%">
      <span>Harga</span><span>Rp {{ $course->price }}</span>
    </div>
    <button id="pay-button" style="width: 333px;height: 40px; background-color: white; color: #702228; display: flex; align-items: center; justify-content: center;border-radius: 10px;">
      <p>Bayar</p>
    </button>
  </section>

  <div id="snap-container"></div>

  <script type="text/javascript">
  console.log('{{ $snapToken }}')
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function (result) {
          var route = "{{ route('pembelian.store', ['student' => Auth::user()->student->id , 'course' => $course->id ]) }}"
          window.location.href = route;
        },
        onPending: function (result) {
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script>
  
</body>